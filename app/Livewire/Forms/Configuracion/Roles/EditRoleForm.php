<?php

namespace App\Livewire\Forms\Configuracion\Roles;

use Livewire\Attributes\Validate;
use Livewire\Form;
use Spatie\Permission\Models\Role;

class EditRoleForm extends Form
{
    #[Validate('required', as: 'Nombre del Rol')]
    #[Validate('unique:roles,name', as:'Nombre del Rol')]
    public $name;

    public function loadData($id)
    {
        $role = Role::findOrFail($id);

        $this->name = $role->name;
    }

    public function setData($id)
    {
        $this->validate();

        $role = Role::findOrFail($id);

        $role->update(['name'=>$this->name]);
    }

    public function resetUI()
    {
        $this->resetValidation();

        $this->reset(['name']);
    }
}
