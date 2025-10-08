<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Portal;

class PortalSeeder extends Seeder
{
    public function run(): void
    {
        Portal::updateOrCreate(['key' => 'assistencia_social'], ['name' => 'Assistência Social', 'category_default' => 'Assistência Social']);
        Portal::updateOrCreate(['key' => 'saude'], ['name' => 'Saúde', 'category_default' => 'Saúde']);
    }
}
