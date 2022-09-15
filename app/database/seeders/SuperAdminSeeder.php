<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->warn('  Creating and super-admin account');
        $user = User::updateOrCreate(['email' => 'superadmin@onenex.co'], [
            'name' => 'Super Admin',
            'username' => 'superadmin',
            'password' => 'password',
            'country_code' => '+95',
            'mobile_number' => '123456789',
            'email_verified_at' => Carbon::now(),
            'mobile_verified_at' => Carbon::now(),
        ]);

        $this->command->warn('  Assigning all permission to super-admin role');
        $roleName = 'super-admin';
        $role = Role::whereName($roleName)->firstOrFail();
        $role->syncPermissions(Permission::all());

        $this->command->warn('  Attaching super-admin role to created user');
        $user->syncRoles([$roleName]);
    }
}
