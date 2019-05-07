<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Parkings.
 *
 * @ORM\Table(name="parkings")
 * @ORM\Entity(readOnly=true)
 */
class Parking
{
    /**
     * @ORM\Id
     * @ORM\Column(name="IDParking")
     */
    private $idParking;

    /**
     * @ORM\Id
     * @ORM\Column(name="IDCiudad")
     */
    private $idCiudad;

    /**
     * @var bigint
     *
     * @ORM\Column(name="Nombre", type="string", length=255, nullable=true)
     */
    private $nombre;

    /**
     * @var bigint
     *
     * @ORM\Column(name="Aforo", type="bigint", nullable=true)
     */
    private $aforo;

    /**
     * @var int
     *
     * @ORM\Column(name="Orden", type="smallint", nullable=true)
     */
    private $orden;
}
