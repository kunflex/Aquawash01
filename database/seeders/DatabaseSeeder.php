<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'user@gmail.com',
        // ]);

         
        //creating default roles for users
        $adminRole = Role::create(['name' => 'admin']);
        $userRole = Role::create(['name' => 'user']);

        //creating default permissions for users
        $createPermission = Permission::create(['name' => 'create']);
        $editPermission = Permission::create(['name' => 'edit']);
        $readPermission = Permission::create(['name' => 'read']);
        $deletePermission = Permission::create(['name' => 'delete']);

        //Assigned permissions to various roles
        $adminRole->givePermissionTo($createPermission, $editPermission, $readPermission, $deletePermission);
        $userRole->givePermissionTo($readPermission); 

       
       

        $this->call([
            UserSeeder::class,
        ]);
    }
}
