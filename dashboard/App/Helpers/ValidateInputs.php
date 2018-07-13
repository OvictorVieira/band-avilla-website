<?php

class ValidateInputs
{
    /**
     * @param $array
     * @return bool
     */
    public function validadeInput($array)
    {

        foreach ($array as $key => $item) {

            if(!isset($item) || empty($item)) {
                return false;
            }
        }

        return true;
    }
}