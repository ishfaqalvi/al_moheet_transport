<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminUserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $user = User::create([
      'name'     => 'Super Admin',
      'email'    => 'superadmin@gmail.com',
      'password' => bcrypt('password'),
    ]);
    $role = Role::create(['name' => 'Super Admin','guard_name' => 'web']);
    $permissions = [
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
    $assignPermissions = Permission::whereIn('name',$permissions)->get(); 
    $role->syncPermissions($assignPermissions);
    $user->assignRole(1);
  }
}