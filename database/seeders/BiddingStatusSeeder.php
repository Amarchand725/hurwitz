<?php

namespace Database\Seeders;

use App\Models\BiddingStatus;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BiddingStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("bidding_statuses")->truncate();
        $array = [
            ['name' => 'Pending', 'class' => 'warning'],
            ['name' => 'Approved', 'class' => 'success'],
            ['name' => 'Rejected', 'class' => 'danger'],
            ['name' => 'Closed', 'class' => 'danger'],

        ];
        foreach ($array as $index => $value) {
            $create = BiddingStatus::create([
                'name' => $value['name'],
                'class' => $value['class'],
            ]);
        }
    }
}
