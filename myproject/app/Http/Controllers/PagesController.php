<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        $name = 'Quoc Anh';

        return view('pages.index')->with('name', $name);
    }

    public function about()
    {
        $title = "This is a ";

        return view('pages.about')->with('title', $title);
    }

    public function services()
    {
        $data = array(
            'title' => 'This is a Services page',
            'services' => ['Tư vấn toa thuốc', 'Tra cứu thuốc', 'Tra cứu bệnh',
                'Đăng ký hội viên', 'Tích điểm', 'Tính BMI', 'Đọc đường huyết', 'Thông tin nhà thuốc']
        );
        return view('pages.services')->with($data);
    }

}
