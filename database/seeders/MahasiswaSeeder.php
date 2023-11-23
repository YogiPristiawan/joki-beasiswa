<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataMahasiswa = [
            [
                'nim'=>'20103153',
                'nama'=>'Virandita Sekar',
                'ipk'=>'3.4',
            ],
            [
                'nim'=>'20103154',
                'nama'=>'Putra Pambuka',
                'ipk'=>'2.9',
            ],
            [
                'nim'=>'20103155',
                'nama'=>'Putri Saputri',
                'ipk'=>'3.0',
            ],
            [
                'nim'=>'20103156',
                'nama'=>'Aji Permana',
                'ipk'=>'2.7',
            ],
        ];
        foreach($dataMahasiswa as $key => $val){
            Mahasiswa::create($val);
        }
    }
}
