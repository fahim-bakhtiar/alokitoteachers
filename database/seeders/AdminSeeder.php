<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $su = Admin::where('admin_level', '0')->first();

        if($su == null){

            $super_admin = new Admin();

            $super_admin->name = 'Alokito Teachers';

            $super_admin->email = 'su@alokitoteachers.com';

            $super_admin->admin_level = '0';

            $super_admin->password = bcrypt('alokito1123');

            $super_admin->save();

        }

        $admin = Admin::where('admin_level', '1')->first();

        if($admin == null){

            $simple_admin = new Admin();

            $simple_admin->name = 'Kyoko';

            $simple_admin->email = 'kyoko@alokitoteachers.com';

            $simple_admin->admin_level = '1';

            $simple_admin->password = bcrypt('kyoko1123');

            $simple_admin->save();

        }

    }
}
