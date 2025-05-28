<?php
namespace App\Http\Controllers;
use App\Models\Service;
use App\Models\Feature;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        $features = Feature::all();
        return view('pages.services', compact('services', 'features'));
    }

    public function show($slug)
    {
        $service = Service::where('slug', $slug)->firstOrFail();

        return view('pages.services.show', compact('service'));
    }

    public function create()
    {
        return view('pages.services.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $validated['slug'] = Str::slug($validated['title']);
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('services', 'public');
        }

        Service::create($validated);
        return redirect()->route('services')->with('success', 'Service created successfully.');
    }

    public function edit($slug)
    {
        $service = Service::where('slug', $slug)->firstOrFail();
        return view('pages.services.edit', compact('service'));
    }

    public function update(Request $request, $slug)
    {
        $service = Service::where('slug', $slug)->firstOrFail();

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Generate new slug from the updated title
        $newSlug = Str::slug($validated['title']);

        // Check if the new slug is different and doesn't conflict with existing services
        if ($newSlug !== $service->slug) {
            $existingService = Service::where('slug', $newSlug)->where('id', '!=', $service->id)->first();
            if ($existingService) {
                // If slug exists, append a number to make it unique
                $counter = 1;
                $originalSlug = $newSlug;
                while (Service::where('slug', $newSlug)->where('id', '!=', $service->id)->exists()) {
                    $newSlug = $originalSlug . '-' . $counter;
                    $counter++;
                }
            }
        }

        $validated['slug'] = $newSlug;

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($service->image && Storage::disk('public')->exists($service->image)) {
                Storage::disk('public')->delete($service->image);
            }

            // Store new image
            $validated['image'] = $request->file('image')->store('services', 'public');
        }

        // Update the service
        $service->update($validated);

        return redirect()->route('services')->with('success', 'Service updated successfully.');
    }

    public function destroy($slug)
    {
        $service = Service::where('slug', $slug)->firstOrFail();

        // Delete associated image if it exists
        if ($service->image && Storage::disk('public')->exists($service->image)) {
            Storage::disk('public')->delete($service->image);
        }

        $service->delete();

        return redirect()->route('services')->with('success', 'Service deleted successfully.');
    }
}
