<?php

namespace Stoad\Controllers;

use Stoad\Models\Question2 as Q2Model;
/**
 * Description of Question2
 *
 * @author rolf
 */
class Question2 extends \Zend\Mvc\Controller\AbstractRestfulController {
    
    /**
     * holder for the model class
     * @var type Q2Model
     */
    private $model;
    
    /**
     * construct controller
     * @param Q2Model $model
     */
    public function __construct(Q2Model $model) {
        $this->model = $model;
    }
    
    /**
     * send the json response
     * @param type $data
     * @return \Zend\View\Model\JsonModel
     */
    private function sendJson($data) {
        //prettyPrint
        $response = new \Zend\View\Model\JsonModel([
            "status" => "Ok",
            "result" => $data
        ]);
        $response->setOption('prettyPrint', true);
        return $response;
    }
    
    /**
     * 
     * @param \Exception $message
     * @param type $code
     * @return \Zend\View\Model\JsonModel
     */
    private function sendError(\Exception $message, $code = 422) {
        //prettyPrint
        $response = new \Zend\View\Model\JsonModel([
            "status" => "Error",
            "message" => $message->getMessage()
        ]);
        $response->setOption('prettyPrint', true);
        $this->response->setStatusCode($code);
        return $response;
    }
    
    /**
     * gets the list provided
     * @return type JsonModel
     */
    public function getList() {
        return $this->sendJson($this->model->data);
    }
    
    /**
     * process sort request
     * @param type $params
     * @return type
     */
    public function get($params) {
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
