<?php

namespace App\Http\Requests\Representatives;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RepresentativeUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $representativeId = $this->route('id');

        return [
            'cpf' => ['required', 'string', 'max:14', Rule::unique('clients', 'cpf')->ignore($representativeId)],
            'name' => ['required', 'string', 'max:255']
        ];
    }
}
