<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoryOutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new \App\Models\Category;
        $category->name = "Sewa Kost";
        $category->type = "out";
        $category->description = "Uang keluar untuk membayar sewa kost";

        $category->save();

        $this->command->info("Category berhasil diinsert");
    }
}
