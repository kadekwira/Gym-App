<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTrainerRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'trainer_name' => 'sometimes|required|string|max:255',
            'trainer_photo' => 'sometimes|required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'phone_number' => 'sometimes|required|string|max:15',
            'address' => 'sometimes|required|string|max:255',
            'experience' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|email|max:255|unique:trainers,email,' . $this->route('data_trainer'),
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'trainer_name.required' => 'Trainer name is required.',
            'trainer_name.string' => 'Trainer name must be a string.',
            'trainer_name.max' => 'Trainer name must not exceed 255 characters.',
            'trainer_photo.required' => 'Trainer photo is required.',
            'trainer_photo.image' => 'Trainer photo must be an image.',
            'trainer_photo.mimes' => 'Trainer photo must be a file of type: jpeg, png, jpg, gif.',
            'trainer_photo.max' => 'Trainer photo must not exceed 2048 kilobytes.',
            'phone_number.required' => 'Phone number is required.',
            'phone_number.string' => 'Phone number must be a string.',
            'phone_number.max' => 'Phone number must not exceed 15 characters.',
            'address.required' => 'Address is required.',
            'address.string' => 'Address must be a string.',
            'address.max' => 'Address must not exceed 255 characters.',
            'experience.required' => 'Experience is required.',
            'experience.string' => 'Experience must be a string.',
            'experience.max' => 'Experience must not exceed 255 characters.',
            'email.required' => 'Email is required.',
            'email.email' => 'Email must be a valid email address.',
            'email.max' => 'Email must not exceed 255 characters.',
            'email.unique' => 'Email has already been taken.',
        ];
    }
}
