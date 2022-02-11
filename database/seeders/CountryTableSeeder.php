<?php

namespace Database\Seeders;

use App\Models\Country\Country;
use Illuminate\Database\Seeder;

class CountryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $country=config("countries_table");

        foreach($country as $data)
        {
            $table=new Country();
            $table->name=$data['countries_name'];
            $table->iso_1=$data['countries_iso_code_2'];
            $table->iso_2=$data['countries_iso_code_3'];
            $table->save();

        }
    }
}
