<?php 

namespace App\Permissions;
use App\Models\Role;
use App\Models\Permission;

trait HasPermissionsTrait
{
	public function hasPermissionTo( $permission )
	{
		//has permission through roles

		return $this->hasPermissionThroughRole( $permission ) || $this->hasPermission( $permission );
	}

	protected function hasPermission( $permission )
	{
		return (bool) $this->permissions->where('name', $permission->name)->count();
	}

	protected function hasPermissionThroughRole( $permission )
	{
		foreach( $permission->roles as $role ){
			if( $this->roles->contains( $role ) ){
				return true;
			}
		}

		return false;
	}

	public function hasRole( ...$roles )
	{
		foreach( $roles as $role ){
			if( $this->roles->contains('name', $role) ){
				return true;
			}
		}

		return false;
	}

	public function roles()
    {
        return $this->belongsToMany( Role::class, 'users_roles', 'user_id', 'role_id' );
    }

    public function permissions()
    {
        return $this->belongsToMany( Permission::class, 'users_permissions', 'user_id', 'permission_id' );
    }
}

