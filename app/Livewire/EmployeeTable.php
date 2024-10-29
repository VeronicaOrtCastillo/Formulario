<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;


class EmployeeTable extends Component
{
    public function render()
    {
        // Filtramos para obtener solo empleados
        $employees = User::where('usertype', 'user')->get();

        return view('livewire.employee-table', compact('employees'));
    }

    public function activate($id)
    {
        $employee = User::find($id);
        if ($employee) {
            $employee->status = true;
            $employee->save();
            session()->flash('mensaje', 'Empleado activado correctamente.');
        }
    }

    public function deactivate($id)
    {
        $employee = User::find($id);
        if ($employee) {
            $employee->status = false;
            $employee->save();
            session()->flash('mensaje', 'Empleado desactivado correctamente.');
        }
    }

}
