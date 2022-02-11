<?php

namespace Database\Seeders;

use App\Models\City\City;
use Illuminate\Database\Seeder;

class CityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $country=config("city_table");
        foreach($country as $data)
        {
            $table=new City();
            $table->name=$data['city'];
            $table->long=$data['lng'];
            $table->lat=$data['lat'];
            $table->save();
        }
    }
}
