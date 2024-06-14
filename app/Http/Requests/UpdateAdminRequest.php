<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAdminRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $adminId = $this->route('data_admin');

        return [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255|unique:admins,email,' . $adminId,
            'password' => 'nullable|string|min:8',
            'role' => 'required|string|max:50',
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'Nama depan wajib diisi.',
            'last_name.required' => 'Nama belakang wajib diisi.',
            'phone.required' => 'Nomor telepon wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Email harus berupa alamat email yang valid.',
            'email.unique' => 'Email sudah digunakan, silakan gunakan email yang lain.',
            'password.min' => 'Kata sandi harus memiliki setidaknya 8 karakter.',
            'role.required' => 'Peran wajib diisi.',
        ];
    }
}

