<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('abouts')->insert([
            'title' => 'من نحن',
            'type' =>'aboutus',
            'content' => 'أنشأ هذا الموقع لرعاية المعوقين لتقدم خدماتها للأبناء ذوي الإعاقة وتحمل العبء عن ذويهم وتخفف معاناتهم وترشدهم إلى الطريق الصحيح لتعليم أبنائهم ودمجهم في المجتمع من خلال تقديمهم الى الكليات والسير نحو مستقبل افضل.
            تأسس الموقع على أيدي مجموعة من الطلبة المتطوعين المخلصين الذين سخرهم الله عز وجل لخدمة هذه الفئة عندما لم يكن بدولة الكويت من يهتم بهم سوى دور الرعاية الاجتماعية التابعة لوزارة الشؤون الاجتماعية والعمل.',
            'image'=>'home-aboutus.jpeg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('abouts')->insert([
            'title' => 'مهمتنا',
            'type' =>'mission',
            'content' => 'تقديم الرعاية والتعليم والدعم المبتكر القابل لإثراء وتحقيق تغيير إيجابي مستمر لحياة الأشخاص الذين نخدمهم.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('abouts')->insert([
            'title' => 'رؤيتنا',
            'type' =>'vision',
            'content' => 'الريادة في تقديم الخدمات وخلق فرص عادلة للأشخاص ذوي الإعاقة لضمان الاندماج مع أقرانهم.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
