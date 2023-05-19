<?php

namespace App\Policies;

use App\Faq;
use App\Userss;
use Illuminate\Auth\Access\HandlesAuthorization;

class FaqPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Userss  $users
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(Users $users)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Userss  $users
     * @param  \App\Faq  $faq
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(Users $users, Faq $faq)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Userss  $users
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(Users $users)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Userss  $users
     * @param  \App\Faq  $faq
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(Users $users, Faq $faq)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Userss  $users
     * @param  \App\Faq  $faq
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(Users $users, Faq $faq)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Userss  $users
     * @param  \App\Faq  $faq
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Users $users, Faq $faq)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Userss  $users
     * @param  \App\Faq  $faq
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Users $users, Faq $faq)
    {
        //
    }
}
