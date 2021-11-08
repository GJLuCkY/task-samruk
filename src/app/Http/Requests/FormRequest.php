<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\Exceptions\ErrorCodes;
use App\Exceptions\NoticeException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest as LaravelFormRequest;

abstract class FormRequest extends LaravelFormRequest
{
    abstract public function rules(): array;

    abstract public function authorize(): bool;

    /**
     * @throws NoticeException
     */
    protected function failedValidation(Validator $validator): void
    {
        $errors = implode(', ', $validator->errors()->all());

        throw new NoticeException($errors, ErrorCodes::VALIDATION_ERROR);
    }
}
