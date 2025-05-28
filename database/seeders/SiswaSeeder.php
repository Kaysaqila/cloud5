<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Siswa;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $siswa = Siswa::insert([
            [
                'nama' => 'ABU BAKAR TSABIT GHUFRON',
                'nis'=> '20388',
                'gender' => 'Laki-Laki',
                'rombel' => 'SIJA A',
                'alamat' => 'Pakem',
                'kontak' => '085839328609',
                'email' => 'tsabit@gmail.com',
                'status_lapor_pkl' => false,
            ],
            [
                'nama' => 'ADE RAFIF DANESWARA',
                'nis'=> '20389',
                'gender' => 'Laki-Laki',
                'rombel' => 'SIJA A',
                'alamat' => 'Tempel',
                'kontak' => '085839328608',
                'email' => 'danes@gmail.com',
                'status_lapor_pkl' => false,
            ],
            [
                'nama' => 'ADE ZAIDAN ALTHAF',
                'nis'=> '20390',
                'gender' => 'Laki-Laki',
                'rombel' => 'SIJA A',
                'alamat' => 'Sleman',
                'kontak' => '085839328607',
                'email' => 'ade@gmail.com',
                'status_lapor_pkl' => false,
            ],
            [
                'nama' => 'NAUFELIRNA SUBKHI RAMADHANI',
                'nis'=> '20454',
                'gender' => 'Perempuan',
                'rombel' => 'SIJA B',
                'alamat' => 'Sleman',
                'kontak' => '089671421234',
                'email' => 'naufel@gmail.com',
                'status_lapor_pkl' => false,
            ],
            [
                'nama' => 'ADHWA KHALILA RAMADHANI',
                'nis'=> '20391',
                'gender' => 'Perempuan',
                'rombel' => 'SIJA A',
                'alamat' => 'Sleman',
                'kontak' => '085839328606',
                'email' => 'wawa@gmail.com',
                'status_lapor_pkl' => false,
            ],
            [
                'nama' => 'KAYSA AQILA AMTA',
                'nis'=> '20419',
                'gender' => 'Perempuan',
                'rombel' => 'SIJA A',
                'alamat' => 'Turi',
                'kontak' => '085839328605',
                'email' => 'aqil@gmail.com',
                'status_lapor_pkl' => false,
            ],
            [
                'nama' => 'ROSYIDAH MUTHMAINNAH',
                'nis'=> '20448',
                'gender' => 'Perempuan',
                'rombel' => 'SIJA B',
                'alamat' => 'Sleman',
                'kontak' => '085839328604',
                'email' => 'rosyi@gmail.com',
                'status_lapor_pkl' => false,
            ],
            [
                'nama' => 'ANGELINA THITHIS SEKAR LANGIT', 
                'nis' => '20396',
                'gender' => 'Perempuan',
                'rombel' => 'SIJA A',
                'alamat' => 'Kulonprogo',
                'kontak' => '081272353535',
                'email' => 'arrowofdarkness2@gmail.com',
                'status_lapor_pkl'=> false,
            ],
            [
                'nama' => 'MUTIARA SEKAR KINASIH', 
                'nis' => '20431',
                'gender' => 'Perempuan',
                'rombel' => 'SIJA B',
                'alamat' => 'Bantul',
                'kontak' => '085198553807',
                'email' => 'mtiaraskinasih@gmail.com',
                'status_lapor_pkl'=> false,
            ],
            [
                'nama' => 'MARCELLINUS CHRISTO PRADIPTA', 
                'nis' => '20422',
                'gender' => 'Laki-Laki',
                'rombel' => 'SIJA A',
                'alamat' => 'Sleman',
                'kontak' => '089688361696',
                'email' => 'marchllinuschristo11@gmail.com',
                'status_lapor_pkl'=> false,
            ],
        ]);
    }
}