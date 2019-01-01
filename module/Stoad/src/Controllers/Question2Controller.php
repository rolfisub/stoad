<?php

namespace Stoad\Controllers;

use Zend\View\Model\ViewModel;
use Stoad\Models\DataExample;
use Rolfisub\ArrayFlatten\ArrayFlatten;

/**
 * Description of Question2RestController
 *
 * @author rolf
 */
class Question2Controller extends \Zend\Mvc\Controller\AbstractActionController
{

    public function q2Action()
    {
        $data = new DataExample();
        $fields = array_keys(ArrayFlatten::flatten($data->getData()));

        return new ViewModel([
            "fields" => $fields
        ]);
    }


}
