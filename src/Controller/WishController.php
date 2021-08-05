<?php

namespace App\Controller;

use App\Entity\Wish;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
     * @Route("/wish")
     */
class WishController extends AbstractController
{
    /**
     * @Route("/ajouter", name="wish_ajouter")
     */
    public function ajouter(): Response
    {
        $em = $this->getDoctrine()->getManager();
        $wish = new Wish();
        $wish->setTitle('travailler chez Amazon AWS');
        $wish->setDescription("Dans les bureau, pas dans l'entrepot");
        $wish->setAuthor('Jean frédéric');
        $wish->setIsPublished(true);
        $wish->setDateCreated(new \DateTime());
        $em->persist($wish);
        $em->flush();

        return $this->redirectToRoute('home');
        
    }
}
