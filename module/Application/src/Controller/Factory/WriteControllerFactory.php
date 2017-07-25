<?php

namespace Application\Controller\Factory;

use Application\Controller\WriteController;
use Application\Form\DeviceForm;
use Application\Model\DeviceCommandInterface;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Application\Model\DeviceRepositoryInterface;

class WriteControllerFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param null|array $options
     * @return WriteController
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $formManager = $container->get('FormElementManager');
        return new WriteController(
            $container->get(DeviceCommandInterface::class),
            $formManager->get(DeviceForm::class),
			$container->get(DeviceRepositoryInterface::class)
        );
    }
}