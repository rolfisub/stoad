<?php

namespace Stoad\Controllers;

use Stoad\Models\Question2Model as Q2Model;
use Stoad\Controllers\ControllerResponseTrait;

/**
 * Description of Question2RestController
 *
 * @author rolf
 */
class Question2RestController extends \Zend\Mvc\Controller\AbstractRestfulController
{

    /**
     * holder for the model class
     * @var Q2Model
     */
    private $model;

    /**
     * common JSON response code
     */
    use ControllerResponseTrait;

    /**
     * construct controller
     * @param Q2Model $model
     */
    public function __construct(Q2Model $model)
    {
        $this->model = $model;
    }

    /**
     * gets the list provided
     * @return string
     */
    public function getList()
    {
        return $this->sendJson($this->model->getData());
    }

    /**
     * process sort request
     * @param string $params
     * @return object
     */
    public function get($params)
    {
        //yey we can now start parsing params
        $paramArray = explode(',', $params);

        try {
            $result = $this->model->sort($paramArray);
            return $this->sendJson($result);
        } catch (\Exception $ex) {
            return $this->sendError($ex);
        }
    }

}
