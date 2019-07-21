<?php

namespace Custom;

class CustomValidator extends \Illuminate\Validation\Validator
{
    /**
     * 支払日範囲チェック
     *
     * @param $attribute
     * @param $value
     * @param $parameters
     * @return bool
     */
    public function validateDuedayRange($attribute, $value, $parameters)
    {
        if (1 <= $value && $value <= 31) {
            return true;
        }
        return false;
    }
}


?>