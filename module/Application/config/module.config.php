<?php
namespace Application;

use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;

return [
    'service_manager' => [
        'aliases' => [
            Model\DeviceCommandInterface::class => Model\ZendDbCommand::class,
            Model\DeviceRepositoryInterface::class => Model\ZendDbRepository::class,
        ],
        'factories' =>[
            Model\ZendDbCommand::class => Model\Factory\ZendDbComandFactory::class,
            Model\ZendDbRepository::class => Model\Factory\ZendDbRepositoryFactory::class,
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\ListController::class => Controller\Factory\ListControllerFactory::class,
            Controller\WriteController::class => Controller\Factory\WriteControllerFactory::class,
            Controller\DeleteController::class => Controller\Factory\DeleteControllerFactory::class,
        ],
    ],
    'router' => [
        'routes' => [
            'home' => [
                'type' => Literal::class,
                'options' => [
                    'route'    => '/',
                    'defaults' => [
                        'controller' => Controller\ListController::class,
                        'action'     => 'index',
                    ],
                ],
                'may_terminate' => TRUE,
                'child_routes' => [
                    'detail' => [
                        'type' => Segment::class,
                        'options' => [
                            'route' => ':id',
                            'defaults' => [
                                'action' => 'detail',
                            ],
                        ],
                    ],
                    'add' => [
                        'type' => Literal::class,
                        'options' => [
                            'route' => '/add',
                            'defaults' => [
                                'controller' => Controller\WriteController::class,
                                'action' => 'add',
                            ],
                        ],
                    ],
                    'edit' =>[
                        'type' => Literal::class,
                        'options' => [
                            'route' => '/edit/:id',
                            'defaults' => [
                                'controller' => Controller\WriteController::class,
                                'action' => 'edit',
                            ],
                            'constraints' => [
                                'id' => '[1-9]\d*',
                            ],
                        ],
                    ],
                    'delete' => [
                        'type' => Segment::class,
                        'options' => [
                            'route' => '/delete/:id',
                            'defaults' => [
                                'controller' => Controller\DeleteController::class,
                                'action' => 'delete',
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => [
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];
