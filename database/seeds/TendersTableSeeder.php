<?php

use App\Tender;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Testing\WithFaker;

class TendersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Tender::class, 4000)->create();
    }
}
