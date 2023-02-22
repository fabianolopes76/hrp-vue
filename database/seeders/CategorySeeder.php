<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\File;
use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get(public_path("data/harpia/tbl_persons_categories.json"));
        $datas = json_decode($json);

        foreach ($datas as $key => $value) {
            Category::create([
                'id' => $value->id,
                'name'=>$value->name,
                'label'=>$value->label,
                'icon'=>$value->icon,
                'background_color'=>$value->background_color,
                'font_color'=>$value->font_color,
            ]);
        };
    }
}
