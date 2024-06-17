<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function index()
    {
        $classes = [
            ['name' => 'Strength Training', 'description' => 'Build muscle strength and endurance with our expert trainers.'],
            ['name' => 'Body Yoga', 'description' => 'Relax and strengthen your body with our yoga sessions.'],
            ['name' => 'Body Building', 'description' => 'Achieve your bodybuilding goals with customized plans.'],
            ['name' => 'Weight Loss', 'description' => 'Effective weight loss programs to get you in shape.']
        ];

        return view('user.class', [
            'title' => 'Our Classes',
            'classes' => $classes
        ]);
    }
}
