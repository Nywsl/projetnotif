<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Créer des permissions de base
        $permissions = [
            'view admin dashboard',
            'manage users',
            'view user dashboard',
            'view others dashboard',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Créer des rôles et leur attribuer des permissions
        $adminRole = Role::create(['name' => 'admin']);
        $userRole = Role::create(['name' => 'user']);
        $othersRole = Role::create(['name' => 'others']);

        // Attribuer les permissions aux rôles
        $adminRole->givePermissionTo(['view admin dashboard', 'manage users']);
        $userRole->givePermissionTo('view user dashboard');
        $othersRole->givePermissionTo('view others dashboard');

        // Optionnellement, créer des utilisateurs de test et leur attribuer des rôles
        $admin = User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password123'),
        ]);
        $admin->assignRole($adminRole);

        $user = User::factory()->create([
            'name' => 'Normal User',
            'email' => 'user@example.com',
            'password' => bcrypt('password123'),
        ]);
        $user->assignRole($userRole);

        $other = User::factory()->create([
            'name' => 'Other User',
            'email' => 'others@example.com',
            'password' => bcrypt('password123'),
        ]);
        $other->assignRole($othersRole);
    }
}

