<?php

namespace App\Http\Controllers;

use App\Models\Projects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectsController extends Controller
{
    //
    public function index()
    {
        $projects = Projects::latest()->get();

        return view('projects.index', compact(['projects']));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'url' => ['nullable'],
            'title' => ['required'],
            'company' => ['nullable'],
            'description' => ['required'],
            'image' => ['nullable'],
            'skills_used' => ['required'],
            'is_personal_project' => ['boolean'],
        ]);

        $projects = Projects::create($attributes);

        return redirect()->route('dashboard');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $experiences = Projects::findOrFail($id);
        // Return view with success message
        return view('projects.edit', compact('projects'))->with('success', 'Experience updated successfully.');
    }

    // public function update(Request $request, string $id)
    // {
    //     $experiences = Experience::findOrFail($id);
    //     $attributes = $request->validate([
    //         'website_url' => ['nullable'],
    //         'job_title' => ['required'],
    //         'company' => ['nullable'],
    //         'start_date' => ['nullable'],
    //         'end_date' => ['nullable'],
    //         'description' => ['required'],
    //         'skills_used' => ['required'],
    //     ]);
    //     $experiences->update($attributes);
    //     return redirect()->route('dashboard');
    // }

    // public function destroy(string $id)
    // {
    //     $experiences = Experience::findOrFail($id);
    //     $experiences->delete();
    //     return redirect()->route('dashboard');
    // }
}
