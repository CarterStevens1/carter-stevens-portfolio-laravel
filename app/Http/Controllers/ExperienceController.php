<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExperienceController extends Controller
{
    //
    public function index() {}

    public function create()
    {
        return view('components.experience.create');
    }

    public function store(Request $request)
    {
        $request->merge(['user_id' => Auth::user()->id]);
        $attributes = $request->validate([
            'user_id' => ['required'],
            'job_title' => ['required'],
            'company' => ['nullable'],
            'start_date' => ['nullable'],
            'end_date' => ['nullable'],
            'description' => ['required'],
            'skills_used' => ['required'],
        ]);

        $experience = Experience::create($attributes);
        return redirect()->route('dashboard');
    }

    public function update() {}

    public function destroy() {}
}
