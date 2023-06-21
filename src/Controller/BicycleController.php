<?php

// src/Controller/BicycleController.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Bicycle;

class BicycleController extends AbstractController
{
    /**
     * @Route("/", name="bicycle")
     */
    public function index(): Response
    {
        $error = null;
        try {
            // Instantiating Bicycle
            $bicycle = new Bicycle('Giant', 'Blue', 99.99);
            $bicycle->start(); // Start the bicycle
            $bicycle->stop(); // Stop the bicycle
            $bicycle->start(); // Start the bicycle
            $bicycle->start(); // Try to start the bicycle again (throws an exception)
        } catch (\Exception $e) {
            $error = $e->getMessage();
        }
        // rendering twig view
        return $this->render('bicycle/index.html.twig', [
            'brand' => $bicycle ? $bicycle->getBrand() : 'Unknown Brand', //checking to see if a value is set, and setting it to unknown if unset
            'color' => $bicycle ? $bicycle->getColor() : 'Unknown Color', //checking to see if a value is set, and setting it to unknown if unset
            'value' => $bicycle ? $bicycle->getValue() : 'Unknown Value', //checking to see if a value is set, and setting it to unknown if unset
            'isRunning' => $bicycle ? $bicycle->isRunning() : false,      //checking to see if a value is set, and setting it to false if unset
            'error' => $error,
        ]);
    }
}
