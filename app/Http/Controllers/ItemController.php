<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Validation\ValidationException;
use App\Models\Loan;

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
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string|max:500',
                'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048|nullable', // Asegúrate de que el campo 'picture' sea una imagen
                'price' => 'nullable|numeric',
                'box_id' => 'nullable|exists:boxes,id',
            ]);

            // Guardar la imagen en el almacenamiento
            if ($request->hasFile('picture')) {
                $path = $request->file('picture')->store('public/images');
                $validated['picture'] = asset(str_replace('public', 'storage', $path));
            }


            // Crear un nuevo ítem con los datos validados
            Item::create($validated);

            return redirect()->route('items.index')->with('success', 'Item created successfully');
        } catch (ValidationException $e) {
            return redirect()->route('items.create')
                ->withErrors($e->errors())
                ->withInput();
        }
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
    public function update(Request $request, string $id)
    {
        // $this->authorize('update', $item);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048|nullable', // Asegúrate de que el campo 'picture' sea una imagen
            'price' => 'nullable|numeric',
            'box_id' => 'nullable|exists:boxes,id',
        ]);

        if ($request->hasFile('picture')) {
            $path = $request->file('picture')->store('public/images');
            $validated['picture'] = asset(str_replace('public', 'storage', $path));
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

    public function lend($id)
    {
        // Lógica para realizar el préstamo aquí

        // Por ejemplo, crear un registro en la tabla de préstamos
        Loan::create([
            'item_id' => $id,
            'user_id' => auth()->id(), // Suponiendo que tengas un sistema de autenticación y el usuario actual esté autenticado
            'checkout_date' => now(), // Fecha actual como fecha de préstamo
            'due_date' => now()->addDays(7), // Fecha de vencimiento 7 días después de la fecha de préstamo
        ]);

        // Redireccionar de vuelta al listado de ítems con un mensaje de éxito
        return redirect()->route('items.index')->with('success', 'Item lent successfully');
    }

    public function returnItem($id)
    {
        // Obtener el artículo basado en su ID
        $item = Item::findOrFail($id);

        // Verificar si el artículo está prestado
        if ($item->is_loaned) {
            // Actualizar el estado del préstamo (por ejemplo, establecer la fecha de devolución)
            $loan = Loan::where('item_id', $item->id)->whereNull('returned_date')->first();
            if ($loan) {
                $loan->returned_date = now();
                $loan->save();
            }

            // Aquí puedes realizar otras acciones, como enviar notificaciones al usuario que prestó el artículo

            return redirect()->route('items.index')->with('success', 'Item returned successfully');
        } else {
            // El artículo no está prestado
            return redirect()->route('items.index')->with('error', 'Item is not currently loaned');
        }
    }
}
