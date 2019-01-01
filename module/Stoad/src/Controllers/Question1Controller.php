<?php

namespace Stoad\Controllers;
use Stoad\Models\Question1Model;
use Zend\View\Model\ViewModel;

/**
 * Description of Question2RestController
 *
 * @author rolf
 */
class Question1Controller extends \Zend\Mvc\Controller\AbstractActionController
{

    /**
     * @var Question1Model $model
     */
    private $model;

    /**
     * construct controller
     * @param Question1Model $model
     */
    public function __construct(Question1Model $model)
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
