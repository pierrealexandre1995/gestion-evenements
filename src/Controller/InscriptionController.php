<?php
namespace App\Controller;

use App\Entity\Evenement;
use App\Entity\Inscription;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpKernel\Attribute\AsController;

#[AsController]

class InscriptionController extends AbstractController{
    public function __invoke(Inscription $data): Inscription
    {
        $data->setNom("Pierre");
        $data->setPrenom("Alexandre");
        $data->setEmail("mail@mail.mail");
        $data->setTelephone("123456789");
        $data->setEvenement(null);
        return $data;
    }
}