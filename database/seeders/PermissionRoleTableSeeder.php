<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Permission;
use TCG\Voyager\Models\Role;

class PermissionRoleTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::where('name', 'admin')->firstOrFail();

        $permissions = Permission::all();

        $role->permissions()->sync(
            $permissions->pluck('id')->all()
        );



        $biblitekar_role = Role::where('name', 'bibliotekar')->firstOrFail();
        $permissions_for_biblitekar = Permission::where('table_name', 'books')->get();

        $admin_permissions = array(1);

        $permissions_for_biblitekar_all = array_merge($admin_permissions, $permissions_for_biblitekar->pluck('id')->all());

        // dd($permissions_for_biblitekar_all);

        $biblitekar_role->permissions()->sync(
            $permissions_for_biblitekar_all
        );

      

    

    }
}
