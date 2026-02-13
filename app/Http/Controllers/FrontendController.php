<?php

namespace App\Http\Controllers;

use App\Models\ExamModule;
use App\Models\ListeningModule;
use App\Models\ReadingModule;
use App\Models\WrittingModule;
use App\Models\WrittingModuleType;
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
        $listening_modules = ListeningModule::orderby('id', 'asc')->get();
        return view('frontend.listening_module',compact('listening_modules'));
    }

    public function reading()
    {
        $reading_modules = ReadingModule::orderby('id', 'asc')->get();
        return view('frontend.reading_module',compact('reading_modules'));
    }

    public function writing_type()
    {
        $writing_module_type = WrittingModuleType::orderBy('id', 'asc')->get();
        return view('frontend.writing_type',compact('writing_module_type'));
    }

    public function writing(Request $request)
    {
        $writing_modules = WrittingModule::where('writting_module_type_id', $request->id)->orderBy('id', 'asc')->get();
        return view('frontend.writing_module',compact('writing_modules'));
    }
}
