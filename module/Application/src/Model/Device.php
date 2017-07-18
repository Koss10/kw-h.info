<?php
namespace Application\Model;

class Device
{
    private $id;
    private $category;
    private $model;
    private $manufacturer;
    private $power;
    private $release_date;
    private $property;
    private $description;
    
    public function __construct($id, $category, $model, $manufacturer, $power, $release_date, $property, $description) {
        $this->id = $id;
        $this->category = $category;
        $this->model = $model;
        $this->manufacturer = $manufacturer;
        $this->power = $power;
        $this->release_date = $release_date;
        $this->property = $property;
        $this->description = $description;
    }
    
    function getId() {
        return $this->id;
    }

    function getCategory() {
        return $this->category;
    }

    function getModel() {
        return $this->model;
    }

    function getManufacturer() {
        return $this->manufacturer;
    }

    function getPower() {
        return $this->power;
    }

    function getRelease_date() {
        return $this->release_date;
    }

    function getProperty() {
        return $this->property;
    }

    function getDescription() {
        return $this->description;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setCategory($category) {
        $this->category = $category;
    }

    function setModel($model) {
        $this->model = $model;
    }

    function setManufacturer($manufacturer) {
        $this->manufacturer = $manufacturer;
    }

    function setPower($power) {
        $this->power = $power;
    }

    function setRelease_date($release_date) {
        $this->release_date = $release_date;
    }

    function setProperty($property) {
        $this->property = $property;
    }

    function setDescription($description) {
        $this->description = $description;
    }
    
    public function toArray()
    {
        return array(
            'id'            => $id,
            'category'      => $category,
            'model'         => $model,
            'manufacturer'  => $manufacturer,
            'power'         => $power,
            'release_date'  => $release_date,
            'property'      => $property,
            'description'   => $description
        );
    }



}