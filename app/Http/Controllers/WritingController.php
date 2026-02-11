<?php

namespace App\Http\Controllers;

use App\Models\ExamModule;
use App\Models\WrittingModule;
use App\Models\WrittingModuleType;
use Illuminate\Http\Request;

class WritingController extends Controller
{

    public function type_list()
    {
        $writing_module_type = WrittingModuleType::latest()->get();
        return view('WritingTypeModule.writing_type_module', compact('writing_module_type'));
    }

    public function destroy_type(Request $request)
    {
        WrittingModuleType::where('id', $request->id)->delete();
        return back()->with('success', 'Writing Module Type Successfully Deleted');
    }
    public function type_store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $data = new WrittingModuleType();
        $data->name = $request->name;
        $data->save();

        return back()->with('success', 'Writing Module Type created Successfully');
    }

    public function list()
    {
        $exam_module = ExamModule::where('name','writing')->first();
        $module_type = WrittingModuleType::latest()->get();
        $writing_module = WrittingModule::join('writting_module_types', 'writting_modules.writting_module_type_id', '=', 'writting_module_types.id')->select('writting_modules.*', 'writting_module_types.name as module_type_name')->latest()->get();
        return view('WritingModule.writing_module', compact('exam_module', 'module_type', 'writing_module'));
    }

    public function destroy(Request $request)
    {
        WrittingModule::where('id', $request->id)->delete();
        return back()->with('success', 'Writing Module Successfully Deleted');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $data = new WrittingModule();
        $data->name = $request->name;
        $data->exam_module_id = $request->exam_module_id;
        $data->writting_module_type_id	 = $request->writing_module_type_id;
        $data->save();

        return back()->with('success', 'Writing Module created Successfully');
    }
}
