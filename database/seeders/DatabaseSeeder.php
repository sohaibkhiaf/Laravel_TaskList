<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Task;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        User::factory(10)->create();
        User::factory(2)->unverified()->create();

        Task::factory(25)->create();
        Task::factory(6)->nulllongdesc()->create();

    }
}
