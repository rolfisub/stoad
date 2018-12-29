<?php

namespace Stoad\Controllers;
use Stoad\Models\Q1Model;
use Zend\View\Model\ViewModel;

/**
 * Description of Question2
 *
 * @author rolf
 */
class Question1Controller extends \Zend\Mvc\Controller\AbstractActionController
{

    /**
     * @var Q1Model $model
     */
    private $model;

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
    public function q1Action()
    {
        $answer = $this->model->getAnswer();
        return new ViewModel(["answer"=>$answer]);
    }


}
