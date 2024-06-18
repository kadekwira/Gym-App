<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriClass;
use Illuminate\Support\Facades\File;
use App\Http\Requests\StoreTipeClassRequest;
use App\Http\Requests\UpdateTipeClassRequest;

class KategoriClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = KategoriClass::all();
        return view('admin.tipeClass.index',compact('datas'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tipeClass.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTipeClassRequest $request)
    {
        $validatedData = $request->validated();

        if ($request->type_image == 'img' && $request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('storage/tipeClass'), $imageName);
            $validatedData['image'] = 'storage/tipeClass/' . $imageName;
        }

        // Handle icon input if the type is 'icon'
        if ($request->type_image == 'icon') {
            $validatedData['image'] = $request->input('image');
        }

        // Create a new KategoriClass instance
        KategoriClass::create([
            'type_image' => $validatedData['type_image'],
            'image' => $validatedData['image'],
            'nama_kategori' => $validatedData['nama_kategori'],
            'description' => $validatedData['description'],
        ]);

        // Redirect back with a success message
        return redirect()->route('tipe-class.index')->with('success', 'Kategori Class created successfully.');
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
        $data = KategoriClass::findOrFail($id);
        return view('admin.tipeClass.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTipeClassRequest $request, string $id)
    {
        $validatedData = $request->validated();

        $kategoriClass = KategoriClass::findOrFail($id);

        if ($request->type_image == 'img' && $request->hasFile('image')) {
            if ($kategoriClass->type_image == 'img' && File::exists(public_path($kategoriClass->image))) {
                File::delete(public_path($kategoriClass->image));
            }

            $imageName = time() . '.' . $request->image->extension();  
            $request->image->move(public_path('storage/tipeClass'), $imageName);
            $validatedData['image'] = 'storage/tipeClass/' . $imageName;
        } else {
            $validatedData['image'] = $kategoriClass->image;
        }
        if ($request->type_image == 'icon') {
            if ($kategoriClass->type_image == 'img' && File::exists(public_path($kategoriClass->image))) {
                File::delete(public_path($kategoriClass->image));
            }
            $validatedData['image'] = $request->input('image');
        }

        // Update the KategoriClass instance
        $kategoriClass->update([
            'type_image' => $validatedData['type_image'],
            'image' => $validatedData['image'],
            'nama_kategori' => $validatedData['nama_kategori'],
            'description' => $validatedData['description'],
        ]);

        // Redirect back with a success message
        return redirect()->route('tipe-class.index')->with('success', 'Kategori Class updated successfully.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $data = KategoriClass::findOrFail($id);
            $data->delete();
            return response()->json(['success' => 'Data berhasil dihapus']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Terjadi kesalahan saat menghapus data'], 500);
        }
    }
}
