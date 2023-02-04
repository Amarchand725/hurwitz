<?php

namespace Database\Seeders;

use App\Models\OrderStatus;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("order_statuses")->truncate();
        $array = [
            ['name' => 'Pending'],
            ['name' => 'On the way'],
            ['name' => 'Delivered'],
            ['name' => 'Cancelled'],

        ];
        foreach ($array as $value) {
            $create = OrderStatus::create([
                'name' => $value['name'],
            ]);
        }
    }
}
