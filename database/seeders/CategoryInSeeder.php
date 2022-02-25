<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoryInSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new \App\Models\Category;
        $category->name = "Gaji";
        $category->type = "in";
        $category->description = "Uang masuk dari Gaji bulanan";

        $category->save();

        $this->command->info("Category berhasil diinsert");
    }
}
