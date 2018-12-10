<?php
/**
 * @author Rolf Bansbach rolfbans@gmail.com
 */

namespace Stoad;

use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
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
            ],
            'question2' => [
                'type' => Segment::class,
                'options' => [
                    'route'    => '/q2[/:id]',
                    'defaults' => [
                        'controller' => Controllers\Question2::class,
                    ],
                ]
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controllers\TestRun::class => InvokableFactory::class,
            Controllers\Question2::class => Controllers\Q2Factory::class
        ],
    ],
    'view_manager' => [
        'strategies' => [
            'ViewJsonStrategy',
        ],
    ],
];
