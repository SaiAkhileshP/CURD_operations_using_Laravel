<?php

namespace App\Http\Controllers;
use App\Models\sample;
use Illuminate\Http\Request;

class sampleController extends Controller
{
    //
    public function index(){
        $samples =sample::paginate(2);
        return view("samples.index",compact("samples"));
    }

     // Show the form to create a new record
    public function create()
    {
        return view('samples.create');
    }

    // Store a new record in the database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:samples,email',
            'age'=>'required|numeric|nullable',
            'description' => 'nullable|string',
            'is_active' => 'boolean',
            'gender' => 'required',
            'role' => 'nullable|string',
            'profile_picture' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'preferences' => 'nullable|array',
            'status' => 'required|string',
        ]);

        // Handle file upload
        if ($request->hasFile('profile_picture')) {
            $validated['profile_picture'] = $request->file('profile_picture')->store('profile_pictures', 'public');
        }

        $validated['preferences'] = json_encode($validated['preferences'] ?? []);

        Sample::create($validated);

        return redirect()->route('samples.index')->with('success', 'Record added successfully.');
    }

    // Show the form to edit an existing record
    public function edit($id)
    {
        $sample = Sample::findOrFail($id);
        return view('samples.edit', compact('sample'));
    }

    // Update an existing record in the database
    public function update(Request $request, $id)
    {
        $sample = Sample::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => "required|email|unique:samples,email,{$id}",
            'age'=>"required|numeric|nullable",
            'description' => 'nullable|string',
            'is_active' => 'boolean',
            'gender' => 'required',
            'role' => 'nullable|string',
            'profile_picture' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'preferences' => 'nullable|array',
            'status' => 'required|string',
        ]);

        // Handle file upload
        if ($request->hasFile('profile_picture')) {
            $validated['profile_picture'] = $request->file('profile_picture')->store('profile_pictures', 'public');
        }

        $validated['preferences'] = json_encode($validated['preferences'] ?? []);

        $sample->update($validated);

        $sample = Sample::findOrFail($id);
        $sample->update($request->all()); // Update the record


        return redirect()->route('samples.index')->with('success', 'Record updated successfully.');
    }

    // Delete a record using AJAX
    public function destroy($id)
    {
        $sample = Sample::findOrFail($id);
        $sample->delete();

        return response()->json(['success' => 'Record deleted successfully.']);
    }

}
