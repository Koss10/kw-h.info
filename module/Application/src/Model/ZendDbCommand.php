<?php
namespace Application\Model;

use RuntimeException;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\Adapter\Driver\ResultInterface;
use Zend\Db\Sql\Delete;
use Zend\Db\Sql\Insert;
use Zend\Db\Sql\Update;
use Zend\Db\Sql\Sql;

class ZendDbCommand implements DeviceCommandInterface
{
    private $db;
    
    function __construct($db) {
        $this->db = $db;
    }
    
    public function deleteDevice(Device $device) {
        if(! $device->getId()){
            throw new RuntimeException('Cannot delete device: missing identifier');
        }
        $delete = new Delete('t_catalog');
        $delete->where(['id=?' => $device->getId()]);
        $sql = new Sql($this->db);
        $stmt = $sql->prepareStatementForSqlObject($delete);
        $result = $stmt->execute();
        
        if(! $result instanceof ResultInterface){
            return FALSE;
        }
        return TRUE;
    }

    public function insertDevice(Device $device) {
        $insert = new Insert('t_catalog');
        $insert->values($device->toArray());
        $sql = new Sql($this->db);
        $stmt = $sql->prepareStatementForSqlObject($insert);
        $result = $stmt->execute();
        
        if(! $result instanceof ResultInterface){
            throw new RuntimeException(
                    'Database error occurred during device insert operation'
                    );
        }
        $id = $result->getGeneratedValue();
        
        return new Device(
                $device->getId(), 
                $device->getCategory(), 
                $device->getModel(), 
                $device->getManufacturer(), 
                $device->getPower(), 
                $device->getRelease_date(), 
                $device->getProperty(), 
                $device->getDescription()
                );
    }

    public function updateDevice(Device $device) {
        if(! $device->getId()){
            throw new RuntimeException('Cannot update device: missing identifier');
        }
        $update = new Update('t_catalog');
        $update->set($device->toArray());
        $update->where(['id=?' => $device->getId()]);
        $sql = new Sql($this->db);
        $stmt = $sql->prepareStatementForSqlObject($update);
        $result = $stmt->execute();
        
        if(! result instanceof ResultInterface){
            throw RuntimeException(
                    'Database error occurred during device update operation'
                    );
        }
        return $device;
    }

}
