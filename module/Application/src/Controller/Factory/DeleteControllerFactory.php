<?php
namespace Application\Controller\Factory;

use Application\Controller\DeleteController;
use Application\Model\DeviceCommandInterface;
use Application\Model\DeviceRepositoryInterface;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class DeleteControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options =null) {
        return new DeleteController(
                $container->get(DeviceCommandInterface::class),
                $container->get(DeviceRepositoryInterface::class)
                );
    }
}
