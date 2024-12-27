<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jet;

class ReviewController extends Controller
{
    public function store(Request $request, Jet $jet)
    {
        $validated = $request->validate([
            'reviewer_name' => 'required|string|max:255',
            'text' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $jet->reviews()->create(array_merge($validated, ['status' => 'pending']));

        return redirect()->route('jets.show', $jet)->with('success', 'Review added successfully.');
    }
}
