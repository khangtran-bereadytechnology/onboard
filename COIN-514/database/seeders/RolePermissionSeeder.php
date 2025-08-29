<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Phân quyền cơ bản:
        // Super Admin mặc định có tất cả quyền trên hệ thống.
        // Admin có thể tương tác bài viết, chủ đề và người dùng nhưng không được phân quyền.
        // Data Entry chỉ có thể tương tác với bài viết, chủ đề

        // danh sách các quyền
        $permissions = [
            'manage users',
            'manage posts',
            'manage topics',
            'manage roles',
        ];
        //tạo quyền
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        //tạo role
        $superAdmin = Role::create(['name' => 'super-admin']);
        $admin = Role::create(['name' => 'admin']);
        $dataEntry = Role::create(['name' => 'data-entry']);

        //gán quyền cho role
        $superAdmin->givePermissionTo(Permission::all());
        $admin->givePermissionTo(['manage users', 'manage posts', 'manage topics']);
        $dataEntry->givePermissionTo(['manage posts', 'manage topics']);
    }
}
