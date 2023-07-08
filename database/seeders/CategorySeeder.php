<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subjects = ['Bangla', 'English', 'Mathematics', 'Science', 'Religious Studies', 'Agriculture', 'ICT', 'Arts and Crafts', 'Business Studies', 'Other'];

        $books = ['আমার বাংলা বই', 'প্রাথমিক গণিত', 'English for Today', 'প্রাথমিক বিজ্ঞান', 'বাংলাদেশ ও বিশ্বপরিচয়', 'ইসলাম ও নৈতিক শিক্ষা', 'হিন্দুধর্ম ও নৈতিক শিক্ষা', 'বৌদ্ধধর্ম ও নৈতিক শিক্ষা', 'খ্রিষ্টধর্ম ও নৈতিক শিক্ষা', 'আনন্দ পাঠ(বাংলা দ্রুত পঠন)', 'গণিত', 'বাংলা ব্যাকরণ ও নির্মিতি', 'English Grammer and Composition', 'বিজ্ঞান', 'চারু ও কারুকলা', 'তথ্য ও যোগাযোগ প্রযুক্তি', 'চারুপাঠ', 'কৃষি শিক্ষা', 'কর্ম ও জীবনমুকী শিক্ষা', 'ক্ষুদ্র ও নৃগোষ্ঠীর ভাষা ও সংস্কৃতি', 'শারীরিক শিক্ষা ও স্বাস্থ্য', 'গার্হস্থ্য বিজ্ঞান', 'সপ্তবর্ণা', 'সাহিত্য কনিকা', 'বাংলা সাহিত্য', 'বাংলা সহপাঠ', 'বাংলা ভাষার ব্যাকরণ', 'রচনাসম্ভার', 'পদার্থবিজ্ঞান', 'রসায়ন', 'জীববিজ্ঞান', 'উচ্চতর গণিত', 'ভূগোল ও পরিবেশ', 'অর্থনীতি', 'পৌরনীতি ও নাগরিকতা', 'হিসাববিজ্ঞান', 'ফিন্যান্স ও ব্যাংকিং', 'ব্যবসায় উদ্যোগ', 'ক্যারিয়ার এডুকেশন', 'বাংলাদেশের ইতিহাস ও বিশ্বসভ্যতা'];

        $grades =['প্রথম শ্রেণী', 'দ্বিতীয় শ্রেণী', 'তৃতীয় শ্রেণী', 'চতুর্থ শ্রেণি', 'পঞ্চম শ্রেণি', 'ষষ্ঠ শ্রেণি', 'সপ্তম শ্রেণি', 'অষ্টম শ্রেণি', 'নবম-দশম শ্রেণি', 'একাদশ-দ্বাদশ শ্রেণি'];

        $tags= ['Show on Homepage', 'Featured', 'Free', 'Discount'];

        $years= ['2019','2020', '2021', '2022', '2023', '2024', '2025'];

        $other = ['Peadagody', 'Teaching Improvement', 'Brain Gain'];

        $mediums = ['English Medium', 'Bangla Medium'];


        foreach ($subjects as $value) {

            if(!Category::where('name', $value)->first()){

                $category = new Category();

                $category->name = $value;

                $category->type = 'subject';
    
                $category->save();

            }

        }

        foreach ($books as $value) {

            if(!Category::where('name', $value)->first()){

                $category = new Category();

                $category->name = $value;

                $category->type = 'book';
    
                $category->save();

            }

        }

        foreach ($grades as $value) {

            if(!Category::where('name', $value)->first()){

                $category = new Category();

                $category->name = $value;

                $category->type = 'grade';
    
                $category->save();

            }

        }

        foreach ($tags as $value) {

            if(!Category::where('name', $value)->first()){

                $category = new Category();

                $category->name = $value;

                $category->type = 'tag';
    
                $category->save();

            }

        }

        foreach ($years as $value) {

            if(!Category::where('name', $value)->first()){

                $category = new Category();

                $category->name = $value;

                $category->type = 'year';
    
                $category->save();

            }

        }

        foreach ($other as $value) {

            if(!Category::where('name', $value)->first()){

                $category = new Category();

                $category->name = $value;

                $category->type = 'other';
    
                $category->save();

            }

        }

        foreach ($mediums as $value) {

            if(!Category::where('name', $value)->first()){

                $category = new Category();

                $category->name = $value;

                $category->type = 'medium';
    
                $category->save();

            }

        }
    }
}
