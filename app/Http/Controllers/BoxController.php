<?php

namespace App\Http\Controllers;

use App\Models\Box;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BoxController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $boxes = Box::all();
        return view('boxes.index', compact('boxes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('boxes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'label' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
        ]);

        Box::create($validated);

        return redirect()->route('boxes.index')->with('success', 'Box created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Box $box)
    {
        $items = $box->items()->get();
        return view('boxes.show', compact('box', 'items'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Box $box)
    {
        return view('boxes.edit', compact('box'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Box $box)
    {
        $validated = $request->validate([
            'label' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
        ]);

        $box->update($validated);

        return redirect()->route('boxes.index')->with('success', 'Box updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Box $box)
    {
        $box->delete();

        return redirect()->route('boxes.index')->with('success', 'Box deleted successfully');
    }
}
