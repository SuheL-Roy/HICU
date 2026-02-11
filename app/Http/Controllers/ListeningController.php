<?php

namespace App\Http\Controllers;

use App\Models\ExamModule;
use App\Models\ListeningModule;
use Illuminate\Http\Request;

class ListeningController extends Controller
{
    public function list()
    {
        $listening_modules = ListeningModule::latest()->get();
        $exam_module = ExamModule::where('name', 'listening')->first();
        return view('ListeningModule.listening_module', compact('listening_modules', 'exam_module'));
    }

    public function destroy(Request $request)
    {
        ListeningModule::where('id', $request->id)->delete();
        return back()->with('success', 'Listening Module Successfully Deleted');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $data = new ListeningModule();
        $data->name = $request->name;
        $data->exam_module_id = $request->exam_module_id;
        $data->save();

        return back()->with('success', 'Listening Module created Successfully');
    }
}
