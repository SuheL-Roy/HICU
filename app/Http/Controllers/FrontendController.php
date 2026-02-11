<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function exam_module()
    {
        if (auth()->user()->role == 'admin') {
            return redirect()->route('exam_module.list');
        } else {
            return view('frontend.exam_module');
        }
        
    }
    public function listening()
    {
        return view('frontend.listening_module');
    }

    public function reading()
    {
        return view('frontend.reading_module');
    }

    public function writing_type()
    {
        return view('frontend.writing_type');
    }

    public function writing_gt()
    {
        return view('frontend.writing_gt_module');
    }

    public function writing_academic()
    {
        return view('frontend.writing_academic_module');
    }
}
