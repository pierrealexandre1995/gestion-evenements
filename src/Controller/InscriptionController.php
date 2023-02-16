<?php
namespace App\Controller;

use App\Entity\Evenement;
use App\Entity\Inscription;
use App\Repository\EvenementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Doctrine\Persistence\ManagerRegistry;

#[AsController]

class InscriptionController extends AbstractController{
    public function __invoke(Inscription $data, EvenementRepository $evenementRepository, ManagerRegistry $doctrine): Inscription
    {
        $entityManager = $doctrine->getManager();

        $evenement = $evenementRepository->find($data->getEvenement());
        if($evenement->getNombreInscrit()>0) {
            ///décrément le nombre de personne inscrit jusquà 0
            $evenement->setNombreInscrit($evenement->getNombreInscrit()-1);
            $entityManager->persist($evenement);
            $entityManager->flush();
            return $data;
        }
        else{
            return new JsonResponse(array("msg"=>"Désolé, le nombre de personne inscrit est déjà complète","erreur"=>true));
        }
    }
}