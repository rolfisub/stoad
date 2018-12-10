<?php
/**
 * @author Rolf Bansbach rolfbans@gmail.com
 */

namespace Stoad;

use Zend\Router\Http\Literal;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [
            'test' => [
                'type' => Literal::class,
                'options' => [
                    'route'    => '/test',
                    'defaults' => [
                        'controller' => Controllers\TestRun::class
                    ],
                ],
            ]
        ],
    ],
    'controllers' => [
        'factories' => [
            Controllers\TestRun::class => InvokableFactory::class,
        ],
    ],
    'view_manager' => [
        'strategies' => [
            'ViewJsonStrategy',
        ],
    ],
];
