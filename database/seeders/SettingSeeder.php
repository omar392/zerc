<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'image' => '160-60.png',
            'name_ar' => 'موقع الكترونى',
            'name_en' => 'New Website',
            'email' => 'email@example.com',
            'phone' => '0560258430',
            'whatsapp' => '0560258430',
            'facebook' => 'https://www.facebook.com',
            'twitter' => 'https://www.twitter.com',
            'instagram' => 'https://www.instagram.com',
            'linkedin' => 'https://www.linkedin.com',
            'address_ar' => 'السعودية - الرياض - السلى - وادى الغيل',
            'address_en' => 'KSA - ALSulay - Wadi Alghail St',
            //
            'title_ar' => 'عنوان بالعربية ',
            'title_en' => 'Title English',
            'description_ar' => 'الوصف بالعربية ',
            'description_en' => 'Description English',
            //
            'mail_transport'            => 'smtp',
            'mail_host'                 => 'smtp.gmail.com',
            'mail_port'                 => '587',
            'mail_username'             => 'info@smiexpress.com',
            'mail_password'             => 'Smixprs@2023',
            'mail_encryption'           => 'tls',
            'mail_from'                 => 'admin@gmail.com',
            //
            'contact_mail'             => 'omarabosamaha@gmail.com',
            'job_mail'                 => 'omarabosamaha@gmail.com',
            'sub_mail'                 => 'omarabosamaha@gmail.com',
            //
            'brandtitle_ar'             => 'يصلك الرد خلال اليوم ',
            'brandtitle_en'             => 'We reply Daily',
            'welcometext_ar'             => 'أهلا بك كيف يمكننى مساعدتك ؟',
            'welcometext_en'             => 'Hello, How can i help you ?',
            'msgtext_ar'                 => 'كنت أود الاستفسار عن ',
            'msgtext_en'                 => 'I want to ask about',
            //
            'footer_ar'                 => 'حقوق النشر محفوظة',
            'footer_en'                 => 'Copyrights Saved',
        ]);
    }
}