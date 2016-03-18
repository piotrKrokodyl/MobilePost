<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Parcel
 *
 * @ORM\Table(name="parcel")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ParcelRepository")
 */
class Parcel
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
     * @var guid
     *
     * @ORM\Column(name="parcel_hash", type="guid", unique=true)
     */
    private $parcelHash;

    /**
     * @var string
     *
     * @ORM\Column(name="notes", type="string", length=255, nullable=true)
     */
    private $notes;

    /**
     * @var float
     *
     * @ORM\Column(name="weight", type="float", nullable=true)
     */
    private $weight;


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
     * Set parcelHash
     *
     * @param guid $parcelHash
     *
     * @return Parcel
     */
    public function setParcelHash($parcelHash)
    {
        $this->parcelHash = $parcelHash;

        return $this;
    }

    /**
     * Get parcelHash
     *
     * @return guid
     */
    public function getParcelHash()
    {
        return $this->parcelHash;
    }

    /**
     * Set notes
     *
     * @param string $notes
     *
     * @return Parcel
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;

        return $this;
    }

    /**
     * Get notes
     *
     * @return string
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * Set weight
     *
     * @param float $weight
     *
     * @return Parcel
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * Get weight
     *
     * @return float
     */
    public function getWeight()
    {
        return $this->weight;
    }
}

