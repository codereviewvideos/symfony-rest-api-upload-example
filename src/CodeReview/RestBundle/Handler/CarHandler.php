<?php

namespace CodeReview\RestBundle\Handler;

use CodeReview\RestBundle\Entity\Car;
use CodeReview\RestBundle\Form\Handler\FormHandler;
use CodeReview\RestBundle\Entity\Repository\CarRepository;

class CarHandler implements HandlerInterface
{
    private $repository;
    private $formHandler;

    public function __construct(CarRepository $artistRepository, FormHandler $formHandler)
    {
        $this->repository = $artistRepository;
        $this->formHandler = $formHandler;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function get($id)
    {
        return $this->repository->find($id);
    }

    /**
     * @return array
     */
    public function all()
    {
        return $this->repository->findAll();
    }

    /**
     * @param array $parameters
     * @return mixed
     */
    public function post(array $parameters)
    {
        return $this->formHandler->processForm(
            new Car(),
            $parameters,
            "POST"
        );
    }
}