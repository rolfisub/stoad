<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


namespace Stoad\Models;

use Stoad\Entity\SortInput;

/**
 * Description of Question2
 *
 * @author rolf
 */
class Question2 {
    /**
     * temporary data holder
     * @var type array
     */
    private $data = [
        array (
            'guest_id' => 177,
            'guest_type' => 'crew',
            'first_name' => 'Marco',
            'middle_name' => NULL,
            'last_name' => 'Burns',
            'gender' => 'M',
            'guest_booking' => array (  
                array (
                    'booking_number' => 20008683,
                    'ship_code' => 'OST',
                    'room_no' => 'A0073',
                    'start_time' => 1438214400,
                    'end_time' => 1483142400,
                    'is_checked_in' => true,
                ),
            ),
            'guest_account' => array (  
                array (
                    'account_id' => 20009503,
                    'status_id' => 2,
                    'account_limit' => 0,
                    'allow_charges' => true,
                ),
            ),
        ),
        array (
            'guest_id' => 10000113,
            'guest_type' => 'crew',
            'first_name' => 'Bob Jr ',
            'middle_name' => 'Charles',
            'last_name' => 'Hemingway',
            'gender' => 'M',
            'guest_booking' => array (  
                array (
                    'booking_number' => 10000013,
                    'room_no' => 'B0092',
                    'is_checked_in' => true,
                ),
            ),
            'guest_account' => array (  
                array (
                    'account_id' => 10000522,
                    'account_limit' => 300,
                    'allow_charges' => true,
                ),
            ),
        ),
        array (
            'guest_id' => 10000114,
            'guest_type' => 'crew',
            'first_name' => 'Al ',
            'middle_name' => 'Bert',
            'last_name' => 'Santiago',
            'gender' => 'M',
            'guest_booking' => array (  
                array (
                    'booking_number' => 10000014,
                    'room_no' => 'A0018',
                    'is_checked_in' => true,
                ),
            ),
            'guest_account' => array (  
                array (
                    'account_id' => 10000013,
                    'account_limit' => 300,
                    'allow_charges' => true,
                ),
            ),
        ),
        array (
            'guest_id' => 10000115,
            'guest_type' => 'crew',
            'first_name' => 'Red ',
            'middle_name' => 'Ruby',
            'last_name' => 'Flowers ',
            'gender' => 'F',
            'guest_booking' => array (  
                array (
                    'booking_number' => 10000015,
                    'room_no' => 'A0051',
                    'is_checked_in' => true,
                ),
            ),
            'guest_account' => array (  
                array (
                    'account_id' => 10000519,
                    'account_limit' => 300,
                    'allow_charges' => true,
                ),
            ),
        ),
        array (
            'guest_id' => 10000116,
            'guest_type' => 'crew',
            'first_name' => 'Ismael ',
            'middle_name' => 'Jean-Vital',
            'last_name' => 'Jammes',
            'gender' => 'M',
            'guest_booking' => array (  
                array (
                    'booking_number' => 10000016,
                    'room_no' => 'A0023',
                    'is_checked_in' => true,
                ),
            ),
            'guest_account' => array (  
                array (
                    'account_id' => 10000015,
                    'account_limit' => 300,
                    'allow_charges' => true,
                ),
            ),
        ),
    ];
    
    /**
     * Interface to get data
     * @return type array
     */
    public function getData() {
        return $this->data;
    }
    
    private function doesKeyExistRecursive($key, $data) {
        if(is_array($data)){
            if(array_key_exists($key, $data)) {
                return true;
            } else {            
                foreach($data as $val) {
                    if(is_array($val)) {
                        return $this->doesKeyExistRecursive($key, $val);
                    }
                }
            }
        }        
        return false;
    }
    
    /**
     * Validate the parameters passed
     * @param array $params
     */
    private function validateParams(array $params) {
        //all params are valid
        foreach ($params as $val) {
            if($val != 'asc' && $val != 'desc') {
                $exist = $this->doesKeyExistRecursive($val, $this->getData());
                if(!$exist) {
                    throw new \Exception("Invalid key " . $val . " in data.");
                }
            }
        }
    }
    
    /**
     * gets params and returns a SortInput
     * @param array $params
     * @return \Stoad\Models\SortInput
     */
    private function getSortInput(array $params) {
        $sortInput = new SortInput();
        $last = array_pop($params);
        if($last == 'asc' || $last == 'desc') {
            $sortInput->order = $last;
        } else {
            //default order
            $sortInput->order = 'asc';
            //return param
            array_push($params, $last);
        }
        $sortInput->params = $params;
        return $sortInput;
    }


    /**
     * sort the array
     * @param array $params
     */
    public function sort(array $params) {
        
        //validate them
        $this->validateParams($params);
        
        //gets sortInput entity
        $sortInput = $this->getSortInput($params);
        
        echo '<pre>';
        $normal = $this->getData();
        var_dump($normal[0]);
        //var_dump(\_\flattenDeep($normal[0]));
        //var_dump(\_\flatten($normal[0]));
        var_dump(\_\flattenDepth($normal[0], 2));
        
        var_dump($normal[0]);
        
        die();
        
        return $sortInput;
        
        
    }
}
