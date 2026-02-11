<?php

namespace App\Http\Controllers;

use App\Models\ExamModule;
use App\Models\ReadingModule;
use Illuminate\Http\Request;

class ReadingController extends Controller
{
    public function list()
    {
        $reading_module = ReadingModule::latest()->get();
        $exam_module = ExamModule::where('name', 'reading')->first();
        return view('ReadingModule.reading_module', compact('reading_module', 'exam_module'));
    }

    public function destroy(Request $request)
    {
        ReadingModule::where('id', $request->id)->delete();
        return back()->with('success', 'Reading Module Successfully Deleted');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $data = new ReadingModule();
        $data->name = $request->name;
        $data->exam_module_id = $request->exam_module_id;
        $data->save();

        return back()->with('success', 'Reading Module created Successfully');
    }
}
