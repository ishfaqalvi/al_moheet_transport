<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;


class PermissionSeeder extends Seeder
{
      /**
      * Run the database seeds.
      *
      * @return void
      */
      public function run()
      {
            $permissions = [
                  'roles-list', 
                  'roles-view', 
                  'roles-create', 
                  'roles-edit', 
                  'roles-delete',

                  'users-list', 
                  'users-view', 
                  'users-create', 
                  'users-edit', 
                  'users-delete',

                  'branch-list', 
                  'branch-view', 
                  'branch-create', 
                  'branch-edit', 
                  'branch-delete',

                  'chargesType-list', 
                  'chargesType-view', 
                  'chargesType-create', 
                  'chargesType-edit', 
                  'chargesType-delete',

                  'expenseType-list', 
                  'expenseType-view', 
                  'expenseType-create', 
                  'expenseType-edit', 
                  'expenseType-delete',

                  'expense-list', 
                  'expense-view', 
                  'expense-create', 
                  'expense-edit', 
                  'expense-delete',

                  'client-list', 
                  'client-view', 
                  'client-create', 
                  'client-edit', 
                  'client-delete',

                  'statment-list', 
                  'statment-view', 
                  'statment-create', 
                  'statment-edit', 
                  'statment-delete',

                  'invoice-list', 
                  'invoice-view', 
                  'invoice-create', 
                  'invoice-edit', 
                  'invoice-delete',

                  'audit-list', 
                  'audit-view', 
                  'audit-create', 
                  'audit-edit', 
                  'audit-delete',

                  'log-list', 
                  'log-view', 
                  'log-create', 
                  'log-edit', 
                  'log-delete',

                  'settings-list',
                  'settings-create',
            ];
        
            foreach ($permissions as $permission) {
                  Permission::create(['name' => $permission]);
            }
      }
}