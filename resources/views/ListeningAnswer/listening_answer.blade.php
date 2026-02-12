{{-- @extends('master.master')

@section('title', 'Listening Module List')

@section('content')

<div class="pc-container">
    <div class="pc-content">

    
        <div class="row justify-content-center">
            <div class="col-lg-10">

                <div class="card shadow-lg border-0">
                    <div class="card-body p-5">

                        <!-- Header -->
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h4 class="fw-semibold mb-0">Add Listening Answers</h4>
                            <div>
                                <button type="button" class="btn btn-light me-2" onclick="discardChanges()">Discard</button>
                                <button type="button" class="btn btn-primary" onclick="saveAllAnswers()">Save All</button>
                            </div>
                        </div>

                        <!-- Test Select -->
                        <div class="mb-4">
                            <label class="form-label fw-medium">Listening Module Name</label>
                            <select class="form-select" id="testName">
                                <option value="">Select Listening Module</option>
                                @foreach ($listening_module as $module)
                                    <option value="{{ $module->id }}">{{ $module->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Answers -->
                        <div id="answersContainer"></div>

                        <!-- Add Button -->
                        <button type="button" class="btn btn-success btn-sm mt-3" onclick="addAnswer()">
                            <i class="ph ph-plus"></i> Add Answer
                        </button>

                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>

let answerCounter = 0;

$(document).ready(function () {

    $('#testName').on('change', function () {
        loadTestAnswers($(this).val());
    });

});

function loadTestAnswers(testName) {

    $('#answersContainer').html('');
    answerCounter = 0;

    if (!testName) return;

    const sampleAnswers = {
        listening_one: ['castle', 'mountain', 'river', 'forest'],
        listening_two: ['doctor', 'hospital', 'medicine'],
        listening_three: ['computer', 'keyboard'],
        listening_four: []
    };

    const answers = sampleAnswers[testName] || [];

    if (answers.length === 0) {
        addAnswer();
        return;
    }

    answers.forEach(answer => {
        answerCounter++;

        const row = `
            <div class="d-flex align-items-center gap-2 mb-3">
                <div class="fw-semibold" style="width:40px;">${answerCounter}.</div>
                <input type="text" class="form-control answer-input" value="${answer}">
                <button type="button" class="btn btn-outline-primary btn-sm"
                    onclick="editAnswer(${answerCounter})">
                    <i class="ph ph-pencil-simple"></i>
                </button>
            </div>
        `;

        $('#answersContainer').append(row);
    });
}

function addAnswer() {

    answerCounter++;

    const row = `
        <div class="d-flex align-items-center gap-2 mb-3">
            <div class="fw-semibold" style="width:40px;">${answerCounter}.</div>
            <input type="text" class="form-control answer-input" placeholder="Enter correct answer">
            <button type="button" class="btn btn-outline-primary btn-sm"
                onclick="editAnswer(${answerCounter})">
                <i class="ph ph-pencil-simple"></i>
            </button>
        </div>
    `;

    $('#answersContainer').append(row);
}

function editAnswer(index) {
    $('.answer-input').eq(index - 1).focus().select();
}

function saveAllAnswers() {

    const testName = $('#testName').val();

    if (!testName) {
        alert('Please select a test first!');
        return;
    }

    let answers = [];

    $('.answer-input').each(function () {
        const value = $(this).val().trim();
        if (value) answers.push(value);
    });

    if (answers.length === 0) {
        alert('Please add at least one answer!');
        return;
    }

    console.log('Saving for:', testName);
    console.log('Answers:', answers);

    alert('Answers saved successfully!');
}

function discardChanges() {

    if (!confirm('Discard all changes?')) return;

    $('#testName').val('');
    $('#answersContainer').html('');
    answerCounter = 0;
}

</script>

@endsection --}}
@extends('master.master')
@section('title', 'Listening Module List')
@section('content')
    <div class="pc-container">
        <div class="pc-content">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <!-- Place this at top of page -->
                            <div id="ajaxMessage" style="position: fixed; top: 20px; right: 20px; z-index: 9999;"></div>

                            <div class="d-flex justify-content-between mb-4">
                                <h5 class="fw-semibold">Add Listening Answers</h5>
                                <div>
                                    <button class="btn btn-light me-2" onclick="discardChanges()">Discard</button>
                                    <button class="btn btn-primary" onclick="saveAllAnswers()">Save All</button>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-medium">Select Listening Module</label>
                                <select class="form-select" id="module_id">
                                    <option value="">Select Listening Module</option>
                                    @foreach ($listening_module as $module)
                                        <option value="{{ $module->id }}">{{ $module->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div id="answersContainer"></div>

                            <button class="btn btn-success mt-2" onclick="addAnswer()">
                                <i class="ph ph-plus"></i> Add Answer
                            </button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        let answerCounter = 0;

        $('#module_id').change(function() {
            let moduleId = $(this).val();
            if (!moduleId) return;
            loadAnswers(moduleId);
        });

        function addAnswer(value = '') {
            answerCounter++;
            const row = `
        <div class="d-flex align-items-center gap-2 mb-3 answer-row">
            <div class="fw-semibold" style="width:40px;">${answerCounter}.</div>
            <input type="text" class="form-control answer-input" placeholder="Enter correct answer" value="${value}">
            <button class="btn btn-outline-primary btn-sm" onclick="editAnswer(${answerCounter})">
                <i class="ph ph-pencil-simple"></i>
            </button>
        </div>
    `;
            $('#answersContainer').append(row);
        }

        function editAnswer(index) {
            $('.answer-input').eq(index - 1).focus().select();
        }

        function renumber() {
            answerCounter = 0;
            $('.answer-row').each(function() {
                answerCounter++;
                $(this).find('div.fw-semibold').text(answerCounter + '.');
            });
        }

        function loadAnswers(moduleId) {

            $('#answersContainer').html('');
            answerCounter = 0;

            $.get("{{ route('listening_answer_module.answer', ':id') }}".replace(':id', moduleId), function(data) {
                if (data.length === 0) {
                    addAnswer();
                    return;
                }
                data.forEach(item => addAnswer(item.answer));
            });
        }


        function saveAllAnswers() {
            let moduleId = $('#module_id').val();
            if (!moduleId) {
                alert('Select module first');
                return;
            }

            let answers = [];
            $('.answer-input').each(function() {
                let val = $(this).val().trim();
                if (val) answers.push(val);
            });
            if (answers.length === 0) {
                alert('Add at least one answer');
                return;
            }

            $.post('{{ route('listening_answer_module.store') }}', {
                _token: '{{ csrf_token() }}',
                module_id: moduleId,
                answers: answers
            }, function(res) {
                // alert(res.message);
                let alertHtml = `
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            ${res.message}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    `;

                $('#ajaxMessage').html(alertHtml);

                // Auto hide after 3 seconds
                setTimeout(function() {
                    $('#ajaxMessage .alert').alert('close');
                }, 3000);
                loadAnswers(moduleId);
            });
        }

        function discardChanges() {
            $('#module_id').val('');
            $('#answersContainer').html('');
            answerCounter = 0;
        }
    </script>

@endsection
