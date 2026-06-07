<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Contracts\Validation\DataAwareRule;
use Carbon\Carbon;

class MultiIsbn implements DataAwareRule, ValidationRule
{

    private $data = [];
    private string $pattern = '/^978-4-\d{1,7}-\d{1,7}-\d{1}$/';
    private string $pattern10 = '/^4-\d{1,7}-\d{1,7}-[\dX]{1}$/';

    public function setData(array $data): static
    {
        $this->data = $data;
        return $this;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $published = Carbon::parse($this->data['published']);
        if ($published->greaterThanOrEqualTo(Carbon::parse('2007-01-01'))) {
            $pattern = $this->pattern;
            $len = 17;
        } else {
            $pattern = $this->pattern10;
            $len = 13;
        }
        if (!(preg_match($pattern, $value) && strlen($value) === $len)) {
            $fail(':attribute はISBNコードの形式でなければなりません。');
        }
    }
}
