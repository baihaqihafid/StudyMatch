<?php

namespace Database\Seeders;

use App\Models\Criteria;
use Illuminate\Database\Seeder;

class CriteriaSeeder extends Seeder
{
    public function run(): void
    {
        $criterias = [
            ['name' => 'Minat Teknologi & Sains Eksakta', 'weight' => 20, 'type' => 'benefit'],
            ['name' => 'Minat Kesehatan & Biologi',        'weight' => 15, 'type' => 'benefit'],
            ['name' => 'Minat Sosial & Komunikasi',        'weight' => 15, 'type' => 'benefit'],
            ['name' => 'Minat Bisnis & Keuangan',          'weight' => 15, 'type' => 'benefit'],
            ['name' => 'Budget Kuliah per Tahun',          'weight' => 20, 'type' => 'cost'],
            ['name' => 'Prioritas Prospek Kerja & Gaji',   'weight' => 15, 'type' => 'benefit'],
        ];

        foreach ($criterias as $criteria) {
            Criteria::create($criteria);
        }
    }
}