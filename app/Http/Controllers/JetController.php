<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jet;

class JetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Jet::query();

        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('model', 'like', '%' . $request->search . '%');
        }

        return view('jets.index', ['jets' => $query->get()]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'capacity' => 'required|integer|min:1',
            'hourly_rate' => 'required|numeric|min:0',
        ]);

        Jet::create($validated);

        return redirect()->route('jets.index')->with('success', 'Jet added successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Jet $jet)
    {
        $jet->load('reviews'); // Load associated reviews
        return view('jets.show', compact('jet'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jet $jet)
    {
        return view('jets.edit', compact('jet'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jet $jet)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'capacity' => 'required|integer|min:1',
            'hourly_rate' => 'required|numeric|min:0',
        ]);

        $jet->update($validated);

        return redirect()->route('jets.index')->with('success', 'Jet updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jet $jet)
    {
        $jet->reviews()->delete(); // Delete related reviews
        $jet->delete(); // Delete the jet
    
        return redirect()->route('jets.index')->with('success', 'Jet deleted successfully.');
    }
}
