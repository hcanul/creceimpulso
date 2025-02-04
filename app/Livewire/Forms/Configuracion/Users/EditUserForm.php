<?php

namespace App\Livewire\Forms\Configuracion\Users;

use App\Models\User;
use Livewire\Attributes\Validate;
use Livewire\Form;

class EditUserForm extends Form
{
    #[Validate('required', as: 'Nombre')]
    #[Validate('min:3', as: 'Nombres')]
    public $name;

    #[Validate('required', as: 'Correo')]
    public $email;


    #[Validate('required', as: 'Rol Usuario')]
    public $profile;

    #[Validate('required', as: 'Oficina')]
    public $city_id;

    #[Validate('required', as: 'Apellido Paterno')]
    public $apaterno;

    #[Validate('required', as: 'Apellido Materno')]
    public $amaterno;

    public function loadData($id)
    {
        $user = User::findOrFail($id);

        $this->name = $user->name;
        $this->email = $user->email;
        $this->profile = $user->profile;
        $this->city_id = $user->city_id;
        $this->apaterno = $user->apaterno;
        $this->amaterno = $user->amaterno;
    }

    public function setData($id)
    {
        $this->validate();

        $user = User::findOrFail($id);

        $user->update($this->only(['name', 'email', 'profile', 'city_id', 'apaterno', 'amaterno']));

        $this->resetUI();
    }

    public function resetUI()
    {
        $this->resetValidation();
        $this->reset(['name', 'email', 'profile', 'city_id', 'apaterno', 'amaterno']);
    }
}
