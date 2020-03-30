<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class PagesController extends Controller
{
    public function home()
    {
        $name = 'Quoc Anh';

        return view('pages.index')->with('name', $name);
    }

    public function about()
    {
        $title = "About us";

        return view('pages.about')->with('title', $title);
    }

    public function services()
    {
        $data = array(
            'title' => 'Services',
            'services' => ['Tư vấn toa thuốc', 'Tra cứu thuốc', 'Tra cứu bệnh',
                'Đăng ký hội viên', 'Tích điểm', 'Tính BMI', 'Đọc đường huyết', 'Thông tin nhà thuốc']
        );
        return view('pages.services')->with($data);
    }

    public function showContact()
    {
        $title = 'Contact us';

        return view('pages.contact')->with('title', $title);
    }

    public function storeContact()
    {
        request()->validate([
            'email' => 'required|email',
        ]);

        Mail::raw('It works', function ($message) {
            $message->to(request('email'))
                ->subject('Hello There');
        });

        return redirect('/contact')->with('success', 'Email sent!');
    }
}
