<?php declare(strict_types=1);

namespace App\Rules;

use Illuminate\Contracts\Validation\InvokableRule;

class UrlAddress implements InvokableRule
{
    /**
     * @param  string  $attribute
     * @param  mixed  $value
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     * @return void
     */
    public function __invoke($attribute, $value, $fail): void
    {
        foreach ($value as $index => $url) {
            if (!$this->isValidUrl($url)) {
                $fail("The :attribute.$index must contain valid URL.");
            }
        }
    }

    private function isValidUrl(string $url): bool
    {
        return filter_var($url, FILTER_VALIDATE_URL) !== false
            && in_array(parse_url($url, PHP_URL_SCHEME), ['http', 'https']);
    }
}
