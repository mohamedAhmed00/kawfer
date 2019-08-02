<?php

namespace App\Modules\Operation\Policy;

use Illuminate\Auth\Access\HandlesAuthorization;

class OperationTypePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the operation-type.
     *
     * @return mixed
     */
    public function view()
    {
        return auth()->user()->Roles->Permissions->contains('slug','view-operation-type');
    }

    /**
     * Determine whether the user can create operation-type.
     *
     * @return mixed
     */
    public function create()
    {
        return auth()->user()->Roles->Permissions->contains('slug','create-operation-type');
    }

    /**
     * Determine whether the user can update the operation-type.
     *
     * @return mixed
     */
    public function update()
    {
        return auth()->user()->Roles->Permissions->contains('slug','update-operation-type');
    }

    /**
     * Determine whether the user can delete the operation-type.
     *
     * @return mixed
     */
    public function delete()
    {
        return auth()->user()->Roles->Permissions->contains('slug','delete-operation-type');
    }
}
