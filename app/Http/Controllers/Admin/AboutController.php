<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Data';
        $abouts = About::get();
        return view('admin.about.index', compact('title', 'abouts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Create New Data';
        return view('admin.about.create-edit', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $photo = null;
        if($request->hasFile('photo')) {
            $photo = $request->file('photo')->store('blog', 'public');
        }

        About::create([
            'name' => $request->name,
            'birthday' => $request->birthday,
            'email' => $request->email,
            'address' => $request->address,
            'telp' => $request->telp,
            'postal_code' => $request->postal_code,
            'description' => $request->description,
            'github' => $request->github,
            'linkedin' => $request->linkedin,
            'porto' => $request->porto,
            'photo' => $photo,
            'is_active' => $request->is_active,
            'author' => auth()->user()->name,
        ]);

        return redirect()->to('admin/about');
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
        $about = About::findOrFail($id);
        $title = 'Edit About'; // Passes title to your Blade file

        return view('admin.about.create-edit', compact('about', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $about = About::findOrFail($id);
        if ($request->hasFile('photo')) {
            // Delete the old photo if it exists
            if ($about->photo && Storage::disk('public')->exists($about->photo)) {
                Storage::disk('public')->delete($about->photo);
            }
            // Store the new photo
            $validated['photo'] = $request->file('photo')->store('photos', 'public');
        } else {
            // If no new photo is uploaded, remove it from the update array so it doesn't overwrite the old path with null
            unset($validated['photo']);
        }

        $about->update($validated);

        // Change 'about.index' to your actual redirect route
        return redirect()->route('about.index')->with('success', 'Data updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $about = About::findOrFail($id);
        if($about->photo) {
            Storage::disk('public')->delete($about->photo);
        }
        $about->delete();
        return redirect()->to('admin/about')->with('success', 'Data deleted successfully');
    }
}
