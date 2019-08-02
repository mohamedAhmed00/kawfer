<?php

namespace App\Modules\Schedule\Policy;

use Illuminate\Auth\Access\HandlesAuthorization;

class SchedulePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the schedule.
     *
     * @return mixed
     */
    public function view()
    {
        return auth()->user()->Roles->Permissions->contains('slug','view-schedule');
    }

    /**
     * Determine whether the user can create schedule.
     *
     * @return mixed
     */
    public function create()
    {
        return auth()->user()->Roles->Permissions->contains('slug','create-schedule');
    }

    /**
     * Determine whether the user can update the schedule.
     *
     * @return mixed
     */
    public function update()
    {
        return auth()->user()->Roles->Permissions->contains('slug','update-schedule');
    }

    /**
     * Determine whether the user can delete the schedule.
     *
     * @return mixed
     */
    public function delete()
    {
        return auth()->user()->Roles->Permissions->contains('slug','delete-schedule');
    }
}
