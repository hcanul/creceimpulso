<?php

namespace App\Livewire\Forms\Configuracion\Users;

use APP\Helpers\UserHelper;
use App\Models\User;
use Livewire\Attributes\Validate;
use Livewire\Form;

class CreateUserForm extends Form
{
    #[Validate('required', as: 'Nombre')]
    #[Validate('min:3', as: 'Nombres')]
    public $name;

    #[Validate('required', as: 'Correo')]
    #[Validate('unique:users,email', as: 'Correo')]
    public $email;


    #[Validate('required', as: 'Rol Usuario')]
    public $profile;

    #[Validate('required', as: 'Oficina')]
    public $city_id;

    #[Validate('required', as: 'Apellido Paterno')]
    public $apaterno;

    #[Validate('required', as: 'Apellido Materno')]
    public $amaterno;


    public function Save()
    {
        $this->validate();

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt(UserHelper::GeneratePassword($this->name, $this->apaterno, $this->amaterno)),
            'profile' => $this->profile,
            'city_id' =>$this->city_id,
            'status' => 'ACTIVO',
            'apaterno' =>$this->apaterno,
            'amaterno' => $this->amaterno
        ]);

        return UserHelper::GeneratePassword($this->name, $this->apaterno, $this->amaterno);
    }

    public function resetUI()
    {
        $this->resetValidation();

        $this->reset(['name', 'email', 'password', 'profile', 'city_id', 'apaterno', 'amaterno']);
    }
}
