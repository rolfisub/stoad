<?php
/**
 * @author Rolf Bansbach
 */

namespace Stoad\Controllers;

trait ControllerResponseTrait
{
    /**
     * send the JSON response
     * @param array $data
     * @return \Zend\View\Model\JsonModel
     */
    private function sendJson(array $data)
    {
        $response = new \Zend\View\Model\JsonModel([
            "status" => "Ok",
            "result" => $data
        ]);
        $response->setOption('prettyPrint', true);
        return $response;
    }

    /**
     * send an standard formatted JSON error
     * @param \Exception $message
     * @param $code
     * @return \Zend\View\Model\JsonModel
     */
    private function sendError(\Exception $message, $code = 422)
    {
        $response = new \Zend\View\Model\JsonModel([
            "status" => "Error",
            "message" => $message->getMessage()
        ]);
        $response->setOption('prettyPrint', true);
        $this->response->setStatusCode($code);
        return $response;
    }
}