<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


namespace Stoad\Models;

use Rolfisub\ArrayFlatten\ArrayFlatten;
use Rolfisub\SortByAny\Entity\SortInput;
use Rolfisub\SortByAny\SortByAny;

/**
 * Description of Question2RestController
 *
 * @author rolf
 */
class Question2Model
{

    private $data;

    public function __construct(DataExample $d)
    {
        $this->data = $d;
    }

    /**
     * checks if a specific key exists on an array structure at any level
     * @param $key
     * @param $data
     * @return bool
     */
    private function doesKeyExistRecursive($key, $data)
    {
        if (is_array($data)) {
            $flattenArray = ArrayFlatten::flatten($data);
            if (array_key_exists($key, $flattenArray)) {
                return true;
            }
        }
        return false;
    }

    /**
     * Validates input
     * @param array $params
     * @throws \Exception
     */
    private function validateParams(array $params)
    {
        //all params are valid
        foreach ($params as $val) {
            if ($val != 'asc' && $val != 'desc') {
                $exist = $this->doesKeyExistRecursive($val, $this->data->getData());
                if (!$exist) {
                    throw new \Exception("Invalid key " . $val . " in data.");
                }
            }
        }
    }

    /**
     * gets the parameters and returns a sortInput instance
     * @param array $params
     * @return SortInput
     */
    private function getSortInput(array $params)
    {
        $sortInput = new SortInput();
        $last = array_pop($params);
        if ($last == 'asc' || $last == 'desc') {
            $sortInput->setOrder($last);
        } else {
            //return param
            array_push($params, $last);
        }
        $sortInput->setFields($params);
        return $sortInput;
    }


    /**
     * @param array $params
     * @return array
     * @throws \Exception
     */
    public function sort(array $params)
    {

        //validate input
        $this->validateParams($params);

        //create sortInput entity
        $si = $this->getSortInput($params);

        //creates sort by any instance
        $sba = new SortByAny($si);

        //gets sample data
        $data = $this->data->getData();

        //execute sorting
        $result = $sba->sortByAny($data);

        return $result;

    }
}
