<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KriteriaSiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kriteria_siswas')->insert(
            [
                [
                    'siswa_id' => 1,
                    'olimpiade' => 0,
                    'nilai_rata' => 86,
                    'sikap' => 'A',
                    'kehadiran' => 95,
                ],
                [
                    'siswa_id' => 2,
                    'olimpiade' => 0,
                    'nilai_rata' => 86,
                    'sikap' => 'A',
                    'kehadiran' => 96,
                ],
                [
                    'siswa_id' => 3,
                    'olimpiade' => 0,
                    'nilai_rata' => 82,
                    'sikap' => 'A',
                    'kehadiran' => 94,
                ],
                [
                    'siswa_id' => 4,
                    'olimpiade' => 1,
                    'nilai_rata' => 83,
                    'sikap' => 'A',
                    'kehadiran' => 98,
                ],
                [
                    'siswa_id' => 5,
                    'olimpiade' => 0,
                    'nilai_rata' => 91,
                    'sikap' => 'A',
                    'kehadiran' => 96,
                ],
                [
                    'siswa_id' => 6,
                    'olimpiade' => 0,
                    'nilai_rata' => 77,
                    'sikap' => 'A',
                    'kehadiran' => 93,
                ],
                [
                    'siswa_id' => 7,
                    'olimpiade' => 0,
                    'nilai_rata' => 87,
                    'sikap' => 'A',
                    'kehadiran' => 97,
                ],
                [
                    'siswa_id' => 8,
                    'olimpiade' => 1,
                    'nilai_rata' => 94,
                    'sikap' => 'A',
                    'kehadiran' => 96,
                ],
                [
                    'siswa_id' => 9,
                    'olimpiade' => 0,
                    'nilai_rata' => 85,
                    'sikap' => 'A',
                    'kehadiran' => 96,
                ],
                [
                    'siswa_id' => 10,
                    'olimpiade' => 0,
                    'nilai_rata' => 84,
                    'sikap' => 'A',
                    'kehadiran' => 96,
                ],
            ]
        );
    }
}
