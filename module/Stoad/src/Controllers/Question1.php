<?php

namespace Stoad\Controllers;
use Stoad\Models\Q1Model;

/**
 * Description of Question2
 *
 * @author rolf
 */
class Question1 extends \Zend\Mvc\Controller\AbstractRestfulController
{

    /**
     * @var Q1Model $model
     */
    private $model;

    /**
     * common JSON response code
     */
    use ControllerResponseTrait;

    /**
     * construct controller
     * @param Q1Model $model
     */
    public function __construct(Q1Model $model)
    {
        $this->model = $model;
    }

    /**
     * gets the list provided
     * @return string
     */
    public function getList()
    {
        return $this->sendJson([
            "working" => $this->model->getAnswer()
        ]);
    }


}
