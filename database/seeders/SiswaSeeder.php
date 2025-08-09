<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Siswa;
use Illuminate\Support\Facades\DB;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('siswas')->insert(
            [

                [
                    'nama'  => "Ahmad Sigit Triyanto",
                    'nis'   => "0125095629",
                    'kelas' => "6",
                ],
                [
                    'nama'  => "Carissa Razita Putri Saragih",
                    'nis'   => "0123680830",
                    'kelas' => "6",
                ],
                [
                    'nama'  => "Dhiya Fathisha",
                    'nis'   => "0124162013",
                    'kelas' => "6",
                ],
                [
                    'nama'  => "Dzahra An - Nazwa",
                    'nis'   => "0127274948",
                    'kelas' => "6",
                ],
                [
                    'nama'  => "Dzaki Radinka Kevansyah",
                    'nis'   => "0128511420",
                    'kelas' => "6",
                ],
                [
                    'nama'  => "Farel Al - Ikhsan Yusuf",
                    'nis'   => "0128659439",
                    'kelas' => "6",
                ],
                [
                    'nama'  => "Maysa Fazira",
                    'nis'   => "0121653639",
                    'kelas' => "6",
                ],
                [
                    'nama'  => "Mursyidatul Husna",
                    'nis'   => "0122428561",
                    'kelas' => "6",
                ],
                [
                    'nama'  => "Nadhif Faturrahman Pane",
                    'nis'   => "012696280",
                    'kelas' => "6",
                ],
                [
                    'nama'  => "Nadira Aprillia",
                    'nis'   => "0126962480",
                    'kelas' => "6",
                ],
            ]
        );
    }
}
