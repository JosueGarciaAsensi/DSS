<?php

namespace App\Rules;

use Exception;
use Illuminate\Contracts\Validation\Rule;

class DNIRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        
        $nifRegEx = '/^[0-9]{8}[A-Z]$/i';
        $letras = "TRWAGMYFPDXBNJZSQVHLCKE";

        if (preg_match($nifRegEx, $value)) {
            return ($letras[(substr($value, 0, 8) % 23)] == $value[8]);
        }

        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'El formato del DNI no es válido.';
    }
}
