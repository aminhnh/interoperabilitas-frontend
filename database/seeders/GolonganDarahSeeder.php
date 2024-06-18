<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\GolonganDarah;

class GolonganDarahSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['golongan_darah' => 'A', 'rhesus' => '+'],
            ['golongan_darah' => 'A', 'rhesus' => '-'],
            ['golongan_darah' => 'B', 'rhesus' => '+'],
            ['golongan_darah' => 'B', 'rhesus' => '-'],
            ['golongan_darah' => 'AB', 'rhesus' => '+'],
            ['golongan_darah' => 'AB', 'rhesus' => '-'],
            ['golongan_darah' => 'O', 'rhesus' => '+'],
            ['golongan_darah' => 'O', 'rhesus' => '-'],
        ];

        foreach ($data as $item) {
            GolonganDarah::create($item);
        }
    }
}
