<?php

use Illuminate\Database\Seeder;
use League\Csv\Reader;

class DistrictTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csv = Reader::createFromPath(storage_path('files/database-csv/districts.csv'), 'r');
        foreach ($csv as $row) {
            try {
                DB::table('districts')->insert([
                    'id' => $row[0],
                    'province_id' => $row[1],
                    'code' => "$row[2]",
                    'name' => $row[3],

                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            } catch (\Exception $e) {
                //throw $th; 0 == ""
            }
        }
    }
}
