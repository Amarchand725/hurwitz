<?php

namespace Database\Seeders;

use App\Models\AuctionStatus;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuctionStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("auction_statuses")->truncate();
        $array = [
            ['name' => 'Open', 'class' => 'success'],
            ['name' => 'Closed', 'class' => 'danger'],
        ];
        foreach ($array as $index => $value) {
            $create = AuctionStatus::create([
                'name' => $value['name'],
                'class' => $value['class'],
                'status' => '1',
            ]);
        }
    }
}
