<?php

namespace Database\Seeders;

use App\Models\Kelurahan;
use App\Models\Lembaga;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Faker\Provider\Address;

class LembagaSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            $kelurahan = Kelurahan::inRandomOrder()->first();
            $alamat = $kelurahan->nama . ', ' . $kelurahan->kecamatan->nama . ', ' . 
                      'Kec. ' . $kelurahan->kecamatan->kota->nama . ', ' . 
                      $kelurahan->kecamatan->kota->provinsi->nama . ' ' . 
                      Address::postcode();

            Lembaga::create([
                'id_role' => $faker->numberBetween(1, 2),
                'id_kelurahan' => $kelurahan->id,
                'jenis' => $faker->randomElement(['rumah_sakit', 'admin', 'puskesmas']),
                'nama' => $faker->company,
                'alamat' => $alamat,
                'kode_pos' => Address::postcode(),
                'no_telepon' => $faker->phoneNumber,
            ]);
        }
    }
}
