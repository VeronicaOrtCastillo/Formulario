<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Solicitud;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use App\Notifications\SolicitudEstadoNotificacion;

class CrearSolicitud extends Component
{
    public $name;
    public $email;
    public $curp;
    public $rfc;
    public $clabe;
    public $files = [];
    public $solicitudEnviada = false;
    public $estadoSolicitud; // Nueva propiedad para el estado de la solicitud
    public $userStatus; // Status del usuario
    public $newFile;



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

        // Obtener el estado del usuario (habilitado o deshabilitado)
        $this->userStatus = Auth::user()->status; 

        // Verificar si el usuario ya tiene una solicitud
        $solicitud = Solicitud::where('user_id', Auth::id())->first();

        if ($solicitud) {
            $this->solicitudEnviada = true;
            $this->estadoSolicitud = $solicitud->status; // Asignar el estado de la solicitud
        } else {
            $this->estadoSolicitud = null; // Si no hay solicitud, el estado es nulo
        }

        
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
        foreach ($this->files as $file) {
            if (!is_string($file)) { // Evita procesar archivos ya guardados en ediciones
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
        $this->estadoSolicitud = 'pendiente'; // Estado inicial cuando se crea la solicitud

        
        //crear el mensaje
        session()->flash('mensaje','Tu solicitud se registro correctamente');

        //redireccionar al usuario
        return redirect()->route('dashboard');
        
    }

    public function updatedNewFile()
    {
        if ($this->newFile) {
            $this->files[] = $this->newFile;
            $this->newFile = null; // Reiniciar la propiedad después de agregar
        }
    }


    public function eliminarArchivo($index)
    {
        unset($this->files[$index]);
        $this->files = array_values($this->files); // Reindexar el array
    }


    public function render()
    {
        return view('livewire.crear-solicitud',[
            'estadoSolicitud' => $this->estadoSolicitud,
            'userStatus' => $this->userStatus,

        ]);
    }

    
}
