<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Persistence\ManagerRegistry;

use App\Entity\Evenement;
use App\Entity\Inscription;

#[Route('/apifos', name: 'api_')]
class RestController extends AbstractController
{
    #[Route('/rest', name: 'app_rest')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $evenements = $doctrine
            ->getRepository(Evenement::class)
            ->findAll();

        return $this->json($evenements);
    }

    #[Route('/faire_inscription', name: 'add', methods: [Request::METHOD_POST])]

    public function add(ManagerRegistry $doctrine, Request $request): Response
    {
        $entityManager = $doctrine->getManager();
  
        $inscription = new Inscription();

        $from_post = json_decode($request->getContent());

        $inscription->setNom($from_post->nom);
        $inscription->setPrenom($from_post->prenom);
        $inscription->setEmail($from_post->email);
        $inscription->setTelephone($from_post->telephone);

        $evenement = $entityManager->getRepository(Evenement::class)->find($from_post->evenement);

        if (!$evenement) {
            return $this->json('Désolé mais l\'évènement n\'existe pas, veuillez lister les evenements et insiérer l ID de l evenement', 404);
        }

        //si le nombre d'inscrit est egale au nombre participant max, l'evenement est complet donc plus d'inscription
        if($evenement->getNombreInscrit() == $evenement->getNombreParticipantMax()){
            return $this->json(['msg'=>"Désolé mais l'évenement est complète, vous pouvez vous inscrire à un autre évènement en changant l'ID de l'evenement",'error'=>true], 201);
        }

        $evenement->setNombreInscrit($evenement->getNombreInscrit() + 1);
        
        $inscription->setEvenement($evenement);
        
        $entityManager->persist($inscription);
        $entityManager->persist($evenement);
        $entityManager->flush();
    
        return $this->json(['msg'=>'Inscription fait avec succes ','id'=> $inscription->getId(),'error'=>false]);
        
            
        
    }
    #[Route('/inscriptions', name: 'list_inscriptions')]
    public function list(ManagerRegistry $doctrine): Response
    {
        $inscriptions = $doctrine
            ->getRepository(Inscription::class)
            ->findAll();
            $return = [];
        foreach($inscriptions as $inscription){
            $evenement = $doctrine->getRepository(Evenement::class)->find($inscription->getEvenement());
            $return[] = [
                'id' => $inscription->getId(),
                'name' => $inscription->getNom(),
                'prenom' => $inscription->getPrenom(),
                'email' => $inscription->getEmail(),
                'telephone' => $inscription->getTelephone(),
                'evenement' => [
                    'id'=>$evenement->getId(),
                    'nom_evenement'=>$evenement->getNomEvenement(),
                    'date_de_debut'=>date_format($evenement->getDateDeDebut(),'d/m/Y'),
                    'date_de_fin'=>date_format($evenement->getDateDeFin(),'d/m/Y'),
                    'nombre_participant_max'=>$evenement->getNombreParticipantMax()
                ],
            ];

        }
        return $this->json($return);
    }
}
