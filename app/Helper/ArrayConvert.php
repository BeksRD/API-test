<?php

namespace App\Helper;

use App\Models\Subject;

trait ArrayConvert
{
    public function array_flatten(array $array): array
    {
        $return = array();
        foreach ($array as $key => $value) {
            if (is_array($value)){ $return = array_merge($return, $this->array_flatten($value));}
            else {
                $return[] = "{$key} : {$value}";}
        }
        return $return;

    }
}
