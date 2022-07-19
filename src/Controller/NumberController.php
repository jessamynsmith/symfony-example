<?php

namespace App\Controller;

use App\Entity\NumberRoll;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NumberController extends AbstractController
{
    /**
     * @Route("/", name="app_number")
     */
    public function index(ManagerRegistry $doctrine): Response
    {
        $number = random_int(0, 100);
        $remote_addr = $_SERVER['REMOTE_ADDR'];
        $forwarded_for = '';
        if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])){
            $forwarded_for = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        
        $entityManager = $doctrine->getManager();

        $roll = new NumberRoll();
        $roll->setNumber($number);
        $roll->setRemoteAddr($remote_addr);
        $roll->setForwardedFor($forwarded_for);
        $roll->setCreatedAt(new \DateTimeImmutable());

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($roll);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response(
            '<html><body>Lucky number: '.$number.'</body></html>'
        );
    }
}
