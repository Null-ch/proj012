<?php

namespace App\Http\Requests\Landing;

use Illuminate\Foundation\Http\FormRequest;

final class SendRequestFormRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, array<int, string>>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:1', 'max:120', 'regex:/.*\S.*/u'],
            'phone' => ['required', 'string', 'max:40', 'regex:/^\+?\d[\d\s\-\(\)]*$/'],
            'question' => ['required', 'string', 'min:1', 'max:2000', 'regex:/.*\S.*/u'],
            'consent' => ['accepted'],
            'website' => ['nullable', 'max:0'],
        ];
    }

    /**
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Пожалуйста, укажите имя.',
            'name.min' => 'Имя должно содержать минимум 1 символ.',
            'name.regex' => 'Имя не может состоять только из пробелов.',
            'phone.required' => 'Пожалуйста, укажите телефон.',
            'phone.regex' => 'Телефон может содержать только цифры, пробелы, скобки, дефис и опциональный "+" в начале.',
            'question.required' => 'Пожалуйста, укажите вопрос.',
            'question.min' => 'Вопрос должен содержать минимум 1 символ.',
            'question.regex' => 'Вопрос не может состоять только из пробелов.',
            'consent.accepted' => 'Необходимо согласие на обработку персональных данных.',
        ];
    }
}
