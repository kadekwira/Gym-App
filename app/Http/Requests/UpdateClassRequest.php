<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClassRequest extends FormRequest
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
            'trainer_id' => 'required|integer',
            'schedule' => 'required',
            'duration_minutes' => 'required|integer|min:0',
            'capacity' => 'required|integer|min:1',
            'status' => 'required|in:open,close',
            'id_kategori_class' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
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
            'schedule.required' => 'Tanggal jadwal wajib diisi.',
            'duration_minutes.required' => 'Durasi dalam menit wajib diisi.',
            'duration_minutes.integer' => 'Durasi dalam menit harus berupa angka.',
            'duration_minutes.min' => 'Durasi dalam menit harus minimal 0.',
            'capacity.required' => 'Kapasitas wajib diisi.',
            'capacity.integer' => 'Kapasitas harus berupa angka.',
            'capacity.min' => 'Kapasitas harus minimal 1.',
            'status.required' => 'Status wajib diisi.',
            'status.in' => 'Status harus berupa open dan close',
            'id_kategori_class.required' => 'Kategori kelas wajib diisi.',
            'id_kategori_class.integer' => 'Kategori kelas harus berupa angka.',
            'image.image' => 'File harus berupa gambar.',
            'image.mimes' => 'Gambar harus berupa file tipe: jpeg, png, jpg, gif, svg.',
            'image.max' => 'Gambar tidak boleh lebih dari 2048 kilobytes.',
        ];
    }
}
