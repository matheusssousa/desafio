<?php

namespace App\Http\Controllers;

use App\Models\Registro;
use App\Http\Requests\StoreRegistroRequest;
use App\Http\Requests\UpdateRegistroRequest;
use App\Repositories\Eloquent\RegistroRepository;
use Illuminate\Http\Request;

class RegistroController extends Controller
{
    public function __construct(protected RegistroRepository $registroRepository)
    {
        //
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $registros = $this->registroRepository->getAll($request); 
        return view('registros.index', compact('registros')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('registros.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRegistroRequest $request)
    {
        $this->registroRepository->create($request->validated());
        return redirect()->route('registros.index')->with('success', 'Registro created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Registro $registro)
    {
        return view('registros.show', compact('registro'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Registro $registro)
    {
        return view('registros.edit', compact('registro'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRegistroRequest $request, Registro $registro)
    {
        $this->registroRepository->update($registro->id, $request->validated());
        return redirect()->route('registros.index')->with('success', 'Registro updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Registro $registro)
    {
        $this->registroRepository->delete($registro->id);
        return redirect()->route('registros.index')->with('success', 'Registro deleted successfully.');
    }

    /**
     * Restore the specified resource from storage.
     */
    public function restore($id)
    {
        $this->registroRepository->restore($id);
        return redirect()->route('registros.index')->with('success', 'Registro restored successfully.');
    }

    /**
     * Force delete the specified resource from storage.
     */
    public function forceDelete($id)
    {
        $this->registroRepository->forceDelete($id);
        return redirect()->route('registros.index')->with('success', 'Registro permanently deleted successfully.');
    }

    /**
     * Download do anexo.
     */
    public function download($id)
    {
        $registro = $this->registroRepository->getById($id);
        return response()->download(storage_path('app/private/' . $registro->anexo));
    }
}
