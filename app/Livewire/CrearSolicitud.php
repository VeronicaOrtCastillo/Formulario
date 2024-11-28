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
    public $files = [];
    public $solicitudEnviada = false;

    use WithFileUploads;

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'curp' => 'required|string|max:18',
        'rfc' => 'required|string|max:13',
        'clabe' => 'required|string|max:18',
        'files.*' => 'nullable|file|mimes:pdf|max:2048', // Reglas para el archivo
    ];

    public function mount()
    {
        // Prellenar el nombre y el correo del usuario autenticado
        $this->name = Auth::user()->name;
        $this->email = Auth::user()->email;

        // Verificar si el usuario ya tiene una solicitud
        $this->solicitudEnviada = Solicitud::where('user_id', Auth::id())->exists();
    
    }

    public function crearSolicitud()
    {
        // Verificar si el usuario ya tiene una solicitud
        if ($this->solicitudEnviada) {
            session()->flash('mensaje', 'Ya has enviado una solicitud.');
            return;
        }

        $datos = $this->validate();

        //Convertir CURP Y RFC a mayusculas antes de guardar
        $datos['curp'] = strtoupper($datos['curp']);
        $datos['rfc'] = strtoupper($datos['rfc']);

        //almacenar los archivos
        $archivosGuardados = [];
        if (!empty($this->files)) {
            foreach ($this->files as $file) {
                $archivosGuardados[] = $file->store('documentos', 'public');
            }
        }
            
        //crear la solicitud
        Solicitud::create([
            'name' => $datos['name'],
            'email' => $datos['email'],
            'curp' => $datos['curp'],
            'rfc' => $datos['rfc'],
            'clabe' => $datos['clabe'],
            'files' => json_encode($archivosGuardados),
            'user_id'=> Auth::id(),
        ]);

        // Actualizar el estado de la solicitud
        $this->solicitudEnviada = true;
        
        //crear el mensaje
        session()->flash('mensaje','Tu solicitud se registro correctamente');

        //redireccionar al usuario
        return redirect()->route('dashboard');
        

    }

    public function render()
    {
        // Pasar el estado del usuario a la vista
        $userStatus = Auth::user()->status; // Asumiendo que 'status' indica habilitado o deshabilitado

        return view('livewire.crear-solicitud',['userStatus' => $userStatus]);
    }
}
