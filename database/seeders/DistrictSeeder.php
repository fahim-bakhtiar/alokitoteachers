<?php

namespace Database\Seeders;

use App\Models\Division;
use App\Models\District;
use Illuminate\Database\Seeder;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $barisal_districts =['Barguna', 'Barisal', 'Bhola', 'Jhalokati', 'Patuakhali', 'Pirojpur'];

        $chittagong_districts =['Bandarban', 'Brahmanbaria', 'Chandpur', 'Chittagong', 'Comilla', 'Coxs Bazar', 'Feni','Khagrachhari','Lakshmipur','Noakhali','Rangamati'];

        $dhaka_districts =['Dhaka', 'Faridpur', 'Gazipur', 'Gopalganj', 'Comilla', 'Kishoreganj', 'Madaripur','Manikganj','Munshiganj','Narayanganj','Narsingdi', 'Rajbari','Shariatpur','Tangail'];

        $khulna_districts =['Bagerhat', 'Chuadanga', 'Jessore', 'Jhenaidah', 'Khulna', 'Kushtia','Magura','Meherpur','Narail','Satkhira'];

        $mymensingh_districts =['Jamalpur', 'Mymensingh','Netrokona', 'Sherpur'];

        $rajshahi_districts =['Bogra', 'Joypurhat', 'Naogaon', 'Natore', 'Chapai Nawabganj', 'Pabna','Rajshahi','Sirajganj'];

        $rangpur_districts =['Dinajpur', 'Gaibandha', 'Kurigram', 'Lalmonirhat', 'Nilphamari', 'Panchagarh','Rangpur','Thakurgaon'];

        $sylhet_districts =['Habiganj', 'Moulvibazar', 'Sunamganj', 'Sylhet'];

        
        $division = Division::where('name', 'barisal')->first();

        foreach ($barisal_districts as $name) {

            if(!District::where('name', $name)->first()){

                $district = new District();

                $district->name = $name;

                $district->division_id = $division->id;

                $district->save();

            }

        }

        $division = Division::where('name', 'chittagong')->first();

        foreach ($chittagong_districts as $name) {

            if(!District::where('name', $name)->first()){

                $district = new District();

                $district->name = $name;

                $district->division_id = $division->id;

                $district->save();

            }

        }

        $division = Division::where('name', 'dhaka')->first();

        foreach ($dhaka_districts as $name) {

            if(!District::where('name', $name)->first()){

                $district = new District();

                $district->name = $name;

                $district->division_id = $division->id;

                $district->save();

            }

        }

        $division = Division::where('name', 'khulna')->first();

        foreach ($khulna_districts as $name) {

            if(!District::where('name', $name)->first()){

                $district = new District();

                $district->name = $name;

                $district->division_id = $division->id;

                $district->save();

            }

        }

        $division = Division::where('name', 'mymensingh')->first();

        foreach ($mymensingh_districts as $name) {

            if(!District::where('name', $name)->first()){

                $district = new District();

                $district->name = $name;

                $district->division_id = $division->id;

                $district->save();

            }

        }

        $division = Division::where('name', 'rajshahi')->first();

        foreach ($rajshahi_districts as $name) {

            if(!District::where('name', $name)->first()){

                $district = new District();

                $district->name = $name;

                $district->division_id = $division->id;

                $district->save();

            }

        }

        $division = Division::where('name', 'rangpur')->first();

        foreach ($rangpur_districts as $name) {

            if(!District::where('name', $name)->first()){

                $district = new District();

                $district->name = $name;

                $district->division_id = $division->id;

                $district->save();

            }

        }

        $division = Division::where('name', 'sylhet')->first();

        foreach ($sylhet_districts as $name) {

            if(!District::where('name', $name)->first()){

                $district = new District();

                $district->name = $name;

                $district->division_id = $division->id;

                $district->save();

            }

        }
    }
}
