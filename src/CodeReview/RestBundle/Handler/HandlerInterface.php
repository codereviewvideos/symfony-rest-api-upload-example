<?php

namespace CodeReview\RestBundle\Handler;

interface HandlerInterface
{
    /**
     * @param $id
     * @return mixed
     */
    public function get($id);

    /**
     * @return mixed
     */
    public function all();

    /**
     * @param array $parameters
     * @return mixed
     */
    public function post(array $parameters);
}