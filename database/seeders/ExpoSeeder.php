<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ExpoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Matikan foreign key check sementara
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Kosongkan data dari bawah ke atas (urutan child → parent)
        DB::table('xp_suka_karyas')->truncate();
        DB::table('xp_karyas')->truncate();
        DB::table('xp_kategoris')->truncate();
        DB::table('xp_anggota_teams')->truncate();
        DB::table('xp_teams')->truncate();
        DB::table('xp_user_expos')->truncate();

        // Aktifkan kembali foreign key check
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        
        DB::table('xp_user_expos')->insert([
            [  'id' => 1,
                'user_id' => '01jv7pqks6n8zz8psysam0ewk9',
                'username' => 'wahabs',
                'linkedin' => 'wahab-syahranie/',
                'instagram' => 'wahabsyahranie/',
                'github' => 'wahabsyahranie',
                'whatsapp' => '81258765977'
            ],
            [
                'id' => 2,
                'user_id' => '01jv7pqks6n8zz8psysam0ewka',
                'username' => 'evandayani',
                'linkedin' => 'evandayani',
                'instagram' => 'evandayanii',
                'github' => 'evandayaniii',
                'whatsapp' => '81258765977'
            ]
        ]);
        DB::table('xp_teams')->insert([
            [
                'id' => 1,
                'user_id' => '01jv7pqks6n8zz8psysam0ewk9',
                'nama_team' => 'Emperor County'
            ],
            [
                'id' => 2,
                'user_id' => '01jv7pqks6n8zz8psysam0ewka',
                'nama_team' => 'Antares County'
            ]
        ]);
        DB::table('xp_anggota_teams')->insert([
            [
                'id' => 1,
                'xp_user_expo_id' => 1,
                'xp_team_id' => 1,
            ],
            [
                'id' => 2,
                'xp_user_expo_id' => 2,
                'xp_team_id' => 2,
            ]
        ]);
        DB::table('xp_kategoris')->insert([
            [
                'id' => 1,
                'nama_kategori' => 'Internet of Things',
            ],
            [
                'id' => 2,
                'nama_kategori' => 'Website',
            ]
        ]);
        DB::table('xp_karyas')->insert([
            [
                'id' => 1,
                'user_id' => '01jv7pqks6n8zz8psysam0ewk9',
                'xp_kategori_id' => 1,
                'xp_team_id' => 1,
                'nama_karya' => 'Alat pakan ikan otomatis',
                'deskripsi' => 'Sistem ini menggunakan adruino dan blabalbala',
                'video_promosi' => 'lalalallalala',
                'banner' => 'lalallala',
                'poster' => 'lalalalla',
                'ppt' => 'lallalalala',
                'thumbnail' => 'fkdjfljafjaljfl',
                'tahun_dibuat' => 2025,
                'dipublikasi' => 0
            ],
            [
                'id' => 2,
                'user_id' => '01jv7pqks6n8zz8psysam0ewka',
                'xp_kategori_id' => 2,
                'xp_team_id' => 2,
                'nama_karya' => 'Website HIMA TI',
                'deskripsi' => 'Sistem ini adalah aplikasi manajemen',
                'video_promosi' => 'lalalallalala',
                'banner' => 'lalallala',
                'poster' => 'lalalalla',
                'ppt' => 'lallalalala',
                'thumbnail' => 'fkdjfljafjaljfl',
                'tahun_dibuat' => 2025,
                'dipublikasi' => 0
            ]
        ]);
        DB::table('xp_suka_karyas')->insert([
            [
                'id' => 1,
                'user_id' => '01jv7pqks6n8zz8psysam0ewk9',
                'xp_karya_id' => 1,
            ],
            [
                'id' => 2,
                'user_id' => '01jv7pqks6n8zz8psysam0ewka',
                'xp_karya_id' => 1,
            ]
        ]);
    }
}
