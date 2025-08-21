<?php

namespace App\Http\Controllers;

use App\Models\PastReadings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PastReadingsController extends Controller
{
    //
    public function index()
    {
        $pastReadings = PastReadings::latest()->get();

        return view('readings.index', compact(['pastReadings']));
    }

    public function create()
    {
        return view('readings.create');
    }

    public function store(Request $request)
    {
        $request->merge(['user_id' => Auth::user()->id]);
        $attributes = $request->validate([
            'user_id' => ['required'],
            'blog_url' => ['nullable'],
            'blog_title' => ['required'],
            'blog_description' => ['required'],
            'blog_image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'blog_date' => ['required'],
            'read_date' => ['required'],
        ]);

        $imagePath = null;

        // Handle image upload
        if ($request->hasFile('blog_image')) {
            $image = $request->file('blog_image');

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
            $attributes['blog_image'] = $imageName;
        }
        $pastReadings = PastReadings::create($attributes);

        return redirect()->back()->with('success', 'Project created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $readings = PastReadings::findOrFail($id);
        // Return view with success message
        return view('readings.edit', compact('readings'))->with('success', 'Past Reading updated successfully.');
    }

    public function update(Request $request, string $id)
    {
        $readings = PastReadings::findOrFail($id);
        $attributes = $request->validate([
            'user_id' => ['required'],
            'blog_url' => ['nullable'],
            'blog_title' => ['required'],
            'blog_description' => ['required'],
            'blog_image' => 'image|mimes:jpeg,png,jpg,webp|max:2048',
            'blog_date' => ['required'],
            'read_date' => ['required'],
        ]);

        $readings->update($attributes);

        // Handle image upload if a new image is provided
        if ($request->hasFile('blog_image')) {
            // Delete old image if it exists
            if ($readings->image_path && file_exists(public_path($readings->image_path))) {
                unlink(public_path($readings->image_path));
            }

            $image = $request->file('blog_image');

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
            $readings->image_path = 'images/' . $imageName;
        }


        return redirect()->back()->with('success', 'Record updated successfully!');
    }

    public function destroy(string $id)
    {
        $pastReadings = PastReadings::findOrFail($id);
        // Delete the image file if it exists
        if ($pastReadings->blog_image && file_exists(public_path('images/' . $pastReadings->blog_image))) {
            unlink(public_path('images/' . $pastReadings->blog_image));
        }
        $pastReadings->delete();
        return redirect()->route('dashboard');
    }
}
