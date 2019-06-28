<?php

use Illuminate\Database\Seeder;
use League\Csv\Reader;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csv = Reader::createFromPath(storage_path('files/database-csv/categories.csv'), 'r');
        foreach ($csv as $row) {
            try {
                DB::table('categories')->insert([
                    'id' => $row[0],
                    'name' => $row[1],
                    'description' => "$row[2]",

                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            } catch (\Exception $e) {
                //throw $th; 0 == ""
            }
        }
    }
}
