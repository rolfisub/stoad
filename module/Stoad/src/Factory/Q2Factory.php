<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Stoad\Factory;

use Stoad\Models\Question2 as Q2Model;
use Stoad\Controllers\Question2;

/**
 * Description of Q2Factory
 *
 * @author rolf
 */
class Q2Factory
{
    public function __invoke(\Interop\Container\ContainerInterface $container, $requestedName, array $options = null)
    {
        $model = new Q2Model();
        $controller = new Question2($model);
        return $controller;
    }
}
