<?php

namespace App\Http\Controllers;

use App\Models\ListeningModule;
use App\Models\ListeningTest;
use Illuminate\Http\Request;
use Termwind\Components\Li;

class ListeningTestController extends Controller
{
    public function listening_test(Request $request)
    {
        $listening_module_id = $request->id;
        $listening_module = ListeningModule::where('id', $listening_module_id)->first();
        if ($listening_module->name == '101 : Listening') {
            return view('ListeningTestModule.Listening_test_one_zero_one', compact('listening_module_id'));
        } else if ($listening_module->name == '102 : Listening') {
            return view('ListeningTestModule.Listening_test_one_zero_two', compact('listening_module'));
        } else if ($listening_module->name == '201 : Listening') {
            return view('ListeningTestModule.Listening_test_two_zero_one', compact('listening_module'));
        } else if ($listening_module->name == '202 : Listening') {
        } else {
            return 'none';
        }
    }

    public function listening_test_store(Request $request)
    {
      

        // $studentId = $request->student()->id ?? $request->student_id;
        // $testId = $request->test_id;

        // Loop over all request inputs and pick q1, q2, ...
        // foreach ($request->all() as $key => $value) {

        //     if (str_starts_with($key, 'q')) {

        //         $questionSerial = intval(substr($key, 1));

        //         ListeningTest::create([
        //             'test_id' => 1,
        //             'student_id' => 1,
        //             'question_serial_no' => $questionSerial,
        //             'attempted' => $value,
        //         ]);
        //     }
        // }
        foreach ($request->all() as $key => $value) {

            if (str_starts_with($key, 'q')) {

                $questionSerial = intval(substr($key, 1));

                // check if this student already submitted this question
                $record = ListeningTest::where('test_id',$request->test_id)
                    ->where('student_id', $request->student_id)
                    ->where('question_serial_no', $questionSerial)
                    ->first();

                if ($record) {
                    // Same student submitted before
                    if ($record->attempted !== $value) {
                        // Answer changed, update it
                        $record->attempted = $value;
                        $record->save();
                    }
                    // If same answer, do nothing
                } else {
                    // New submission (different student or first time)
                    ListeningTest::create([
                        'test_id' => $request->test_id,
                        'student_id' => $request->student_id,
                        'question_serial_no' => $questionSerial,
                        'attempted' => $value,
                    ]);
                }
            }
        }




        return redirect()->back()
            ->with('success', 'Exam submitted successfully!');
    }
}
