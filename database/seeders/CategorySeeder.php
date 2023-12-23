<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("categories")->insert([
            "category_name"=>"Elektronik",
            //"category_id"=>
        ]);
        DB::table("categories")->insert([
            "category_name"=>"Moda",
           // "category_id"=>
        ]);
        DB::table("categories")->insert([
            "category_name"=>"Ev -Yaşam",
            //"category_id"=>
        ]);
        DB::table("categories")->insert([
            "category_name"=>"Oto, Bahçe, Yapı Market",
           // "category_id"=>
        ]);

        // elektronik
        DB::table("categories")->insert([
            "category_name"=>"Bilgisayar / Tablet",
            "category_id"=>1
        ]);
        DB::table("categories")->insert([
            "category_name"=>"Yazıcılar / Projecsiyon",
            "category_id"=>1
        ]);
        DB::table("categories")->insert([
            "category_name"=>"Telefon / Aksesuarlar",
            "category_id"=>1
        ]);
        DB::table("categories")->insert([
            "category_name"=>"Tv Görüntü / Ses Sistemleri",
            "category_id"=>1
        ]);

      //  moda kategorisi
        DB::table("categories")->insert([
            "category_name"=>"Kadın",
            "category_id"=>2
        ]);
        DB::table("categories")->insert([
            "category_name"=>"Erkek",
            "category_id"=>2
        ]);
        DB::table("categories")->insert([
            "category_name"=>"Ayakkabı / Çanta",
            "category_id"=>2
        ]);

      //  Ev yaşam
        DB::table("categories")->insert([
            "category_name"=>"Sofra & Mutfak",
            "category_id"=>3
        ]);
        DB::table("categories")->insert([
            "category_name"=>"Ofis / Kırstasiye",
            "category_id"=>3
        ]);
        DB::table("categories")->insert([
            "category_name"=>"Ev Tekstili",
            "category_id"=>3
        ]);
       // oto Bahçe
        DB::table("categories")->insert([
        "category_name"=>"Oto Aksesuar",
        "category_id"=>4
         ]);

        DB::table("categories")->insert([
        "category_name"=>"Bahçe",
        "category_id"=>4
         ]);

        DB::table("categories")->insert([
        "category_name"=>"Yapı Market",
        "category_id"=>4
        ]);


    }
}
