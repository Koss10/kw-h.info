<?php
namespace Application\Model;

interface DeviceCommandInterface
{
    public function insertDevice(Device $device);
    public function updateDevice(Device $device);
    public function deleteDevice(Device $device);
}