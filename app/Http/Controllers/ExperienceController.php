<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExperienceController extends Controller
{
    //
    public function index()
    {
        $experiences = Experience::orderBy('start-date', 'desc')->get();

        return view('experience.index', compact(['experiences']));
    }

    public function create()
    {
        return view('experience.create');
    }

    public function store(Request $request)
    {
        $request->merge(['user_id' => Auth::user()->id]);
        $attributes = $request->validate([
            'user_id' => ['required'],
            'website_url' => ['nullable'],
            'job_title' => ['required'],
            'company' => ['nullable'],
            'start_date' => ['nullable'],
            'end_date' => ['nullable'],
            'description' => ['required'],
            'skills_used' => ['required'],
        ]);

        $experience = Experience::create($attributes);

        return redirect()->back()->with('success', 'Experience created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $experiences = Experience::findOrFail($id);
        // Return view with success message
        return view('experience.edit', compact('experiences'))->with('success', 'Experience updated successfully.');
    }

    public function update(Request $request, string $id)
    {
        $experiences = Experience::findOrFail($id);
        $attributes = $request->validate([
            'website_url' => ['nullable'],
            'job_title' => ['required'],
            'company' => ['nullable'],
            'start_date' => ['nullable'],
            'end_date' => ['nullable'],
            'description' => ['required'],
            'skills_used' => ['required'],
        ]);
        $experiences->update($attributes);
        return redirect()->route('dashboard');
    }

    public function destroy(string $id)
    {
        $experiences = Experience::findOrFail($id);
        $experiences->delete();
        return redirect()->route('dashboard');
    }
}
