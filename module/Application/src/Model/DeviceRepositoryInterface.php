<?php
namespace Application\Model;

interface DeviceRepositoryInterface
{
    public function findAllDevices();
    public function findDevice($id);
}

