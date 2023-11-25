<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\InvokableRule;

class SelectorCount implements InvokableRule
{
    public function __construct(readonly int $urlCount)
    {
    }

    /**
     * @param  string  $attribute
     * @param  mixed  $value
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     * @return void
     */
    public function __invoke($attribute, $value, $fail)
    {
        if(count($value) !== $this->urlCount)
        {
            $fail(':attribute attribute must have array of selectors for each url.');
        }
    }
}
