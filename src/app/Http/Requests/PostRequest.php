<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\Core\Domain\Order\Order;
use Illuminate\Validation\Rule;

final class PostRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title'         => 'required',
            'is_active'     => 'boolean|required',
            'image'         => 'required',
            'description'   => 'required',
            'content'       => 'required',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
