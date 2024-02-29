<?php
 
namespace App\Http\Controllers;
use App\Models\Vehicle;
 
use Illuminate\Http\Request;
 
class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vehicles = Vehicle::all();
        return view('vehicles.index', compact('vehicles'));
    }
 
    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('vehicles.create');}
 
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'make' => 'required|max:255',
            'model' => 'required|max:255',
            'cv' => 'required|max:255',
            'price' => 'required|numeric',
            'photo ' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048|nullable',
        ]);
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('public/photos');
            $validated['photo'] = $path;
 
        }
        Vehicle::create($validated);
 
        return redirect('vehicles')->with('success','Vehicle created successfully');
       
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }
 
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $vehicle = Vehicle::findOrFail($id);
        return view('vehicles.edit', compact('vehicle'));
    }
 
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'make' => 'required|max:255',
            'model' => 'required|max:255',
            'cv' => 'required|max:255',
            'price' => 'required|numeric',
            'photo ' => 'image|nullable',
        ]);
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('public/photos');
            $validated['photo'] = $path;
        }
       
        Vehicle::whereId($id)->update($validated);
 
        return redirect('/vehicles')->with('success','Vehicle updated successfully');
       
    }
 
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $vehicle = Vehicle::findOrFail($id);
        $vehicle->delete();
        return redirect('vehicles')->with('success','Vehicle deleted successfully');
    }
}