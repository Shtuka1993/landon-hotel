<?php

    namespace App\Controller;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;
    use App\Entity\Hotel;

    class ApiController extends AbstractController implements TokenAuthenticatedController {
        /**
         * @Route("/api/rooms")
         */
        public function home() {
            $hotels = $this->getDoctrine()
                ->getRepository(Hotel::class)
                ->findAll();
            
                return $this->json([
                    'hotels' => $hotels
                ]);
        }
    }