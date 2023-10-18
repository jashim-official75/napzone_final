<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Plan::create(
            [
                'plan_name' => 'daily',
                'validity' => 86400,
                'group_id' => 1,
            ],
            [
                'plan_name' => 'weekly',
                'validity' => 604800,
                'group_id' => 1,
            ],
            [
                'plan_name' => 'monthly',
                'validity' => 2592000,
                'group_id' => 1,
            ]
        );
    }
}
