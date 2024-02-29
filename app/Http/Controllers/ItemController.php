<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\View\View;

use App\Models\Box;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $items = Item::all();
        return view('items.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $boxes = Box::all();
        return view('items.create', compact('boxes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
            'picture' => 'nullable|string',
            'price' => 'nullable|numeric',
            'box_id' => 'nullable|exists:boxes,id',
        ]);
        if ($request->hasFile('picture')) {
            $path = $request->file('picture')->store('public/images');
            $validated['picture'] = $path;
        }

        dd($validated);
        
        Item::create($validated);
 
        return redirect()->route('items.index')->with('success', 'Item created successfully');
       
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $item = Item::findOrFail($id);
        $boxes = Box::all();
        return view('items.edit', compact('item', 'boxes'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $this->authorize('update', $item);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
            'picture' => 'nullable|string',
            'price' => 'nullable|numeric',
            'box_id' => 'nullable|exists:boxes,id',
        ]);
        if ($request->hasFile('picture')) {
            $path = $request->file('picture')->store('public/images');
            $validated['picture'] = $path;
        }

        Item::whereId($id)->update($validated);

        return redirect()->route('items.index')->with('success', 'Item updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Item::findOrFail($id);
        $item->delete();

        return redirect('items.index')->with('success', 'Item deleted successfully');
    }
    
    public function search(Request $request)
    {
        $query = $request->input('q');
    
        // Filtrar los items basados en el nombre o la descripción que coincidan con la consulta
        $items = Item::where('name', 'like', '%' . $query . '%')
                     ->orWhere('description', 'like', '%' . $query . '%')
                     ->get();
    
        return view('items.index', compact('items'));
    }
}



