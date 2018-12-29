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
            'question1' => [
                'type' => Literal::class,
                'options' => [
                    'route' => '/q1',
                    'defaults' => [
                        'controller' => Controllers\Question1::class
                    ]
                ]
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
            Controllers\Question1::class => Factory\Q1Factory::class,
            Controllers\Question2::class => Factory\Q2Factory::class
        ],
    ],
    'view_manager' => [
        'strategies' => [
            'ViewJsonStrategy',
        ],
    ],
];
