<?php

namespace CodeReview\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/car/{id}", name="car-admin")
     */
    public function indexAction($id)
    {
        $car = $this->getDoctrine()->getRepository('CodeReviewRestBundle:Car')->find($id);

        return new Response(sprintf('<html><body>%s - %s<br/><img src="data:image/jpg;base64,%s" /></body></html>',
            $car->getBrand(),
            $car->getName(),
            $car->getPicture()
        ));
    }
}
