<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin')->insert([
            'id' => '100',
            'username' => 'admin',
            'password' => bcrypt('admin')
        ]);
        DB::table('jabatan')->insert([
            'id' => '100',
            'name' => 'supervisor',
            'daily' => '120000',
            'overtime' => '30000',
            'food' => '50000',
            'transport' => '10000',
        ]);
        DB::table('karyawan')->insert([
            'id' => '100',
            'jabatan_id' => '100',
            'name' => 'Adam Syarif Hidayatullah',
            'username' => 'adamsh231',
            'password' => bcrypt('dayung231'),
            'birth' => '1998-10-13',
            'phone' => '082140320499',
            'gender' => 1,
        ]);
    }
}
