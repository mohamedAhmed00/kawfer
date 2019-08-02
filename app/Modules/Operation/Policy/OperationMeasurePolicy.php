<?php

namespace App\Modules\Operation\Policy;

use Illuminate\Auth\Access\HandlesAuthorization;

class OperationMeasurePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the operation-measure.
     *
     * @return mixed
     */
    public function view()
    {
        return auth()->user()->Roles->Permissions->contains('slug','view-operation-measure');
    }

    /**
     * Determine whether the user can create operation-measure.
     *
     * @return mixed
     */
    public function create()
    {
        return auth()->user()->Roles->Permissions->contains('slug','create-operation-measure');
    }

    /**
     * Determine whether the user can update the operation-measure.
     *
     * @return mixed
     */
    public function update()
    {
        return auth()->user()->Roles->Permissions->contains('slug','update-operation-measure');
    }

    /**
     * Determine whether the user can delete the operation-measure.
     *
     * @return mixed
     */
    public function delete()
    {
        return auth()->user()->Roles->Permissions->contains('slug','delete-operation-measure');
    }
}
