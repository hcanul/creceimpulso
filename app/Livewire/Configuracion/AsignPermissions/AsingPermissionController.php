<?php

namespace App\Livewire\Configuracion\AsignPermissions;

use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AsingPermissionController extends Component
{
    use WithPagination;

    public $role, $pageTitle, $componentName, $permisosSelectet = [], $old_permissions = [];

    #[Url()]
    public $search;

    private $pagination = 10;

    public function mount()
    {
        $this->search = '';
        $this->pageTitle = 'LISTADO';
        $this->componentName = 'ASIGNACIÓN de PERMISOS';
    }

    public function render()
    {
        $roles = Role::orderBy('id', 'asc')->get();
        $permissions = Permission::select('id', 'name', DB::raw("0 as checked"))
                        ->orderBy('id', 'asc')
                        ->paginate($this->pagination);

        if ($this->role) {
            $role = Role::find($this->role);
            foreach ($permissions as $perms) {
                $perms->checked = $role->hasPermissionTo($perms->name);
            }
        }

        return view('livewire.configuracion.asign-permissions.component',[
            'roles' => $roles,
            'permissions' => $permissions,
        ])
                ->extends('layouts.themes.app')
                ->section('content');
    }

    public function RemoveAll()
    {
        if ($this->role == null || $this->role == 'Elegir')
        {

            $this->dispatch('sweet-toast', icon:'error', title:'Ocurrio un error');
            return;
        }

        $role = Role::find($this->role);
        $role->syncPermissions([0]);
        $this->dispatch('sweet-toast', icon:'success', title:"Actualización exitosa");
    }

    public function SyncAll()
    {
        if ($this->role == null || $this->role == 'Elegir')
        {

            $this->dispatch('sweet-toast', icon:'error', title:'Seleccione un Rol Valido');
            return;
        }

        $role = Role::find($this->role);
        $permissions = Permission::pluck('id')->toArray();
        $role->syncPermissions($permissions);
        $this->dispatch('sweet-toast', icon:'success', title:"Se Sincronizaron todos los permisos al Rol: $role->name");
    }

    public function SyncPermiso($state, $permisoName)
    {
        if ($this->role != null || $this->role != 'Elegir')
        {
            $roleName = Role::find($this->role);
            if ($state)
            {
                try {
                    $roleName->givePermissionTo($permisoName);
                    $this->dispatch('sweet-toast', icon:'success', title:'Actualización exitosa');
                } catch (\Throwable $th) {
                    $this->dispatch('sweet-toast', icon:'error', title:'No selecciono ningún Rol');
                }
            }
            else{
                try {
                    $roleName->revokePermissionTo($permisoName);
                    $this->dispatch('sweet-toast', icon:'success', title:'Actualización exitosa');
                } catch (\Throwable $th) {
                    $this->dispatch('sweet-toast', icon:'error', title:'No selecciono ningún Rol');
                }
            }
        }
        else
        {
            $this->dispatch('sweet-toast', icon:'error', title:'No selecciono ningún Rol');
        }
    }

}
