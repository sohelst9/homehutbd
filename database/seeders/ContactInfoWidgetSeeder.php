<?php

namespace Database\Seeders;

use App\Models\ContactInfoWidget;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactInfoWidgetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ContactInfoWidget::create([
            'address'=>'Dhaka, Bangladesh',
            'email'=>'homehutbd@gmail.com',
            'number'=>'01758458569',
        ]);
    }
}
