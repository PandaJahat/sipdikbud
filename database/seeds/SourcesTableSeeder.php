<?php

use Illuminate\Database\Seeder;

class SourcesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sources')->insert([
            "name" => "REKAPIN",
            "description" => "repositori akses terbuka resmi dari Kemitraan Pengembangan Kapasitas dan Analisis Sektor Pendidikan ACDP",
            "url" => "http://rekap.kemdikbud.go.id",
            "code" => "rekapin",
            "is_institute" => false,
            "company_name" => "Pusat Penelitian Kebijakan",
            "type" => 'other',
            "route" => "integration.app.rekapin",
            "thumbnail_path" => '/img/rekapin/',

            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
