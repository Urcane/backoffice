<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Traits\CanPinRecords;
use Spatie\Permission\Models\Role;

class UserManagementTable extends LivewireDatatable
{
    use CanPinRecords;

    public $selected = [];
    public $beforeTableSlot = 'components.user-management-button';

    public function builder()
    {
        return User::query();
    }

    public function columns()
    {
        return [
            Column::checkbox(),

            NumberColumn::name('id')
            ->label('ID')
            ->width(10),

            Column::name('name')
            ->label('Name')
            ->searchable(),

            Column::name('email')
            ->label('Email'),

            Column::name('roles.name')
            ->label('Roles')
            ->filterable($this->roles()),

            Column::callback(['id', 'name', 'email'], function ($id, $name, $email) {
                return view('components.user-management-action', [
                    'id' => $id, 
                    'name' => $name, 
                    'email' => $email
                ]);
            })
            ->label('Action')
            ->width(10)
        ];
    }

    public function roles()
    {
        return Role::all()->pluck('name');
    }
}