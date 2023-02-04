<?php

namespace Database\Seeders;

use App\Models\Priority;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use League\CommonMark\Util\PrioritizedList;

class PrioritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = [
            ['name' => 'Urgent'],
            ['name' => 'Top'],
            ['name' => 'Moderate'],
            ['name' => 'Low'],
        ];
        DB::table('complaint_statuses')->truncate();
        foreach ($status as $index => $value) {
            $create = Priority::create(['name' => $value['name']]);
        }
    }
}
