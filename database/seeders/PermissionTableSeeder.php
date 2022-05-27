<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'surveyor-list',
            'surveyor-create',
            'surveyor-edit',
            'surveyor-delete',
            'settings',
            'm-kriteria-list',
            'm-kriteria-create',
            'm-kriteria-edit',
            'm-kriteria-delete',
            'm-fasilitas-list',
            'm-fasilitas-create',
            'm-fasilitas-edit',
            'm-fasilitas-delete',
            'm-karyawan-list',
            'm-karyawan-create',
            'm-karyawan-edit',
            'm-karyawan-delete',
            'm-ruang-klinik-list',
            'm-ruang-klinik-create',
            'm-ruang-klinik-edit',
            'm-ruang-klinik-delete',
            'm-persyaratan-list',
            'm-persyaratan-create',
            'm-persyaratan-edit',
            'm-persyaratan-delete',
            'klinik-list',
            'klinik-create',
            'klinik-edit',
            'klinik-delete',
            'karyawan-list',
            'karyawan-create',
            'karyawan-edit',
            'karyawan-delete',
            'rumah-sakit-list',
            'rumah-sakit-create',
            'rumah-sakit-edit',
            'rumah-sakit-delete',
            'asuransi-list',
            'asuransi-create',
            'asuransi-edit',
            'asuransi-delete',
            'persyaratan-list',
            'persyaratan-create',
            'persyaratan-edit',
            'persyaratan-delete',
            'ruang-klinik-list',
            'ruang-klinik-create',
            'ruang-klinik-edit',
            'ruang-klinik-delete',
            
        ];
      
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}