<?php

namespace App\Http\Controllers;

use App\Models\Trainer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreTrainerRequest;
use App\Http\Requests\UpdateTrainerRequest;

class TrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $trainers = Trainer::all();
            return view('admin.dataTrainer.index', compact('trainers'));
        } catch (Exception $e) {
            return redirect()->route('data-trainer.index')->with('error', 'Failed to retrieve trainers');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.dataTrainer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTrainerRequest $request)
    {
        try {
            // Store the photo in public/trainer directory
            $filePath = $request->file('trainer_photo')->store('trainer', 'public');
            
            $trainer = Trainer::create([
                'trainer_name' => $request->trainer_name,
                'trainer_photo' => $filePath,
                'phone_number' => $request->phone_number,
                'address' => $request->address,
                'experience' => $request->experience,
                'email' => $request->email,
            ]);

            return redirect()->route('data-trainer.index')->with('success', 'Trainer created successfully');
        } catch (Exception $e) {
            return redirect()->route('data-trainer.index')->with('error', 'Failed to create trainer');
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
        try {
            $data = Trainer::findOrFail($id);
            return view('admin.dataTrainer.edit', compact('data'));
        } catch (Exception $e) {
            return redirect()->route('data-trainer.index')->with('error', 'Failed to retrieve trainers');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTrainerRequest $request, string $id)
    {
        try {
            $trainer = Trainer::findOrFail($id);

            if ($request->hasFile('trainer_photo')) {
                // Delete old photo
                if ($trainer->trainer_photo) {
                    Storage::disk('public')->delete($trainer->trainer_photo);
                }

                // Store new photo
                $filePath = $request->file('trainer_photo')->store('trainer', 'public');
                $trainer->trainer_photo = $filePath;
            }

            $trainer->update($request->only([
                'trainer_name',
                'phone_number',
                'address',
                'experience',
                'email'
            ]));

            return redirect()->route('data-trainer.index')->with('success', 'Trainer updated successfully');
        } catch (Exception $e) {
            return redirect()->route('data-trainer.index')->with('error', 'Failed to update trainer');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $trainer = Trainer::findOrFail($id);

            // Delete the photo
            if ($trainer->trainer_photo) {
                Storage::disk('public')->delete($trainer->trainer_photo);
            }

            $trainer->delete();
            return response()->json(['success' => 'Trainer deleted successfully']);
        } catch (Exception $e) {
            return response()->json(['error' => 'Failed to delete trainer'], 500);
        }
    }
}
