<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\admin;
use App\Models\ContactInfoWidget;
use App\Models\Size;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(SubCategorySeeder::class);
        $this->call(ColorSeeder::class);
        $this->call(BannerSeeder::class);
        $this->call(SizeSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(HeaderSettingSeeder::class);
        $this->call(StayInformedSeeder::class);
        $this->call(ContactInfoWidgetSeeder::class);
        $this->call(CopyrightSeeder::class);
        $this->call(DivisionSeeder::class);

        
    }
}
