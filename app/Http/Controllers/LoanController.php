<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Loan;
use App\Models\Item;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::all(); // Obtener todos los ítems disponibles para préstamo
        $item = Item::first(); // Obtener un ítem (esto es solo un ejemplo, ajusta según tus necesidades)
        return view('loans.index', compact('items', 'item'));
    }




    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        return view('loans.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'item_id' => 'required|exists:items,id',
            'checkout_date' => 'required|date',
            'due_date' => 'required|date',
            'returned_date' => 'nullable|date',
        ]);

        Loan::create($validated);

        return redirect('loans')->with('success', 'Loan created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Loan $loan)
    {
        return view('loans.show', compact('loan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Loan $loan): View
    {
        return view('loans.edit', compact('loan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Loan $loan)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'item_id' => 'required|exists:items,id',
            'checkout_date' => 'required|date',
            'due_date' => 'required|date',
            'returned_date' => 'nullable|date',
        ]);

        $loan->update($validated);

        return redirect()->route('loans.index')->with('success', 'Loan updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Loan $loan)
    {
        $loan->delete();

        return redirect()->route('loans.index')->with('success', 'Loan deleted successfully');
    }

    public function return(Request $request, $id)
    {
        $loan = Loan::findOrFail($id);

        // Lógica para devolver el préstamo
        if ($loan->returned_date) {
            // El artículo ya ha sido devuelto, puedes agregar una lógica adicional si es necesario
        } else {
            // El artículo aún no ha sido devuelto, actualiza la fecha de devolución
            $loan->update(['returned_date' => now()]);
        }

        return redirect()->route('items.index')->with('success', 'Préstamo actualizado correctamente');
    }
}
