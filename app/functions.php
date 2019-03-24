<?php
/**
 * Created by PhpStorm.
 * User: amon
 * Date: 3/23/19
 * Time: 4:34 PM
 */

if(!function_exists('extract_data')) {
    function extractdata ($items) {

        $itm = [];

        if(gettype($items) == 'string') {
            foreach (json_decode($items) as $item) {
                array_push($itm, $item->value);
            }
        }else if(gettype($items) == 'array') {
            foreach ($items as $item) {
                array_push($itm, $item['value']);
            }
        }

        return $itm;
    }
}