<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Stoad\Factory;

use Stoad\Models\Question2Model as Q2Model;
use Stoad\Models\DataExample;
use Stoad\Controllers\Question2RestController;


/**
 * Description of Q2RestFactory
 *
 * @author rolf
 */
class Q2RestFactory
{
    public function __invoke(\Interop\Container\ContainerInterface $container, $requestedName, array $options = null)
    {
        $data = new DataExample();
        $model = new Q2Model($data);
        $controller = new Question2RestController($model);
        return $controller;
    }
}
