<?php

namespace Database\Seeders;

use App\Models\OrderType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("order_types")->truncate();
        $array = [
             ['title' => 'Amazon'],
            ['title' => 'E-Book'],
            ['title' => 'Paper Back'],
            ['title' => 'Audio Book'],
            ['title' => 'Google Book'],
            ['title' => 'Kindle Book'],
              ['title' => 'Barns and Noble'],
                ['title' => 'Lulu'],

        ];
        foreach ($array as $value) {
            $create = OrderType::create([
                'title' => $value['title'],
            ]);
        }
    }
}
