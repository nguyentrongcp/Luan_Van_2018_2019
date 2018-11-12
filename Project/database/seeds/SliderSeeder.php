<?php

use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sliders')->insert([
            [
                'image'=>'customer/image/slider1.jpg',
                'describes'=>''
            ],
            [
                'image'=>'customer/image/slider2.jpg',
                'describes'=>''
            ],
            [
                'image'=>'customer/image/slider3.jpg',
                'describes'=>''
            ],
            [
                'image'=>'customer/image/slide4.jpg',
                'describes'=>''
            ],
        ]);
    }
}
