<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
    * @Route("/")
    */
    public function home()
    {
        $year = random_int(1,100);

        return $this->render(
            'index.html.twig',
            [
                'year' => $year,
                'image1' => "images/hotel/intro_room.jpg",
                'image2' => "images/hotel/intro_pool.jpg",
                'image3' => "images/hotel/intro_dining.jpg",
                'image4' => "images/hotel/intro_attractions.jpg",
                'image5' => "images/hotel/intro_wedding.jpg",
            ]
        );
    }
}