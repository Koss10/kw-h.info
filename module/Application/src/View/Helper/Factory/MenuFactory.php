<?php
namespace Application\View\Helper\Factory;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Application\View\Helper\Menu;
use Application\Model\NavManager;

class MenuFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null) {
        $navManager = $container->get(NavManager::class);
        $itms = $navManager->getMenuItems();
        return new Menu($items);
    }
}