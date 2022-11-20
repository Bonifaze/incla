<?php

namespace App\Policies;

use App\User;
use App\Permission;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    
    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
      
    	return $user->hasPermission(1);
    	
    	
    }
    
    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function view(User $user)
    {
        //
        
        return $user->hasPermission(2);
        
        //return true;
        
    }
    

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function edit(User $user)
    {
        
    	return $user->hasPermission(3);
    	
    }
    
    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function update(User $user)
    {
    	
    	return $user->hasPermission(4);
    	
    }

    /**
     * Determine whether the user can disable the user.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function disable(User $user)
    {
        return $user->hasPermission(5);
    	
    }
    
    
    
    // RBAC Policies
    /**
     * Determine whether the user can view security roles.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function viewRole(User $user)
    {
       return $user->hasPermission(6);
       
    }
    
    /**
     * Determine whether the user can create security roles.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function createRole(User $user)
    {
        return $user->hasPermission(7);
        
    }
    
    /**
     * Determine whether the user can edit security roles.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function editRole(User $user)
    {
        return $user->hasPermission(8);
        
    }
    
    /**
     * Determine whether the user can assign security roles.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function assignRole(User $user)
    {
        return $user->hasPermission(9);
        
    }
    
    /**
     * Determine whether the user can delete security roles.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function deleteRole(User $user)
    {
        return $user->hasPermission(10);
        
    }
    
    
    /**
     * Temporaral Unversal permission with permission 1
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function admin(User $user)
    {
        return $user->hasPermission(1);
        
    }
    
}// end user policy class
