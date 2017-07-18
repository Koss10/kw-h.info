<?php
namespace Application\Model;

use InvalidArgumentException;
use RuntimeException;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\Adapter\Driver\ResulInterface;
use Zend\Db\Sql\Sql;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Hydrator\HydrationInterface;

class DeviceRepository implements DeviceRepositoryInterface
{
    private $db;
    private $hydrator;
    private $devicePrototype;
            
    function __construct($db, $hydrator, $devicePrototype) {
        $this->db = $db;
        $this->hydrator = $hydrator;
        $this->devicePrototype = $devicePrototype;
    }

        public function findAllDevices() {
        $sql = new Sql($this->db);
        $select = $sql->select('t_catalog');
        $stmt = $sql->prepareStatementForSqlObject($select);
        $result = $tmt->execute();
        
        if(! $result instanceof ResultInterface || ! $result->isQueryResult()) {
            return[];
        }
         $resultSet = new HydratingResultSet($this->hydrator, $this->devicePrototype);
         $resultSet->initialize($result);
         return $resultSet;
    }

    public function findDevice($id) {
        $sql = new Sql($this->db);
        $select = $sql->select('t_catalog');
        $select->where(['id=?' => $id]);
        $stmt = $sql->prepareStatementForSqlObject($select);
        $result = $stmt->execute();
        if(! $result instanceof ResultInterface || ! $result->isQueryResult()){
            throw RuntimeException (sprintf(
                    'Filed retrievving device with identifier "%s"; unknow database error.',
                    $id
                    ));
        }
        $resultSet = new HydratingResultSet($this->hydrator, $this->devicePrototype);
        $resultSet->initialize($result);
        $device = $resultSet->current();
        
        if(! $device){
            throw new InvalidArgumentException (sprintf(
                    'Device with identifier "%s" not found',
                    $id
                    ));
        }
        return $device;
    }
}