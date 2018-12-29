<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Stoad\Factory;

use Stoad\Controllers\Question1Controller;
use Rolfisub\PrintKeyValue\PrintKeyValue;
use Stoad\Models\DataExample;
use Stoad\Models\Q1Model;

/**
 * Description of Q2Factory
 *
 * @author rolf
 */
class Q1Factory
{
    public function __invoke(\Interop\Container\ContainerInterface $container, $requestedName, array $options = null)
    {
        $pkv = new PrintKeyValue();
        $data = new DataExample();
        $model = new Q1Model($pkv, $data);
        $controller = new Question1Controller($model);
        return $controller;
    }
}
