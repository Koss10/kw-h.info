<?php
namespace Application\Controller\Factory;

use Application\Controller\WriteController;
use Application\Form\DeviceForm;
use Application\Model\DeviceCommandInterface;
use Application\Model\DeviceRepositoryInterface;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class WriteControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null) {
        $formManager = $container->get('FormElementManager');
        return new WriteController(
                $container->get(DeviceCommandInterface::class),
                $formManager->get(DeviceForm::class),
                $container->get(DeviceRepositoryInterface::class)
                );
    }
}