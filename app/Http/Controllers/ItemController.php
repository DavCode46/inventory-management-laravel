<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Validation\ValidationException;
use App\Models\Loan;
use Illuminate\Support\Facades\Storage;

use App\Models\Box;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $items = Item::all();
        $items->load('loans');
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
        // dd($request->all()); esto me permite ver el array que se envia.
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable|max:255',
            'price' => 'nullable|numeric',
            'box_id' => 'nullable|exists:boxes,id',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048|nullable',
        ]);


        if ($request->hasFile('picture')) {
            $validated['picture'] = $request->file('picture')->store('public/images');
        }


        Item::create($validated);

        return redirect('items')->with('success', 'Item created successfully');
    }




    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        return view('items.show', compact('item'));
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
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'price' => 'required|numeric',
            'box_id' => 'nullable|exists:boxes,id',
            'picture ' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048|nullable',
        ]);


        if ($request->hasFile('picture')) {
            $validated['picture'] = $request->file('picture')->store('public/images');

            if ($item->picture) {
                Storage::delete($item->picture);
            }
        }

        $item->update($validated);

        return redirect('items');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Item::findOrFail($id);
        $item->delete();

        return redirect()->route('items.index')->with('success', 'Item deleted successfully');
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
