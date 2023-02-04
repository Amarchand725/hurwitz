<?php

namespace Database\Seeders;

use App\Models\Provider;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("providers")->truncate();
        $array = [
            ['name' => 'Facebook'],
            ['name' => 'Google'],
            ['name' => 'Apple'],
        ];

        foreach ($array as $value) {
            $create = Provider::create([
                'name' => $value['name'],
            ]);
        }
    }
}
