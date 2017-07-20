<?php
namespace Application\Model\Factory;

use Interop\Container\ContainerInterface;
use Application\Model\ZendDbCommand;
use Zend\Db\Adapter\AdapterAwareInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class ZendDbComandFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null) {
        return new ZendDbCommand($container->get(AdapterInterface::class));
    }
}

