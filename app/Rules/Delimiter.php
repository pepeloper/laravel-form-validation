<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Str;

class Delimiter implements ValidationRule
{
    protected $separatedBy = ',';

    protected $minimum = 3;

    public function separatedBy($delimiter)
    {
        $this->separatedBy = $delimiter;

        return $this;
    }

    public function minimum($minimum)
    {
        $this->minimum = $minimum;

        return $this;
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (Str::of($value)->explode($this->separatedBy)->filter()->count() < $this->minimum) {
            $fail("Debe de haber {$this->minimum} etiquetas separadas por '{$this->separatedBy}'");
        }
    }
}
