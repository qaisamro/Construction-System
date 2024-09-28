<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IconController extends Controller
{
    public function getIcons()
    {
        $icons = [
            ['url' => 'assets/icon/2.svg', 'name' => 'أخبار و إعلانات', 'link' => './tabs/news'],
            ['url' => 'assets/icon/1.svg', 'name' => 'تواصل معنا', 'link' => './contact-us'],
            ['url' => 'assets/icon/3.svg', 'name' => 'مراكز الشحن', 'link' => './web'],
            ['url' => 'assets/icon/4.svg', 'name' => 'قراءة العداد', 'link' => './my-counter'],
            ['url' => 'assets/icon/5.svg', 'name' => 'فواتيري', 'link' => './main'],
            ['url' => 'assets/icon/11.png', 'name' => 'الانقطاعات الطارئة', 'link' => './cuts'],
            ['url' => 'assets/icon/7.svg', 'name' => 'تسجيل عطل فني', 'link' => './errors'],
            ['url' => 'assets/icon/8.svg', 'name' => 'التعرفة المعتمدة', 'link' => './rate'],

        ];

        return response()->json($icons);
    }
}
