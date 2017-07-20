<?php
namespace Application\Model\Factory;

use Interop\Container\ContainerInterface;
use Application\Model\ZendDbRepository;
use Application\Model\Device;
use Zend\Db\Adapter\AdapterAwareInterface;
use Zend\Hydrator\Reflection as ReflectionHydrator;
use Zend\ServiceManager\Factory\FactoryInterface;

class ZendDbRepositoryFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null) {
        return new ZendDbRepository(
                $container->get(AdapterInterface::class),
                new ReflectionHydrator(),
                new Device('', '', '', '', '', '', '', '')
                );
    }
}