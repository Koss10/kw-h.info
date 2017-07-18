<?php
namespace Application\Controller\Factory;

use Application\Controller\ListController;
use Application\Model\DeviceRepositoryInterface;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class ListControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null) {
        return new ListController($container->get(DeviceRepositoryInterface::class));
    }
}