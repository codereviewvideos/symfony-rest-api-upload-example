<?php

namespace CodeReview\RestBundle\Model;

interface CarInterface
{
    /**
     * Returns a Car's model
     *
     * @return string
     */
    public function getName();

    /**
     * Returns a Car's brand
     *
     * @return string
     */
    public function getBrand();

    /**
     * Returns a nice picture of a car
     *
     * @return string
     */
    public function getPicture();
}