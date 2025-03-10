<?php

namespace App\Http\Controllers;

use App\Models\Solicitud;
use Illuminate\Http\Request;

class SolicitudController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $solicitudes = Solicitud::orderBy('id', 'asc')->get(); // O 'desc' si quieres el más reciente arriba
        return view('solicitudes.index', compact('solicitudes'));
    }

        /*return view('dashboard');*/

    public function actualizarEstado(Request $request, $id)
    {
        $solicitud = Solicitud::findOrFail($id);
        $solicitud->status = $request->estado;
        $solicitud->save();

        return response()->json(['success' => true, 'estado' => $solicitud->status]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('solicitudes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
