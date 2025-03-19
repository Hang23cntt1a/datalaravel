<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Mf;

class MfSeeder extends Seeder
{
    public function run(): void
    {
        $manufacturers = ['TOYOTA', 'MITSUBISHI', 'HONDA', 'BMW', 'HYUNDAI'];

        foreach ($manufacturers as $car) {
            Mf::create(['name' => $car]);
        }
    }
}
