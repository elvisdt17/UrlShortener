<?php

use Illuminate\Database\Seeder;
use App\Url;

class UrlsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Url::truncate();
        factory(Url::class, 950)->create();
    }
}
