<?php

namespace Database\Seeders;

use App\Models\Division;
use App\Models\District;
use Illuminate\Database\Seeder;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        $division_array = ['Dhaka', 'Barisal', 'Chittagong', 'Khulna', 'Rajshahi', 'Mymensingh', 'Rangpur', 'Sylhet'];

        foreach ($division_array as $value) {

            if(!Division::where('name', $value)->first()){

                $division = new Division();

                $division->name = $value;
    
                $division->save();

            }

        }
        
    }
}
