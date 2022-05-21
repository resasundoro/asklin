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
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'settings',
            'paket-list',
            'paket-create',
            'paket-edit',
            'paket-delete',
            'm-kriteria-klinik-list',
            'm-kriteria-klinik-create',
            'm-kriteria-klinik-edit',
            'm-kriteria-klinik-delete',
            'm-fasilitas-klinik-list',
            'm-fasilitas-klinik-create',
            'm-fasilitas-klinik-edit',
            'm-fasilitas-klinik-delete',
            'm-layanan-klinik-list',
            'm-layanan-klinik-create',
            'm-layanan-klinik-edit',
            'm-layanan-klinik-delete',
            'klinik-list',
            'klinik-create',
            'klinik-edit',
            'klinik-delete',
            'm-karyawan-list',
            'm-karyawan-create',
            'm-karyawan-edit',
            'm-karyawan-delete',
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
        ];
      
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}