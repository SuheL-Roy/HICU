<?php

namespace App\Http\Controllers;

use App\Models\ListeningAnswer;
use App\Models\ListeningModule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ListeningAnswerController extends Controller
{
    public function create(Request $request)
    {
        $listening_module = ListeningModule::orderBy('id', 'desc')->get();
        return view('ListeningAnswer.listening_answer', compact('listening_module'));
    }

    public function answer($module_id)
    {
        $answers = ListeningAnswer::where('listening_module_id', $module_id)
            ->orderBy('question_serial_no')
            ->get();

        return response()->json($answers);
    }
    public function store(Request $request)
    {

        $request->validate([
            'module_id' => 'required',
            'answers' => 'required|array'
        ]);

        DB::transaction(function () use ($request) {

            ListeningAnswer::where('listening_module_id', $request->module_id)->delete();

            $serial = 1;

            foreach ($request->answers as $answer) {
                if (!empty($answer)) {
                    ListeningAnswer::create([
                        'listening_module_id' => $request->module_id,
                        'question_serial_no' => $serial,
                        'answer' => $answer
                    ]);
                    $serial++;
                }
            }
        });

        return response()->json(['status' => true, 'message' => 'Listening Answers saved!']);
    }
}
