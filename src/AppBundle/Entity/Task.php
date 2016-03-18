<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Task
 *
 * @ORM\Table(name="task")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TaskRepository")
 */
class Task
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var Postman
     *
     * @ORM\ManyToOne(targetEntity="Postman")
     * @ORM\JoinColumn(name="postman_id", referencedColumnName="id", nullable=false)
     */
    private $postman;

    /**
     * @var ParcelOrder
     *
     * @ORM\ManyToOne(targetEntity="ParcelOrder")
     * @ORM\JoinColumn(name="parcel_order_id", referencedColumnName="id", nullable=false)
     */
    private $parcelOrder;

    /**
     * @var bool
     *
     * @ORM\Column(name="done", type="boolean")
     */
    private $done = false;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set parcelOrder
     *
     * @param ParcelOrder $parcelOrder
     *
     * @return Task
     */
    public function setParcelOrder($parcelOrder)
    {
        $this->parcelOrder = $parcelOrder;

        return $this;
    }

    /**
     * Get parcelOrder
     *
     * @return ParcelOrder
     */
    public function getParcelOrder()
    {
        return $this->parcelOrder;
    }

    /**
     * Set postman
     *
     * @param Postman $postman
     *
     * @return Task
     */
    public function setPostman($postman)
    {
        $this->postman = $postman;

        return $this;
    }

    /**
     * Get postman
     *
     * @return Postman
     */
    public function getPostman()
    {
        return $this->postman;
    }

    /**
     * Set done
     *
     * @param boolean $done
     *
     * @return Task
     */
    public function setDone($done)
    {
        $this->done = $done;

        return $this;
    }

    /**
     * Get done
     *
     * @return bool
     */
    public function getDone()
    {
        return $this->done;
    }
}

