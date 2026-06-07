<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class Isbn implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */

    private string $pattern = '/^978-4-\d{1,7}-\d{1,7}-\d{1}$/';
    private string $pattern10 = '/^4-\d{1,7}-\d{1,7}-[\dX]{1}$/';

    public function __construct(private bool $allowOld = false) {}

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!(preg_match($this->pattern, $value) && strlen($value) === 17)) {
            $fail(':attribute はISBNコードの形式でなければなりません。');
            // $fail('validation.isbn')->translate();
            // $fail('validation.isbn')->translate(['value' => $value]);
        }

        // パラメーターを使う場合
        // if ($this->allowOld) {
        //     $pattern = $this->pattern10;
        //     $len = 13;
        // } else {
        //     $pattern = $this->pattern;
        //     $len = 17;
        // }
        // if (!(preg_match($pattern, $value) && strlen($value) === $len)) {
        //     $fail(':attribute はISBNコードの形式でなければなりません。');
        // }
    }
}
