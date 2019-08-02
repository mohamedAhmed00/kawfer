<?php

namespace App\Modules\Order\Policy;

use Illuminate\Auth\Access\HandlesAuthorization;

class OrderPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the order.
     *
     * @return mixed
     */
    public function view()
    {
        return auth()->user()->Roles->Permissions->contains('slug','view-order');
    }

    /**
     * Determine whether the user can view the order.
     *
     * @return mixed
     */
    public function select()
    {
        return auth()->user()->Roles->Permissions->contains('slug','select-order');
    }

    /**
     * Determine whether the user can view the order.
     *
     * @return mixed
     */
    public function show()
    {
        return auth()->user()->Roles->Permissions->contains('slug','show-order');
    }

    /**
     * Determine whether the user can view the order.
     *
     * @return mixed
     */
    public function addCart()
    {
        return auth()->user()->Roles->Permissions->contains('slug','add-cart');
    }

    /**
     * Determine whether the user can view the order.
     *
     * @return mixed
     */
    public function deleteCart()
    {
        return auth()->user()->Roles->Permissions->contains('slug','delete-cart');
    }

    /**
     * Determine whether the user can view the order.
     *
     * @return mixed
     */
    public function emptyCart()
    {
        return auth()->user()->Roles->Permissions->contains('slug','empty-cart');
    }

    /**
     * Determine whether the user can create order.
     *
     * @return mixed
     */
    public function create()
    {
        return auth()->user()->Roles->Permissions->contains('slug','create-order');
    }

    /**
     * Determine whether the user can update the order.
     *
     * @return mixed
     */
    public function update()
    {
        return auth()->user()->Roles->Permissions->contains('slug','update-order');
    }

    /**
     * Determine whether the user can delete the order.
     *
     * @return mixed
     */
    public function delete()
    {
        return auth()->user()->Roles->Permissions->contains('slug','delete-order');
    }
}
