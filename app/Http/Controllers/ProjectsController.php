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
        $request->merge(['user_id' => Auth::user()->id]);
        $attributes = $request->validate([
            'user_id' => ['required'],
            'url' => ['nullable'],
            'title' => ['required'],
            'company' => ['nullable'],
            'description' => ['required'],
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'skills_used' => ['required'],
            'is_personal_project' => ['string'],
        ]);

        $attributes['is_personal_project'] = array_key_exists('is_personal_project', $attributes);


        $imagePath = null;

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');

            // Create images directory if it doesn't exist
            $destinationPath = public_path('images');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            // Generate unique filename
            $imageName = time() . '_' . $image->getClientOriginalName();

            // Move file to public/images directory
            $image->move($destinationPath, $imageName);

            // Store relative path for database
            $imagePath = 'images/' . $imageName;
            // Update image in attributes
            $attributes['image'] = $imageName;
        }
        $projects = Projects::create($attributes);

        return redirect()->back()->with('success', 'Project created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $project = Projects::findOrFail($id);
        // Return view with success message
        return view('projects.edit', compact('project'))->with('success', 'Experience updated successfully.');
    }

    public function update(Request $request, string $id)
    {
        $project = Projects::findOrFail($id);
        $attributes = $request->validate([
            'url' => ['nullable'],
            'title' => ['required'],
            'company' => ['nullable'],
            'description' => ['required'],
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'skills_used' => ['required'],
            'is_personal_project' => ['boolean'],
        ]);

        $project->update($attributes);

        // Handle image upload if a new image is provided
        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($project->image_path && file_exists(public_path($project->image_path))) {
                unlink(public_path($project->image_path));
            }

            $image = $request->file('image');

            // Create images directory if it doesn't exist
            $destinationPath = public_path('images');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            // Generate unique filename
            $imageName = time() . '_' . $image->getClientOriginalName();

            // Move file to public/images directory
            $image->move($destinationPath, $imageName);

            // Update the image path
            $project->image_path = 'images/' . $imageName;
        }


        return redirect()->back()->with('success', 'Record updated successfully!');
    }

    public function destroy(string $id)
    {
        $project = Projects::findOrFail($id);
        // Delete the image file if it exists
        if ($project->image && file_exists(public_path('images/' . $project->image))) {
            unlink(public_path('images/' . $project->image));
        }
        $project->delete();
        return redirect()->route('dashboard');
    }
}
