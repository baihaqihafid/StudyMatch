<?php

namespace Database\Seeders;

use App\Models\Major;
use App\Models\MajorCriteriaValue;
use Illuminate\Database\Seeder;

class MajorSeeder extends Seeder
{
    public function run(): void
    {
        // nilai: [Teknologi, Kesehatan, Sosial, Bisnis, Budget(1=mahal,5=murah), Prospek]
        $majors = [
            [
                'name'             => 'Teknik Informatika',
                'category'         => 'Saintek',
                'description'      => 'Mempelajari pemrograman, algoritma, pengembangan software, dan sistem komputer.',
                'career_prospects' => 'Software Engineer, Data Scientist, UI/UX Designer, DevOps, AI Engineer',
                'values'           => [5, 1, 2, 3, 3, 5],
            ],
            [
                'name'             => 'Sistem Informasi',
                'category'         => 'Saintek',
                'description'      => 'Menggabungkan teknologi informasi dengan kebutuhan bisnis dan organisasi.',
                'career_prospects' => 'Business Analyst, IT Consultant, Database Admin, Project Manager',
                'values'           => [4, 1, 3, 4, 3, 4],
            ],
            [
                'name'             => 'Teknik Elektro',
                'category'         => 'Saintek',
                'description'      => 'Mempelajari kelistrikan, elektronika, IoT, dan sistem kendali otomatis.',
                'career_prospects' => 'Electrical Engineer, IoT Developer, Automation Engineer',
                'values'           => [5, 2, 2, 2, 3, 4],
            ],
            [
                'name'             => 'Kedokteran',
                'category'         => 'Saintek',
                'description'      => 'Mempelajari ilmu kesehatan manusia, diagnosa penyakit, dan pengobatan.',
                'career_prospects' => 'Dokter Umum, Dokter Spesialis, Peneliti Medis',
                'values'           => [3, 5, 3, 2, 1, 5],
            ],
            [
                'name'             => 'Farmasi',
                'category'         => 'Saintek',
                'description'      => 'Mempelajari obat-obatan, kimia farmasi, dan ilmu kesehatan.',
                'career_prospects' => 'Apoteker, Peneliti Farmasi, Medical Representative',
                'values'           => [3, 5, 2, 3, 2, 4],
            ],
            [
                'name'             => 'Ilmu Komunikasi',
                'category'         => 'Soshum',
                'description'      => 'Mempelajari media, jurnalistik, public relations, dan komunikasi massa.',
                'career_prospects' => 'Jurnalis, Content Creator, PR Specialist, Marketing Communication',
                'values'           => [2, 1, 5, 3, 4, 3],
            ],
            [
                'name'             => 'Psikologi',
                'category'         => 'Soshum',
                'description'      => 'Mempelajari perilaku manusia, kesehatan mental, dan konseling.',
                'career_prospects' => 'Psikolog, HR Specialist, Konselor, Peneliti Perilaku',
                'values'           => [2, 4, 5, 2, 3, 3],
            ],
            [
                'name'             => 'Manajemen',
                'category'         => 'Soshum',
                'description'      => 'Mempelajari pengelolaan bisnis, strategi perusahaan, dan kepemimpinan.',
                'career_prospects' => 'Manajer, Entrepreneur, Marketing Manager, Business Consultant',
                'values'           => [2, 1, 4, 5, 3, 4],
            ],
            [
                'name'             => 'Akuntansi',
                'category'         => 'Soshum',
                'description'      => 'Mempelajari pencatatan keuangan, perpajakan, dan audit perusahaan.',
                'career_prospects' => 'Akuntan, Auditor, Tax Consultant, Financial Analyst',
                'values'           => [2, 1, 3, 5, 3, 4],
            ],
            [
                'name'             => 'Pendidikan (PGSD/PGMI)',
                'category'         => 'Soshum',
                'description'      => 'Mempelajari ilmu pendidikan, pedagogi, dan pengembangan kurikulum.',
                'career_prospects' => 'Guru, Dosen, Instruktur, Education Consultant',
                'values'           => [2, 3, 5, 2, 5, 3],
            ],
            [
                'name'             => 'Hukum',
                'category'         => 'Soshum',
                'description'      => 'Mempelajari peraturan perundang-undangan, sistem peradilan, dan advokasi.',
                'career_prospects' => 'Pengacara, Notaris, Legal Counsel, Jaksa, Hakim',
                'values'           => [1, 1, 5, 3, 3, 4],
            ],
        ];

        foreach ($majors as $data) {
            $major = Major::create([
                'name'             => $data['name'],
                'category'         => $data['category'],
                'description'      => $data['description'],
                'career_prospects' => $data['career_prospects'],
            ]);

            foreach ($data['values'] as $index => $value) {
                MajorCriteriaValue::create([
                    'major_id'    => $major->id,
                    'criteria_id' => $index + 1,
                    'value'       => $value,
                ]);
            }
        }
    }
}