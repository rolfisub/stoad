<?php

namespace Stoad\Factory;

use Stoad\Controllers\Question2Controller;

/**
 * Description of Q2RestFactory
 *
 * @author rolf
 */
class Q2Factory
{
    public function __invoke(\Interop\Container\ContainerInterface $container, $requestedName, array $options = null)
    {

        $controller = new Question2Controller();
        return $controller;
    }
}
