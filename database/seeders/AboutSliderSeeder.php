<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AboutSliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('about_sliders')->insert([
            'title' => 'الاحترام',
            'content' => 'نتعامل مع بعضنا ومع الذين نخدمهم بكرامة وثقة ورغبة حقيقية في فهم قيمة الآخرين ووجهات نظرهم وظروفهم، بما يخلق بيئة تعز ز العلاقات الإيجابية والدعم المتبادل',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('about_sliders')->insert([
            'title' => 'النزاهة',
            'content' => 'سعى دائما للصدق والالتزام بالمبادئ الأخلاقية في كل ما نقوم به، والوفاء بوعودنا.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('about_sliders')->insert([
            'title' => 'الرحمة',
            'content' => 'نتفاعل مع بعضنا ومع الذين نخدمهم بلطف ورقة وحماس.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        DB::table('about_sliders')->insert([
            'title' => 'الخدمة',
            'content' => 'نسعى إلى تحقق أفضل النتائج للطلاب ذوى الإعاقة وعائلاتهم عن طريق تسخير طاقتنا وأفكارنا وخبراتنا ومواردنا لهم.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('about_sliders')->insert([
            'title' => 'الابتكار',
            'content' => 'نسعى بلا كلل إلى التميز في كل ما نقوم به من خلال استخدام أفضل الممارسات وإنشاء التطبيقات الجديدة وتسخير المعرفة لتتماشى مع الاحتياجات الحالية والمتغيرة لطلابنا.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
