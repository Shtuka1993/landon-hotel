<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Psr\Log\LoggerInterface;
use App\Service\RandomNumberGenerator;
use App\Service\DateService;

class IndexController extends AbstractController
{
    private const HOTEL_OPENED = 1969;
    /**
    * @Route("/")
    */
    public function home(LoggerInterface $logger, DateService $dateService)
    {
        $logger->info('Homepage loaded.');
        $year = $dateService->getYears(self::HOTEL_OPENED);
        $images = [
            [
                'url' => "images/hotel/intro_room.jpg",
                'class' => "",
            ],
            [
                'url' => "images/hotel/intro_pool.jpg",
                'class' => "",
            ],
            [
                'url' => "images/hotel/intro_dining.jpg",
                'class' => "",
            ],
            [
                'url' => "images/hotel/intro_attractions.jpg",
                'class' => "",
            ],
            [
                'url' => "images/hotel/intro_wedding.jpg",
                'class' => "hidesm",
            ],
        ];

        return $this->render(
            'index.html.twig',
            [
                'year' => $year,
                'images' => $images,
            ]
        );
    }
}