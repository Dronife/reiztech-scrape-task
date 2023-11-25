<?php

namespace App\Http\Requests;

use App\Rules\SelectorCount;
use App\Rules\UrlAddress;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class JobPostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        $urlCount = count($this->input('urls'));

        return [
            'urls' => ['required', 'array', new UrlAddress],
            'selectors' => ['required', 'array', new SelectorCount($urlCount)],
        ];
    }

}
