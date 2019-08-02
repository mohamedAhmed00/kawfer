<?php

namespace App\Modules\Operation\Policy;

use Illuminate\Auth\Access\HandlesAuthorization;

class OperationPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the operation.
     *
     * @return mixed
     */
    public function view()
    {
        return auth()->user()->Roles->Permissions->contains('slug','view-operation');
    }

    /**
     * Determine whether the user can create operation.
     *
     * @return mixed
     */
    public function create()
    {
        return auth()->user()->Roles->Permissions->contains('slug','create-operation');
    }

    /**
     * Determine whether the user can update the operation.
     *
     * @return mixed
     */
    public function update()
    {
        return auth()->user()->Roles->Permissions->contains('slug','update-operation');
    }

    /**
     * Determine whether the user can delete the operation.
     *
     * @return mixed
     */
    public function delete()
    {
        return auth()->user()->Roles->Permissions->contains('slug','delete-operation');
    }
}
