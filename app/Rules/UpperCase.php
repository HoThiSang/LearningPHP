<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class UpperCase implements ValidationRule
{
    private $attribute = null;

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        //
    }

    public function passes($attribute, $value){
        //dd($attribute);
        $this->attribute = $attribute;
        if($value===mb_strtoupper($value,'UTF8')) {
            return true;
        }
        return false;

    }


    public function message(){
        $customMessage ='validation.custom'.($this->attribute).'product_name.uppercase';
       dd($customMessage);
        if(trans($customMessage)!=$customMessage){
            return trans($customMessage);
        }
        return trans('validation.uppercase');
    }
}
