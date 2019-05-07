<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Parkings.
 *
 * @ORM\Table(name="Lineas")
 * @ORM\Entity(readOnly=true)
 */
class Linea
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
     * @ORM\Column(name="status", type="int")
     */
    private $status;

    /**
     * @ORM\Column(name="ocupacion", type="int")
     */
    private $ocupacion;
}
