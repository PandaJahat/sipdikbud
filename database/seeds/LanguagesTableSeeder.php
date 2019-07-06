<?php

use Illuminate\Database\Seeder;

class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('collection_languages')->insert([
            'name' => 'Indonesia',
            'code' => 'ID',

            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('collection_languages')->insert([
            'name' => 'English',
            'code' => 'EN',

            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
