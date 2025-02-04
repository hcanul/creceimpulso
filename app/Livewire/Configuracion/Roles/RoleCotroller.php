<?php

namespace App\Livewire\Configuracion\Roles;

use App\Livewire\Forms\Configuracion\Roles\CreateRoleForm;
use App\Livewire\Forms\Configuracion\Roles\EditRoleForm;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class RoleCotroller extends Component
{
    use WithPagination;

    public CreateRoleForm $createForm;

    public EditRoleForm $editForm;

    public $extraActions = null;

    #[Url()]
    public $search;

    public $selected_id, $pageTitle, $componentName,  $open;

    public $pagination = 10;

    public $columns = [ 'name' => 'NOMBRE', 'guard_name' => 'NOMBRE DE GUARDIA'];

    public $displayColumns = [ 'name', 'guard_name' ];

    public $headers = [ 'NOMBRE', 'NOMBRE DE GUARDIA' ];

    public function mount()
    {
        $this->search = null;
        $this->selected_id = null;
        $this->pageTitle = null;
        $this->componentName = null;
        $this->open = false;
        $this->pageTitle = 'LISTADO';
        $this->componentName = 'SECCIÓN DE ROLES DE USUARIO';
    }

    public function render()
    {
        if ($this->search)
        {
            $rows = Role::whereLike('name', '%' . $this->search . '%')->paginate($this->pagination);
        }else{
            $rows = Role::orderBy('name', 'asc')->paginate($this->pagination);
        }

        return view('livewire.configuracion.roles.component', [
            'rows'=>$rows,
        ])
            ->extends('layouts.themes.app')
            ->section('content');
    }

    public function resetUI()
    {
        $this->search = null;
        $this->selected_id = null;
        $this->pageTitle = null;
        $this->componentName = null;
        $this->open = false;
        $this->pageTitle = 'LISTADO';
        $this->componentName = 'SECCIÓN DE USUARIOS';
    }

    public function newAdd()
    {
        $this->selected_id = null;
        $this->open = true;
        $this->createForm->resetUI();
    }

    public function Store()
    {
        $this->createForm->Save();
        $this->resetUI();
        $this->dispatch('sweet-toast', icon:'success', title:'Registro Creado exitosamente!!');
    }

    public function Editar($id)
    {
        $this->open = true;
        $this->selected_id = $id;
        $this->editForm->loadData($id);
    }

    public function Update()
    {
        $this->editForm->setData($this->selected_id);
        $this->resetUI();
        $this->dispatch('sweet-toast', icon:'success', title:'Registro editado con exito!!');
    }

    public function confirmDelete(Role $role)
    {
        $role->deleteOrFail();
        $this->dispatch('sweet-toast', icon:'success', title:'Registro eliminado con exito!!');
    }
}
