<?php

namespace App\Http\Controllers;

use App\Models\ExamModule;
use Illuminate\Http\Request;

class ExamModuleController extends Controller
{
    public function list()
    {
        $exam_module = ExamModule::latest()->get();
        return view('ExamModule.exam_module', compact('exam_module'));
    }

    public function destroy(Request $request)
    {
        ExamModule::where('id', $request->id)->delete();
        return back()->with('success', 'Exam Module Successfully Deleted');
    }

    public function store(Request $request)
    {
       $request->validate([
            'name' => 'required',
        ]);
        $data = new ExamModule();
        $data->name = $request->name;
        $data->save();

        return back()->with('success', 'Exam Module created Successfully');
    }
}
