<?php
/**
 * Created by PhpStorm.
 * User: amon
 * Date: 3/23/19
 * Time: 4:34 PM
 */

if(!function_exists('extractdata')) {
    function extractdata ($items) {

        $itm = [];

        if(gettype($items) == 'string') {
            foreach (json_decode($items) as $item) {
                array_push($itm, $item);
            }
        }else if(gettype($items) == 'array') {
            foreach ($items as $item) {
                array_push($itm, $item['value']);
            }
        }

        return $itm;
    }
}

if(!function_exists('extractselect')) {
    function extractselect ($items) {

        $itm = [];

        foreach ($items as $item) {
            array_push($itm, $item['id']);
        }

        return $itm;
    }
}