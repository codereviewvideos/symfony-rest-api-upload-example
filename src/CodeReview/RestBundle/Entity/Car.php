<?php

namespace CodeReview\RestBundle\Entity;

use CodeReview\RestBundle\Model\CarInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="CodeReview\RestBundle\Entity\Repository\CarRepository")
 * @ORM\Table(name="car")
 */
class Car implements CarInterface
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(name="name", type="string", length=50)
     * @Assert\NotBlank()
     */
    private $name;

    /**
     * @var string
     * @ORM\Column(name="brand", type="string", length=50)
     */
    private $brand;

    /**
     * @ORM\OneToMany(targetEntity="Picture", mappedBy="picture", cascade={"persist"})
     **/
    private $pictures;


    public function __construct()
    {
        $this->pictures = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return Car
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * @param string $brand
     * @return Car
     */
    public function setBrand($brand)
    {
        $this->brand = $brand;

        return $this;
    }

    public function addPicture(Picture $picture)
    {
        if (!$this->pictures->contains($picture)) {
            $this->pictures->add($picture);
        }

        return $this;
    }

    public function getPictures()
    {
        return $this->pictures;
    }

    public function setPictures(Collection $pictures)
    {
        $this->pictures = $pictures;

        return $this;
    }
}