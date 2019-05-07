<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\DTO;

use JMS\Serializer\Annotation\ExclusionPolicy;

/**
 * Description of ParkingOcupationLine.
 *
 * @author ibilbao
 * @ExclusionPolicy("none")
 */
class ParkingOcupationLineDTO
{
    private $id;
    private $nombre;
    private $status;
    private $aforo;
    private $ocupacion;
    private $libre;

    public function getId()
    {
        return $this->id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getAforo()
    {
        return $this->aforo;
    }

    public function getOcupacion()
    {
        return $this->ocupacion;
    }

    public function getLibre()
    {
        return $this->libre;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    public function setAforo($aforo)
    {
        $this->aforo = $aforo;

        return $this;
    }

    public function setOcupacion($ocupacion)
    {
        $this->ocupacion = $ocupacion;

        return $this;
    }

    public function setLibre($libre)
    {
        $this->libre = $libre;

        return $this;
    }

    public static function createParkingOcupationFromData(array $data)
    {
        $pol = new self();
        $pol->setId($data['id']);
        $pol->setNombre($data['nombre']);
        $pol->setAforo(intval($data['aforo']));
        $pol->setOcupacion($data['ocupacion']);
        $pol->setLibre(($data['aforo'] - $data['ocupacion']) <= 0 ? 0 : $data['aforo'] - $data['ocupacion']);

        return $pol;
    }
}
