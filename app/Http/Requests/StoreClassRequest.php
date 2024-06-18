<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClassRequest extends FormRequest
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
        return [
            'class_name' => 'required|string|max:255',
            'description' => 'required|string',
            'class_price' => 'nullable|numeric|min:0|max:999999999',
            'trainer_id' => 'required|integer|exists:trainers,id',
            'schedule' => 'required',
            'duration_minutes' => 'required|integer|min:0',
            'capacity' => 'required|integer|min:1',
            'status' => 'required|in:open,close',
            'id_kategori_class' => 'required|',
            'image' => 'required|',
        ];
    }

    public function messages()
    {
        return [
            'class_name.required' => 'Nama kelas wajib diisi.',
            'class_name.string' => 'Nama kelas harus berupa string.',
            'class_name.max' => 'Nama kelas tidak boleh lebih dari 255 karakter.',
            'description.required' => 'Deskripsi wajib diisi.',
            'description.string' => 'Deskripsi harus berupa string.',
            'class_price.numeric' => 'Harga kelas harus berupa angka.',
            'class_price.min' => 'Harga kelas harus minimal 0.',
            'class_price.max' => 'Harga kelas tidak boleh lebih dari 999999999.',
            'trainer_id.required' => 'ID pelatih wajib diisi.',
            'trainer_id.integer' => 'ID pelatih harus berupa angka.',
            'trainer_id.exists' => 'Pelatih yang dipilih tidak ada.',
            'schedule.required' => 'Tanggal jadwal wajib diisi.',
            'duration_minutes.required' => 'Durasi dalam menit wajib diisi.',
            'duration_minutes.integer' => 'Durasi dalam menit harus berupa angka.',
            'duration_minutes.min' => 'Durasi dalam menit harus minimal 0.',
            'capacity.required' => 'Kapasitas wajib diisi.',
            'capacity.integer' => 'Kapasitas harus berupa angka.',
            'capacity.min' => 'Kapasitas harus minimal 1.',
            'status.required' => 'Status wajib diisi.',
            'status.in' => 'Status harus berupa open dan close',
            'id_kategori_class'=>'Kategori class wajib diisi.',
            'image'=>'image class wajib diisi.',
        ];
    }
}
