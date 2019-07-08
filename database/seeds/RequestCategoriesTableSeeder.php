<?php

use Illuminate\Database\Seeder;

class RequestCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reference_request_categories')->insert([
            'name' => 'Bahasa',
            'code' => 'language',
            'need_additional' => true,

            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('reference_request_categories')->insert([
            'name' => 'Genre',
            'code' => 'genre',

            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('reference_request_categories')->insert([
            'name' => 'Lembaga/Bidang',
            'code' => 'institution',

            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('reference_request_categories')->insert([
            'name' => 'Kategori Kebermanfaatan',
            'code' => 'reason',

            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
