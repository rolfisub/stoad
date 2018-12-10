<?php

namespace Stoad\Controllers;
//use Zend\View\Model\JsonModel;
/**
 * Description of TestRun
 *
 * @author rolf
 */
class TestRun extends \Zend\Mvc\Controller\AbstractRestfulController {
    
    private function getResult($data) {
        return new \Zend\View\Model\JsonModel($data);
    }
    
    /**
     * method to check controller is found
     * @return array
     */
    public function getList() {
        
        return $this->getResult([
            "test" => true
        ]);
    }
}
