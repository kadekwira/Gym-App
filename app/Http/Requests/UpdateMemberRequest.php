<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMemberRequest extends FormRequest
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
        $user = $this->route('data_member');
        return [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:admins,email,' . $user,
            'password' => 'nullable|string|min:8',
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
            'date_of_birth' => 'nullable|date',
            'membership_type_id' => 'required|exists:membership_types,id',
            'membership_start' => 'nullable|date',
            'membership_end' => 'nullable|date',
            'status' => 'in:active,inactive',
        ];
    }
    public function messages()
    {
        return [
            'first_name.required' => 'Nama depan wajib diisi.',
            'first_name.string' => 'Nama depan harus berupa teks.',
            'first_name.max' => 'Nama depan tidak boleh lebih dari :max karakter.',
            'last_name.required' => 'Nama belakang wajib diisi.',
            'last_name.string' => 'Nama belakang harus berupa teks.',
            'last_name.max' => 'Nama belakang tidak boleh lebih dari :max karakter.',
            'email.required' => 'Email wajib diisi.',
            'email.string' => 'Email harus berupa teks.',
            'email.email' => 'Email harus berupa alamat email yang valid.',
            'email.max' => 'Email tidak boleh lebih dari :max karakter.',
            'email.unique' => 'Email sudah digunakan.',
            'password.required' => 'Password wajib diisi.',
            'password.string' => 'Password harus berupa teks.',
            'password.min' => 'Password minimal harus terdiri dari :min karakter.',
            'phone.string' => 'Nomor telepon harus berupa teks.',
            'phone.max' => 'Nomor telepon tidak boleh lebih dari :max karakter.',
            'address.string' => 'Alamat harus berupa teks.',
            'address.max' => 'Alamat tidak boleh lebih dari :max karakter.',
            'date_of_birth.date' => 'Format tanggal lahir tidak valid.',
            'membership_type_id.required' => 'Tipe Member wajib dipilih.',
            'membership_type_id.exists' => 'Tipe Member yang dipilih tidak valid.',
            'membership_start.date' => 'Format tanggal mulai Member tidak valid.',
            'membership_end.date' => 'Format tanggal berakhir Member tidak valid.',
            'status.in' => 'Status Member tidak valid.',
        ];
    }
}
