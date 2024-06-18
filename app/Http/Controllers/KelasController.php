<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Trainer;
use Illuminate\Http\Request;
use App\Models\KategoriClass;
use App\Http\Requests\StoreClassRequest;
use App\Http\Requests\UpdateClassRequest;
use Illuminate\Support\Facades\Storage;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Kelas::with(['trainer', 'kategori_class'])->get();
        return view('admin.dataClass.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $trainers = Trainer::all();
        $kategories = KategoriClass::all();
        return view('admin.dataClass.create',compact('trainers','kategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClassRequest $request)
    {
        
        try {
            $validatedData = $request->validated();
            
            if ($request->hasFile('image')) {
                $filePath = $request->file('image')->store('class', 'public');
                $validatedData['image'] = $filePath;
            }
            $validatedData['class_price'] = 0;
    
            Kelas::create($validatedData);
            
            return redirect()->route('data-class.index')->with('success', 'Class berhasil dibuat.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat membuat class.']);
        }
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Kelas::with(['trainer', 'kategori_class'])->findOrFail($id);
        $trainers = Trainer::all();
        $kategories = KategoriClass::all();
        return view('admin.dataClass.edit', compact('data','trainers','kategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClassRequest $request, string $id)
    {
        try {
            // Validasi data
            $validatedData = $request->validated();
    
            // Temukan kelas berdasarkan ID
            $kelas = Kelas::findOrFail($id);
    
            // Cek apakah ada file gambar yang diunggah
            if ($request->hasFile('image')) {
                // Hapus foto lama jika ada
                if ($kelas->image) {
                    Storage::disk('public')->delete($kelas->image);
                }
    
                // Simpan foto baru
                $filePath = $request->file('image')->store('class', 'public');
                $validatedData['image'] = $filePath;
            }
    
            // Perbarui data kelas
            $kelas->update($validatedData);
    
            // Redirect dengan pesan sukses
            return redirect()->route('data-class.index')->with('success', 'Class berhasil diperbarui.');
        } catch (\Exception $e) {
            // Redirect dengan pesan error
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat memperbarui class.']);
        }
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
