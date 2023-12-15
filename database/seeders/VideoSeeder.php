<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('videos')->insert([
            'title' => 'الاحترام',
            'content' => 'نتعامل مع بعضنا ومع الذين نخدمهم بكرامة وثقة ورغبة حقيقية في فهم قيمة الآخرين ووجهات نظرهم وظروفهم، بما يخلق بيئة تعز ز العلاقات الإيجابية والدعم المتبادل',
            'video' => '300052515.mp4',            
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
