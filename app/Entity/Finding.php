<?php

namespace Entity;


class Finding
{
    private string $status;
    private string $id;
    private string $name;
    private string $notif;
    private string $area;
    private string $equipment;
    private string $finddate;
    private string $findby;
    private string $funcloc;
    private string $description;
    private string $format;

    // status
    function getStatus()
    {
        return $this->status;
    }

    function setStatus(string $status)
    {
        $this->status = $status;
    }

    // id
    function getId()
    {
        return $this->id;
    }

    function setId(string $id)
    {
        $this->id = $id;
    }

    // name
    function getName()
    {
        return $this->name;
    }

    function setName(string $name)
    {
        $this->name = $name;
    }

    // notif
    function getNotif()
    {
        return $this->notif;
    }

    function setNotif(string $notif)
    {
        $this->notif = $notif;
    }

    // area
    function getArea()
    {
        return $this->area;
    }

    function setArea(string $area)
    {
        $this->area = $area;
    }

    // equipment
    function getEquipment()
    {
        return $this->equipment;
    }

    function setEquipment(string $equipment)
    {
        $this->equipment = $equipment;
    }

    // finddate
    function getFinddate()
    {
        return $this->finddate;
    }

    function setFinddate(string $finddate)
    {
        $this->finddate = $finddate;
    }

    // findby
    function getFindby()
    {
        return $this->findby;
    }

    function setFindby(string $findby)
    {
        $this->findby = $findby;
    }

    // funcloc
    function getFuncloc()
    {
        return $this->funcloc;
    }

    function setFuncloc(string $funcloc)
    {
        $this->funcloc = $funcloc;
    }

    // description
    function getDescription()
    {
        return $this->description;
    }

    function setDescription(string $description)
    {
        $this->description = $description;
    }

    // format
    function getFormat()
    {
        return $this->format;
    }

    function setFormat(string $format)
    {
        $this->format = $format;
    }
}
