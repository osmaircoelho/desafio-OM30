<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidarCNS implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
   /* public function __construct()
    {
        //
    }*/

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        // Remove caracteres não numéricos
        $value = preg_replace('/\D/', '', $value);

        // Verifica se tem 15 dígitos
        if (strlen($value) !== 15) {
            return false;
        }

        // Extrai o primeiro dígito verificador
        $dv1 = (int) substr($value, 0, 1);

        // Calcula o segundo dígito verificador
        $soma = 0;
        for ($i = 0; $i < 15; $i++) {
            $soma += (int) substr($value, $i, 1) * (15 - $i);
        }
        $resto = $soma % 11;
        $dv2 = $resto === 0 ? 0 : 11 - $resto;

        // Verifica se os dígitos verificadores estão corretos
        return $dv1 === $dv2;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'O CNS informado não é válido.';
    }
}
