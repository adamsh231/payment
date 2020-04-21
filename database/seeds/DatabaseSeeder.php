<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $id_karyawan = date('hms');
        DB::table('admin')->insert([
            'id' => '100',
            'username' => 'admin',
            'password' => bcrypt('admin')
        ]);

        $jabatan = [
            1 =>
            "Accounting", "Restaurant Manager", "Personalia", "Supervisor",
            "Head Chef", "Cashier", "Waiter/Waitress", "Assistant Chef"
        ];

        for ($i = 1; $i <= 8; $i++) {
            if ($i >= 4) {
                DB::table('jabatan')->insert([
                    'id' => $i,
                    'name' => $jabatan[($i)],
                    'worktime' => 40000,
                    'overtime' => 20000,
                    'food' => 15000,
                    'transport' => 10000,
                ]);
            } else {
                DB::table('jabatan')->insert([
                    'id' => $i,
                    'name' => $jabatan[$i],
                    'worktime' => 50000,
                    'overtime' => 25000,
                    'food' => 15000,
                    'transport' => 10000,
                ]);
            }
        }

        DB::table('karyawan')->insert([
            'id' => $id_karyawan . '1',
            'jabatan_id' => '3',
            'name' => 'Adam Syarif Hidayatullah',
            'username' => 'adamsh231',
            'password' => bcrypt('dayung231'),
            'birth' => '1998-10-13',
            'start_work' => '2019-10-13',
            'phone' => '082140320499',
            'address' => 'Malang',
            'gender' => 1,
        ]);

        $faker = Faker::create('id_ID');

        $presensi_id_count = 1;
        $gaji_id_count = 1;
        for ($i = 1; $i <= 20; $i++) {
            if ($i > 1) {
                $gender = $faker->numberBetween(0, 1);
                DB::table('karyawan')->insert([
                    'id' => $id_karyawan . $i,
                    'jabatan_id' => $faker->numberBetween(1, 8),
                    'name' => $faker->name($gender),
                    'username' => $faker->userName,
                    'password' => bcrypt('dayung231'),
                    'birth' => $faker->date($format = 'Y-m-d', $max = '2000-01-01'),
                    'start_work' => $faker->date($format = 'Y-m-d', $max = 'now'),
                    'phone' => $faker->phoneNumber,
                    'address' => $faker->address,
                    'gender' => $gender,
                ]);
            }

            $jml_hari = 0;
            $feb = 29;
            for ($i = 1; $i <= 2; $i++) {
                if ($i = 1) {
                    $feb = 28;
                } else {
                    $feb = 29;
                }
                for ($j = 1; $j <= 12; $j++) {
                    if ($j <= 7) {
                        if ($j % 2 == 0) {
                            $jml_hari = 30;
                        } else {
                            $jml_hari = 31;
                        }
                        if ($j == 2) {
                            $jml_hari = $feb;
                        }
                    } else {
                        if ($j % 2 == 0) {
                            $jml_hari = 31;
                        } else {
                            $jml_hari = 30;
                        }
                    }
                    for ($k = 1; $k <= $jml_hari; $k++) {
                        $worktime = $faker->numberBetween(0, 1);
                        $overtime = ($worktime == 1 ? $faker->numberBetween(0, 1) : 0);
                        DB::table('presensi')->insert([
                            'id' => $presensi_id_count,
                            'karyawan_id' => $id_karyawan . $i,
                            'worktime' => $worktime,
                            'overtime' => $overtime,
                            'date' => '2019-' . $j . '-' . $k,
                        ]);
                        $presensi_id_count++;
                    }
                    DB::table('gaji')->insert([
                        'id' => date('hms') . $gaji_id_count,
                        'karyawan_id' => $id_karyawan . $i,
                        'period' => '2019-' . $j . '-1',
                    ]);
                    $gaji_id_count++;
                }
            }
        }
    }
}
