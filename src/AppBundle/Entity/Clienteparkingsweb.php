<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Parkings.
 *
 * @ORM\Table(name="clienteparkingsweb_1")
 * @ORM\Entity(readOnly=true)
 */
class Clienteparkingsweb
{
    /**
     * @ORM\Id
     * @ORM\Column(name="IDPanel")
     */
    private $idPanel;

    /**
     * @ORM\Id
     * @ORM\Column(name="IDLinea")
     */
    private $idLinea;

    /**
     * @ORM\Id
     * @ORM\Column(name="IDParking")
     */
    private $idParking;

    /**
     * @ORM\Column(name="status", type="smallint")
     */
    private $status;

    /**
     * @ORM\Column(name="ocupacion", type="smallint")
     */
    private $ocupacion;
}
