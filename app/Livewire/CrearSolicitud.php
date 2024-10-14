<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Solicitud;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class CrearSolicitud extends Component
{
    public $name;
    public $email;
    public $curp;
    public $rfc;
    public $clabe;
    public $files;

    use WithFileUploads;

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'curp' => 'required|string|max:18',
        'rfc' => 'required|string|max:13',
        'clabe' => 'required|string|max:18',
        'files' => 'nullable|file|mimes:pdf|max:2048', // Reglas para el archivo
    ];

    public function crearSolicitud()
    {
        $datos = $this->validate();

        //almacenar el documento
        $fil_save = $this->files->store('documentos','public');
        $datos['files'] = $fil_save;
        
        //crear la solicitud
        Solicitud::create([
            'name' => $datos['name'],
            'email' => $datos['email'],
            'curp' => $datos['curp'],
            'rfc' => $datos['rfc'],
            'clabe' => $datos['clabe'],
            'files' => $datos['files'],
            'user_id'=> Auth::id(),
        ]);
        //crear el mensaje
        session()->flash('mensaje','Tu solicitud se registro correctamente');

        //redireccionar al usuario
        return redirect()->route('dashboard');
        

    }

    public function render()
    {
        return view('livewire.crear-solicitud');
    }
}
