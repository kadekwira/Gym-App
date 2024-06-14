<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTrialDayRequest extends FormRequest
{
    public function authorize()
    {
        return true; 
    }

    public function rules()
    {
        return [
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:trial_days,email',
            'phone' => 'required|string|max:20',
            'date_trial' => 'required|date',
            'start_trial' => 'required',
            'end_trial' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'full_name.required' => 'Nama lengkap wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Email harus berupa alamat email yang valid.',
            'email.unique' => 'Email sudah digunakan, silakan gunakan email yang lain.',
            'phone.required' => 'Nomor telepon wajib diisi.',
            'date_trial.required' => 'Tanggal percobaan wajib diisi.',
            'date_trial.date' => 'Tanggal percobaan harus berupa tanggal yang valid.',
            'start_trial.required' => 'Waktu mulai percobaan wajib diisi.',
            'end_trial.required' => 'Waktu selesai percobaan wajib diisi.',
        ];
    }
}
