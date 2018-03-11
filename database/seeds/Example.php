<?php

use Illuminate\Database\Seeder;
use App\Weather;

class Example extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Weather::create(['city' => 'Odes', 'temp' => 2.3, 'hum' => 234, 'icon' => '25d']);
    }
}
