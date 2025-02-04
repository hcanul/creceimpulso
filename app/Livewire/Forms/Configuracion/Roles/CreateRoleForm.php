<?php

namespace App\Livewire\Forms\Configuracion\Roles;

use Livewire\Attributes\Validate;
use Livewire\Form;
use Spatie\Permission\Models\Role;

class CreateRoleForm extends Form
{
    #[Validate('required', as: 'Nombre del Rol')]
    #[Validate('unique:roles,name', as:'Nombre del Rol')]
    public $name;

    public function resetUI()
    {
        $this->resetValidation();
        $this->reset(['name']);
    }

    public function Save()
    {
        $this->validate();
        Role::create(['name' => $this->name, 'guard_name' =>'web']);
    }
}
