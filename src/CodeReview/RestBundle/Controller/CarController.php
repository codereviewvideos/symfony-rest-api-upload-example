<?php

namespace CodeReview\RestBundle\Controller;

use CodeReview\RestBundle\Exception\InvalidFormException;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use FOS\RestBundle\Controller\Annotations\View;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

class CarController extends FOSRestController
{
    /**
     * Returns an Car when given a valid id
     *
     * @ApiDoc(
     *  resource=true,
     *  description="Retrieves an Car by id",
     *  output = "CodeReview\RestBundle\Entity\Car",
     *  section="Cars",
     *  statusCodes={
     *         200="Returned when successful",
     *         404="Returned when the requested Car is not found"
     *     }
     * )
     *
     * @View()
     *
     * @param int   $id     The Car's id
     *
     * @return array
     */
    public function getCarAction($id)
    {
        return $this->getOr404($id);
    }

    /**
     * Returns a collection of Cars filtered by optional criteria
     *
     * @ApiDoc(
     *  resource=true,
     *  description="Returns a collection of Cars",
     *  section="Cars"
     * )
     *
     * @return array
     */
    public function getCarsAction()
    {
        return $this->getHandler()->all();
    }

    /**
     * @ApiDoc(
     *  resource=true,
     *  description="Creates a new Car",
     *  input = "CodeReview\RestBundle\Form\Type\CarFormType",
     *  output = "CodeReview\RestBundle\Entity\Car",
     *  section="Cars",
     *  statusCodes={
     *         201="Returned when a new Car has been successfully created",
     *         400="Returned when the posted data is invalid"
     *     }
     * )
     *
     * @View()
     *
     * @param Request $request
     * @return array|\FOS\RestBundle\View\View|null
     */
    public function postCarAction(Request $request)
    {
        try {
            var_dump($request->request->all());

            $car = $this->getHandler()->post(
                $request->request->all()
            );

            $routeOptions = array(
                'id'        => $car->getId(),
                '_format'    => $request->get('_format'),
            );

            return $this->routeRedirectView(
                'get_car',
                $routeOptions,
                Response::HTTP_CREATED
            );

        } catch (InvalidFormException $e) {
            return $e->getForm();
        }
    }


    /**
     * Returns a record by id, or throws a 404 error
     *
     * @param $id
     * @return mixed
     */
    protected function getOr404($id)
    {
        $handler = $this->getHandler();
        $data = $handler->get($id);

        if (null === $data) {
            throw new NotFoundHttpException();
        }

        return $data;
    }

    /**
     * Returns the required handler for this controller
     *
     * @return \CodeReview\RestBundle\Handler\CarHandler
     */
    private function getHandler()
    {
        return $this->get('code_review.rest_bundle.car_handler');
    }
}
