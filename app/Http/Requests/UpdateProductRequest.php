<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProductRequest extends FormRequest
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
* @return array<string,
\Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
*/
public function rules(): array
{
return [
'code' => ['required', 'string', 'max:50', Rule::unique('products')->ignore($this->product->id)],
'name' => 'required|string|max:250',
'quantity' => 'required|integer|min:1|max:10000',
'price' => 'required',
'description' => 'nullable|string',
'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
'delete_image' => 'nullable|boolean'
];
}

/**
 * Get custom messages for validator errors.
 *
 * @return array
 */
public function messages(): array
{
    return [
        'image.image' => 'The file must be an image.',
        'image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif.',
        'image.max' => 'The image may not be greater than 2MB.'
    ];
}
}