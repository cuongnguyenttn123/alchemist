<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array_permissions = array('list-user', 'add-user', 'edit-user', 'delete-user');
        $array_permissions2 = array('role-list', 'role-add', 'role-edit', 'role-delete');
        $array_permissions3 = array('package-list', 'package-add', 'package-edit', 'package-delete');
        foreach ($array_permissions as $permission)
	    {
        	DB::table('permissions')->insert([
	            'name'      => $permission,
	            'display_name'   => str_replace('-', ' ', $permission),
	            'description'       => ''
	        ]);
	    }
    }
}
