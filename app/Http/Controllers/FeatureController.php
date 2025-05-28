<?php
namespace App\Http\Controllers;

use App\Models\Feature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FeatureController extends Controller
{
    public function index()
    {
        $features = Feature::all();
        return view('pages.features.index', compact('features'));
    }

    public function create()
    {
        return view('pages.features.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ], [
            'image.image' => 'The uploaded file must be an image.',
            'image.mimes' => 'Only JPG, JPEG, and PNG formats are supported.',
            'image.max' => 'The image size should not exceed 2MB.',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('features', 'public');
        }

        Feature::create($validated);
        return redirect()->route('services')->with('success', 'Feature created successfully.');
    }

    public function show($id)
    {
        $feature = Feature::findOrFail($id);
        return view('pages.features', compact('feature'));
    }

    public function edit($id)
    {
        $feature = Feature::findOrFail($id);
        return view('pages.features.edit', compact('feature'));
    }

    public function update(Request $request, $id)
    {
        $feature = Feature::findOrFail($id);
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ], [
            'image.image' => 'The uploaded file must be an image.',
            'image.mimes' => 'Only JPG, JPEG, and PNG formats are supported.',
            'image.max' => 'The image size should not exceed 2MB.',
        ]);

        if ($request->hasFile('image')) {
            if ($feature->image) {
                Storage::disk('public')->delete($feature->image);
            }
            $validated['image'] = $request->file('image')->store('features', 'public');
        }

        $feature->update($validated);
        return redirect()->route('services')->with('success', 'Feature updated successfully.');
    }

    public function destroy($id)
    {
        $feature = Feature::findOrFail($id);
        if ($feature->image) {
            Storage::disk('public')->delete($feature->image);
        }
        $feature->delete();
        return redirect()->route('services')->with('success', 'Feature deleted successfully.');
    }
}
