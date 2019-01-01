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
                        'controller' => Controllers\Question1Controller::class,
                        'action'=> 'q1'
                    ]
                ]
            ],
            'question2' => [
                'type' => Segment::class,
                'options' => [
                    'route'    => '/q2rest[/:id]',
                    'defaults' => [
                        'controller' => Controllers\Question2RestController::class,
                    ],
                ]
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controllers\TestRun::class => InvokableFactory::class,
            Controllers\Question1Controller::class => Factory\Q1Factory::class,
            Controllers\Question2RestController::class => Factory\Q2Factory::class
        ],
    ],
    'view_manager' => [
        'strategies' => [
            'ViewJsonStrategy',
        ],
        'display_not_found_reason' => true,
        'display_exceptions'       => false,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => [
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'stoad/controllers/question1/q1' => __DIR__ . '/../view/stoad/controllers/question1/q1.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],

];
