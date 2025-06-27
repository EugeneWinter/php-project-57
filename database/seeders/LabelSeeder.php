<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Label;

class LabelSeeder extends Seeder
{
    public function run(): void
    {
        Label::firstOrCreate([
            'name' => 'bug',
            'description' => 'Indicates an unexpected problem or unintended behavior',
        ]);
    }
}
