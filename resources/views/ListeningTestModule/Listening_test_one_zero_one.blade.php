<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listening Test</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Arial, sans-serif;
            background-color: #f5f5f5;
        }

        /* Top Bar */
        .top-bar {
            background-color: #f4c2c2;
            padding: 12px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .top-bar-left {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .timer,
        .audio-status {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
            font-weight: 500;
        }

        .timer svg,
        .audio-status svg {
            width: 20px;
            height: 20px;
        }

        .finish-btn {
            background-color: transparent;
            border: 2px solid #333;
            padding: 8px 24px;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .finish-btn:hover {
            background-color: rgba(0, 0, 0, 0.05);
        }

        /* Main Content */
        .container {
            max-width: 1300px;
            margin: 0 auto;
            padding: 30px 20px;
        }

        /* Part Header */
        .part-header {
            background-color: white;
            border: 2px solid #ccc;
            border-radius: 8px;
            padding: 20px 24px;
            margin-bottom: 30px;
        }

        .part-header h1 {
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .part-header p {
            font-size: 16px;
            color: #666;
        }

        /* Questions Section */
        .questions-section {
            background-color: white;
            border-radius: 8px;
            padding: 30px;
            margin-bottom: 30px;
        }

        .questions-title {
            font-size: 22px;
            font-weight: 600;
            margin-bottom: 20px;
        }

        .instructions {
            font-style: italic;
            color: #555;
            margin-bottom: 12px;
            font-size: 15px;
        }

        .word-limit {
            margin-bottom: 20px;
            font-size: 15px;
        }

        .word-limit strong {
            font-weight: 700;
        }

        .form-title {
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .form-field {
            display: flex;
            align-items: center;
            margin-bottom: 16px;
        }

        .form-field label {
            font-weight: 600;
            min-width: 180px;
            font-size: 15px;
        }

        .form-field input {
            border: none;
            border-bottom: 2px dotted #999;
            padding: 4px 8px;
            font-size: 15px;
            min-width: 200px;
            outline: none;
        }

        .form-field input:focus {
            border-bottom-color: #333;
        }

        .section-subtitle {
            font-weight: 700;
            margin: 25px 0 15px 0;
            font-size: 16px;
        }

        .info-text {
            margin-bottom: 12px;
            font-size: 15px;
        }

        /* Bottom Navigation */
        .bottom-nav {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: white;
            border-top: 2px solid #ddd;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .part-pagination {
            display: flex;
            gap: 100px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
        }

        .part-item {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .part-item.active {
            color: #00aa00;
        }

        .question-numbers {
            display: flex;
            gap: 8px;
        }

        .question-num {
            width: 32px;
            height: 32px;
            border: 2px solid #999;
            border-radius: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            background-color: white;
            transition: all 0.2s;
        }

        .question-num:hover {
            background-color: #f0f0f0;
        }

        .question-num.active {
            background-color: #333;
            color: white;
            border-color: #333;
        }

        .nav-arrows {
            display: flex;
            gap: 10px;
        }

        .nav-arrow {
            width: 42px;
            height: 42px;
            background-color: #333;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
        }

        .nav-arrow:hover {
            background-color: #555;
        }

        .nav-arrow:disabled {
            background-color: #ccc;
            cursor: not-allowed;
        }

        .content-wrapper {
            padding-bottom: 80px;
        }

        .part-content {
            display: none;
        }

        .part-content.active {
            display: block;
        }

        .page-indicator {
            font-size: 14px;
            color: #666;
            margin-left: 5px;
        }

        /* ================= Modal ================= */
        #start-modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

        #start-modal .modal-content {
            background: white;
            padding: 30px 40px;
            border-radius: 12px;
            text-align: center;
            max-width: 400px;
            width: 90%;
        }

        #start-modal input {
            padding: 8px 12px;
            font-size: 16px;
            width: 100%;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        #start-modal button {
            padding: 10px 25px;
            font-size: 16px;
            background: #2563eb;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        #start-modal button:hover {
            background: #1d4ed8;
        }
    </style>
</head>

<body>

    <div class="top-bar">
        <div class="top-bar-left">
            <div class="timer">
                ⏳
                <span id="timer-text">50 : 00 minutes remaining</span>
            </div>
            <div class="audio-status">
                🔊
                <span id="audio-status-text">Audio is stopped</span>
            </div>
        </div>

        <button class="finish-btn" id="finish-btn">
            Finish Test →
        </button>
    </div>

    <!-- Audio -->
    <audio id="exam-audio" src="{{ asset('public/audio/test.mp3') }}"></audio>

    <!-- Start Modal -->
    {{-- <div id="start-modal">
        <div class="modal-content">
            <h2>Start Exam</h2>
            <p>Enter your ID to start the exam</p>
            <input type="text" id="student-id" placeholder="Your ID">
            <button id="start-exam-btn">Start Exam</button>
        </div>
    </div> --}}
    <div id="start-modal"
        style="position:fixed;
            top:0;
            left:0;
            width:100%;
            height:100%;
            background:linear-gradient(135deg,#667eea,#764ba2);
            display:flex;
            justify-content:center;
            align-items:center;
            z-index:9999;
            font-family:Arial, sans-serif;">

        <div
            style="background:#ffffff;
                padding:40px 30px;
                width:100%;
                max-width:400px;
                border-radius:12px;
                text-align:center;
                box-shadow:0 15px 35px rgba(0,0,0,0.2);">

            <h2 style="margin-bottom:10px; color:#333;">Start Exam</h2>

            <p style="margin-bottom:25px; color:#666; font-size:14px;">
                Please enter your Student ID to begin
            </p>

            <input type="text" id="student-id" placeholder="Enter Your ID"
                style="width:100%;
                      padding:12px 15px;
                      border:2px solid #ddd;
                      border-radius:8px;
                      font-size:14px;
                      margin-bottom:20px;
                      outline:none;"
                onfocus="this.style.borderColor='#667eea'; this.style.boxShadow='0 0 8px rgba(102,126,234,0.3)'"
                onblur="this.style.borderColor='#ddd'; this.style.boxShadow='none'">

            <button id="start-exam-btn"
                style="width:100%;
                       padding:12px;
                       background:linear-gradient(135deg,#667eea,#764ba2);
                       color:#fff;
                       border:none;
                       border-radius:8px;
                       font-size:15px;
                       cursor:pointer;
                       transition:0.3s;"
                onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 8px 20px rgba(0,0,0,0.2)'"
                onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none'">
                Start Exam
            </button>

        </div>
    </div>

    <!-- Main Content -->
    <form id="exam-form" action="{{ route('ListeningTest.listening_test_store') }}" method="POST">
        @csrf
        <input type="hidden" class="id" name="student_id" value="21123">
        <input type="hidden" class="test_id" name="test_id" value="{{ $listening_module_id }}">
        <div class="container">
            <div class="content-wrapper">
                <!-- Part 1 -->
                <div class="part-content active" data-part="1">
                    <div class="part-header">
                        <h1>Part 1</h1>
                        <p>Questions 1–10</p>
                    </div>

                    <div class="questions-section">
                        <h2 class="questions-title">Questions 1–6</h2>

                        <p class="instructions">Complete the form below.</p>

                        <p class="word-limit">Write <strong>NO MORE THAN THREE WORDS OR A NUMBER</strong> for each
                            answer.
                        </p>

                        <h3 class="form-title">CUSTOMER ORDER FORM</h3>

                        <div class="form-field">
                            <label>ACCOUNT NUMBER <span style="font-weight: 700;">1</span></label>
                            <input type="text" id="q1" name="q1" value="3333">
                        </div>

                        <div class="form-field">
                            <label>COMPANY NAME <span style="font-weight: 700;">2</span></label>
                            <input type="text" id="q2" name="q2">
                        </div>

                        <h4 class="section-subtitle">Envelopes</h4>

                        <p class="info-text">Size: A4 normal</p>

                        <div class="form-field">
                            <label>Colour <span style="font-weight: 700;">3</span></label>
                            <input type="text" id="q3" name="q3">
                        </div>
                    </div>

                    <div class="form-field">
                        <label>Quantity <span style="font-weight: 700;">4</span></label>
                        <input type="text" id="q4" name="q4">
                    </div>

                    <h2 class="questions-title" style="margin-top: 40px;">Questions 7–10</h2>

                    <p class="instructions">Complete the notes below.</p>

                    <p class="word-limit">Write <strong>NO MORE THAN TWO WORDS</strong> for each answer.</p>

                    <h4 class="section-subtitle">Delivery Details</h4>

                    <div class="form-field">
                        <label>Address <span style="font-weight: 700;">5</span></label>
                        <input type="text" id="q5" name="q5">
                    </div>

                    <div class="form-field">
                        <label>Contact Person <span style="font-weight: 700;">6</span></label>
                        <input type="text" id="q6" name="q6">
                    </div>

                    <div class="form-field">
                        <label>Phone Number <span style="font-weight: 700;">7</span></label>
                        <input type="text" id="q7" name="q7">
                    </div>

                    <div class="form-field">
                        <label>Delivery Time <span style="font-weight: 700;">8</span></label>
                        <input type="text" id="q8" name="q8">
                    </div>

                    <div class="form-field">
                        <label>Special Instructions <span style="font-weight: 700;">9</span></label>
                        <input type="text" id="q9" name="q9">
                    </div>

                    <div class="form-field">
                        <label>Payment Method <span style="font-weight: 700;">10</span></label>
                        <input type="text" id="q10" name="q10">
                    </div>
                </div>
            </div>

            <!-- Part 2 -->
            <div class="part-content" data-part="2">
                <div class="part-header">
                    <h1>Part 2</h1>
                    <p>Questions 11–20</p>
                </div>

                <div class="questions-section">
                    <h2 class="questions-title">Questions 11–20</h2>

                    <p class="instructions">Complete the sentences below.</p>

                    <p class="word-limit">Write <strong>NO MORE THAN TWO WORDS</strong> for each answer.</p>

                    <div class="form-field" style="margin-top: 30px;">
                        <label style="min-width: 100px;">Question <span style="font-weight: 700;">11</span></label>
                        <input type="text" id="q11" name="q11" style="min-width: 400px;">
                    </div>

                    <div class="form-field">
                        <label style="min-width: 100px;">Question <span style="font-weight: 700;">12</span></label>
                        <input type="text" id="q12" name="q12" style="min-width: 400px;">
                    </div>

                    <div class="form-field">
                        <label style="min-width: 100px;">Question <span style="font-weight: 700;">13</span></label>
                        <input type="text" id="q13" name="q13" style="min-width: 400px;">
                    </div>

                    <div class="form-field">
                        <label style="min-width: 100px;">Question <span style="font-weight: 700;">14</span></label>
                        <input type="text" id="q14" name="q14" style="min-width: 400px;">
                    </div>

                    <div class="form-field">
                        <label style="min-width: 100px;">Question <span style="font-weight: 700;">15</span></label>
                        <input type="text" id="q15" name="q15" style="min-width: 400px;">
                    </div>

                    <div class="form-field">
                        <label style="min-width: 100px;">Question <span style="font-weight: 700;">16</span></label>
                        <input type="text" id="q16" name="q16" style="min-width: 400px;">
                    </div>

                    <div class="form-field">
                        <label style="min-width: 100px;">Question <span style="font-weight: 700;">17</span></label>
                        <input type="text" id="q17" name="q17" style="min-width: 400px;">
                    </div>

                    <div class="form-field">
                        <label style="min-width: 100px;">Question <span style="font-weight: 700;">18</span></label>
                        <input type="text" id="q18" name="q18" style="min-width: 400px;">
                    </div>

                    <div class="form-field">
                        <label style="min-width: 100px;">Question <span style="font-weight: 700;">19</span></label>
                        <input type="text" id="q19" name="q19" style="min-width: 400px;">
                    </div>

                    <div class="form-field">
                        <label style="min-width: 100px;">Question <span style="font-weight: 700;">20</span></label>
                        <input type="text" id="q20" name="q20" style="min-width: 400px;">
                    </div>
                </div>
            </div>

            <!-- Part 3 -->
            <div class="part-content" data-part="3">
                <div class="part-header">
                    <h1>Part 3</h1>
                    <p>Questions 21–30</p>
                </div>

                <div class="questions-section">
                    <h2 class="questions-title">Questions 21–30</h2>

                    <p class="instructions">Choose the correct letter, A, B, or C.</p>

                    <div style="margin-top: 30px;">
                        <p style="font-weight: 600; margin-bottom: 15px;">21. What is the main topic?</p>
                        <div style="margin-left: 30px;">
                            <label style="display: block; margin-bottom: 8px; cursor: pointer;">
                                <input type="radio" id="q21a" name="q21" value="A"> A. Option A
                                <input type="radio" name="q21" value="" checked
                                    style="display:none;">
                            </label>
                            <label style="display: block; margin-bottom: 8px; cursor: pointer;">
                                <input type="radio" id="q21b" name="q21" value="B"> B. Option B
                            </label>
                            <label style="display: block; margin-bottom: 8px; cursor: pointer;">
                                <input type="radio" id="q21c" name="q21" value="C"> C. Option C
                            </label>
                        </div>
                    </div>

                    <div style="margin-top: 25px;">
                        <p style="font-weight: 600; margin-bottom: 15px;">22. What does the speaker suggest?</p>
                        <div style="margin-left: 30px;">
                            <label style="display: block; margin-bottom: 8px; cursor: pointer;">
                                <input type="radio" id="q22a" name="q22" value="A"> A. Option A
                                 <input type="radio" name="q22" value="" checked
                                    style="display:none;">
                            </label>
                            <label style="display: block; margin-bottom: 8px; cursor: pointer;">
                                <input type="radio" id="q22b" name="q22" value="B"> B. Option B
                            </label>
                            <label style="display: block; margin-bottom: 8px; cursor: pointer;">
                                <input type="radio" id="q22c" name="q22" value="C"> C. Option C
                            </label>
                        </div>
                    </div>

                    <div style="margin-top: 25px;">
                        <p style="font-weight: 600; margin-bottom: 15px;">23. According to the text?</p>
                        <div style="margin-left: 30px;">
                            <label style="display: block; margin-bottom: 8px; cursor: pointer;">
                                <input type="radio" id="q23a" name="q23" value="A"> A. Option A
                                 <input type="radio" name="q23" value="" checked
                                    style="display:none;">
                            </label>
                            <label style="display: block; margin-bottom: 8px; cursor: pointer;">
                                <input type="radio" id="q23b" name="q23" value="B"> B. Option B
                            </label>
                            <label style="display: block; margin-bottom: 8px; cursor: pointer;">
                                <input type="radio" id="q23c" name="q23" value="C"> C. Option C
                            </label>
                        </div>
                    </div>

                    <div style="margin-top: 25px;">
                        <p style="font-weight: 600; margin-bottom: 15px;">24. What is mentioned?</p>
                        <div style="margin-left: 30px;">
                            <label style="display: block; margin-bottom: 8px; cursor: pointer;">
                                <input type="radio" id="q24a" name="q24" value="A"> A. Option A
                                 <input type="radio" name="q24" value="" checked
                                    style="display:none;">
                            </label>
                            <label style="display: block; margin-bottom: 8px; cursor: pointer;">
                                <input type="radio" id="q24b" name="q24" value="B"> B. Option B
                            </label>
                            <label style="display: block; margin-bottom: 8px; cursor: pointer;">
                                <input type="radio" id="q24c" name="q24" value="C"> C. Option C
                            </label>
                        </div>
                    </div>

                    <div style="margin-top: 25px;">
                        <p style="font-weight: 600; margin-bottom: 15px;">25. The main point is?</p>
                        <div style="margin-left: 30px;">
                            <label style="display: block; margin-bottom: 8px; cursor: pointer;">
                                <input type="radio" id="q25a" name="q25" value="A"> A. Option A
                                 <input type="radio" name="q25" value="" checked
                                    style="display:none;">
                            </label>
                            <label style="display: block; margin-bottom: 8px; cursor: pointer;">
                                <input type="radio" id="q25b" name="q25" value="B"> B. Option B
                            </label>
                            <label style="display: block; margin-bottom: 8px; cursor: pointer;">
                                <input type="radio" id="q25c" name="q25" value="C"> C. Option C
                            </label>
                        </div>
                    </div>

                    <div style="margin-top: 25px;">
                        <p style="font-weight: 600; margin-bottom: 15px;">26. Question 26?</p>
                        <div style="margin-left: 30px;">
                            <label style="display: block; margin-bottom: 8px; cursor: pointer;">
                                <input type="radio" id="q26a" name="q26" value="A"> A. Option A
                                 <input type="radio" name="q26" value="" checked
                                    style="display:none;">
                            </label>
                            <label style="display: block; margin-bottom: 8px; cursor: pointer;">
                                <input type="radio" id="q26b" name="q26" value="B"> B. Option B
                            </label>
                            <label style="display: block; margin-bottom: 8px; cursor: pointer;">
                                <input type="radio" id="q26c" name="q26" value="C"> C. Option C
                            </label>
                        </div>
                    </div>

                    <div style="margin-top: 25px;">
                        <p style="font-weight: 600; margin-bottom: 15px;">27. Question 27?</p>
                        <div style="margin-left: 30px;">
                            <label style="display: block; margin-bottom: 8px; cursor: pointer;">
                                <input type="radio" id="q27a" name="q27" value="A"> A. Option A
                                 <input type="radio" name="q27" value="" checked
                                    style="display:none;">
                            </label>
                            <label style="display: block; margin-bottom: 8px; cursor: pointer;">
                                <input type="radio" id="q27b" name="q27" value="B"> B. Option B
                            </label>
                            <label style="display: block; margin-bottom: 8px; cursor: pointer;">
                                <input type="radio" id="q27c" name="q27" value="C"> C. Option C
                            </label>
                        </div>
                    </div>

                    <div style="margin-top: 25px;">
                        <p style="font-weight: 600; margin-bottom: 15px;">28. Question 28?</p>
                        <div style="margin-left: 30px;">
                            <label style="display: block; margin-bottom: 8px; cursor: pointer;">
                                <input type="radio" id="q28a" name="q28" value="A"> A. Option A
                                 <input type="radio" name="q28" value="" checked
                                    style="display:none;">
                            </label>
                            <label style="display: block; margin-bottom: 8px; cursor: pointer;">
                                <input type="radio" id="q28b" name="q28" value="B"> B. Option B
                            </label>
                            <label style="display: block; margin-bottom: 8px; cursor: pointer;">
                                <input type="radio" id="q28c" name="q28" value="C"> C. Option C
                            </label>
                        </div>
                    </div>

                    <div style="margin-top: 25px;">
                        <p style="font-weight: 600; margin-bottom: 15px;">29. Question 29?</p>
                        <div style="margin-left: 30px;">
                            <label style="display: block; margin-bottom: 8px; cursor: pointer;">
                                <input type="radio" id="q29a" name="q29" value="A"> A. Option A
                                 <input type="radio" name="q29" value="" checked
                                    style="display:none;">
                            </label>
                            <label style="display: block; margin-bottom: 8px; cursor: pointer;">
                                <input type="radio" id="q29b" name="q29" value="B"> B. Option B
                            </label>
                            <label style="display: block; margin-bottom: 8px; cursor: pointer;">
                                <input type="radio" id="q29c" name="q29" value="C"> C. Option C
                            </label>
                        </div>
                    </div>

                    <div style="margin-top: 25px;">
                        <p style="font-weight: 600; margin-bottom: 15px;">30. Question 30?</p>
                        <div style="margin-left: 30px;">
                            <label style="display: block; margin-bottom: 8px; cursor: pointer;">
                                <input type="radio" id="q30a" name="q30" value="A"> A. Option A
                                 <input type="radio" name="q30" value="" checked
                                    style="display:none;">
                            </label>
                            <label style="display: block; margin-bottom: 8px; cursor: pointer;">
                                <input type="radio" id="q30b" name="q30" value="B"> B. Option B
                            </label>
                            <label style="display: block; margin-bottom: 8px; cursor: pointer;">
                                <input type="radio" id="q30c" name="q30" value="C"> C. Option C
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Part 4 -->
            <div class="part-content" data-part="4">
                <div class="part-header">
                    <h1>Part 4</h1>
                    <p>Questions 31–40</p>
                </div>

                <div class="questions-section">
                    <h2 class="questions-title">Questions 31–40</h2>

                    <p class="instructions">Complete the notes below.</p>

                    <p class="word-limit">Write <strong>NO MORE THAN TWO WORDS AND/OR A NUMBER</strong> for each
                        answer.</p>

                    <h3 class="form-title" style="margin-top: 25px;">LECTURE NOTES</h3>

                    <div class="form-field" style="margin-top: 20px;">
                        <label style="min-width: 100px;">Point <span style="font-weight: 700;">31</span></label>
                        <input type="text" id="q31" name="q31" style="min-width: 400px;">
                    </div>

                    <div class="form-field">
                        <label style="min-width: 100px;">Point <span style="font-weight: 700;">32</span></label>
                        <input type="text" id="q32" name="q32" style="min-width: 400px;">
                    </div>

                    <div class="form-field">
                        <label style="min-width: 100px;">Point <span style="font-weight: 700;">33</span></label>
                        <input type="text" id="q33" name="q33" style="min-width: 400px;">
                    </div>

                    <div class="form-field">
                        <label style="min-width: 100px;">Point <span style="font-weight: 700;">34</span></label>
                        <input type="text" id="q34" name="q34" style="min-width: 400px;">
                    </div>

                    <div class="form-field">
                        <label style="min-width: 100px;">Point <span style="font-weight: 700;">35</span></label>
                        <input type="text" id="q35" name="q35" style="min-width: 400px;">
                    </div>

                    <div class="form-field">
                        <label style="min-width: 100px;">Point <span style="font-weight: 700;">36</span></label>
                        <input type="text" id="q36" name="q36" style="min-width: 400px;">
                    </div>

                    <div class="form-field">
                        <label style="min-width: 100px;">Point <span style="font-weight: 700;">37</span></label>
                        <input type="text" id="q37" name="q37" style="min-width: 400px;">
                    </div>

                    <div class="form-field">
                        <label style="min-width: 100px;">Point <span style="font-weight: 700;">38</span></label>
                        <input type="text" id="q38" name="q38" style="min-width: 400px;">
                    </div>

                    <div class="form-field">
                        <label style="min-width: 100px;">Point <span style="font-weight: 700;">39</span></label>
                        <input type="text" id="q39" name="q39" style="min-width: 400px;">
                    </div>

                    <div class="form-field">
                        <label style="min-width: 100px;">Point <span style="font-weight: 700;">40</span></label>
                        <input type="text" id="q40" name="q40" style="min-width: 400px;">
                    </div>
                </div>
            </div>
        </div>
        </div>
    </form>
    <!-- Bottom Navigation -->
    <div class="bottom-nav">
        <div class="part-pagination">
            <div class="part-item active" data-part="1">
                <span>Part 1</span>
                <div class="question-numbers" id="part1-questions">
                    <div class="question-num active" data-question="1">1</div>
                    <div class="question-num" data-question="2">2</div>
                    <div class="question-num" data-question="3">3</div>
                    <div class="question-num" data-question="4">4</div>
                    <div class="question-num" data-question="5">5</div>
                    <div class="question-num" data-question="6">6</div>
                    <div class="question-num" data-question="7">7</div>
                    <div class="question-num" data-question="8">8</div>
                    <div class="question-num" data-question="9">9</div>
                    <div class="question-num" data-question="10">10</div>
                </div>
                <span class="page-indicator" style="display: none;">1 of 10</span>
            </div>

            <div class="part-item" data-part="2">
                <span>Part 2</span>
                <div class="question-numbers" id="part2-questions" style="display: none;">
                    <div class="question-num" data-question="11">11</div>
                    <div class="question-num" data-question="12">12</div>
                    <div class="question-num" data-question="13">13</div>
                    <div class="question-num" data-question="14">14</div>
                    <div class="question-num" data-question="15">15</div>
                    <div class="question-num" data-question="16">16</div>
                    <div class="question-num" data-question="17">17</div>
                    <div class="question-num" data-question="18">18</div>
                    <div class="question-num" data-question="19">19</div>
                    <div class="question-num" data-question="20">20</div>
                </div>
                <span class="page-indicator">11 of 20</span>
            </div>

            <div class="part-item" data-part="3">
                <span>Part 3</span>
                <div class="question-numbers" id="part3-questions" style="display: none;">
                    <div class="question-num" data-question="21">21</div>
                    <div class="question-num" data-question="22">22</div>
                    <div class="question-num" data-question="23">23</div>
                    <div class="question-num" data-question="24">24</div>
                    <div class="question-num" data-question="25">25</div>
                    <div class="question-num" data-question="26">26</div>
                    <div class="question-num" data-question="27">27</div>
                    <div class="question-num" data-question="28">28</div>
                    <div class="question-num" data-question="29">29</div>
                    <div class="question-num" data-question="30">30</div>
                </div>
                <span class="page-indicator">21 of 30</span>
            </div>

            <div class="part-item" data-part="4">
                <span>Part 4</span>
                <div class="question-numbers" id="part4-questions" style="display: none;">
                    <div class="question-num" data-question="31">31</div>
                    <div class="question-num" data-question="32">32</div>
                    <div class="question-num" data-question="33">33</div>
                    <div class="question-num" data-question="34">34</div>
                    <div class="question-num" data-question="35">35</div>
                    <div class="question-num" data-question="36">36</div>
                    <div class="question-num" data-question="37">37</div>
                    <div class="question-num" data-question="38">38</div>
                    <div class="question-num" data-question="39">39</div>
                    <div class="question-num" data-question="40">40</div>
                </div>
                <span class="page-indicator">31 of 40</span>
            </div>
        </div>

        <div class="nav-arrows">
            <button class="nav-arrow" id="prev-btn">←</button>
            <button class="nav-arrow" id="next-btn">→</button>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const modal = document.getElementById('start-modal');
            const startBtn = document.getElementById('start-exam-btn');
            const audio = document.getElementById('exam-audio');
            const timerText = document.getElementById('timer-text');
            const finishBtn = document.getElementById('finish-btn');
            const audioStatusText = document.getElementById('audio-status-text');

            let timerInterval = null;
            let timeInSeconds = 50 * 60; // 50 minutes
            let examStarted = false;
            /* Page Load */
            window.onload = function() {
                modal.style.display = 'flex';
            };

            /* Start Exam */
            startBtn.addEventListener('click', () => {

                const studentId = document.getElementById('student-id').value.trim();
                $('.id').val(studentId);
                console.log("Student ID entered:", studentId); // Debugging log

                if (studentId === '') {
                    alert('Please enter your ID');
                    return;
                }

                examStarted = true;
                modal.style.display = 'none';

                // Start Audio
                audio.play();
                audioStatusText.textContent = "Audio is playing...";

                // Start Timer
                timerInterval = setInterval(() => {

                    if (timeInSeconds > 0) {
                        timeInSeconds--;

                        const minutes = Math.floor(timeInSeconds / 60);
                        const seconds = timeInSeconds % 60;

                        timerText.textContent =
                            `${minutes} : ${seconds.toString().padStart(2, '0')} minutes remaining`;

                    } else {
                        endExam();
                    }

                }, 1000);

            });

            /* Finish Button */
            // finishBtn.addEventListener('click', () => {

            //     if (!examStarted) return;

            //     if (confirm("Are you sure you want to finish the test?")) {
            //         endExam();
            //     }

            // });

            document.getElementById("finish-btn").addEventListener("click", function() {
                Swal.fire({
                    title: 'Finish Exam?',
                    text: "You won't be able to change your answers!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#4CAF50',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, submit it!',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById("exam-form").submit();
                        endExam();
                    }
                });
            });
            /* End Exam Function */
            function endExam() {
                clearInterval(timerInterval);
                audio.pause();
                audioStatusText.textContent = "Audio stopped";

            }


        });
    </script>


    <script>
        let currentPart = 1;
        const totalParts = 4;

        // Initialize navigation
        updateNavigation();

        // -----------------------
        // Part navigation clicks
        // -----------------------
        document.querySelectorAll('.part-item').forEach(item => {
            item.addEventListener('click', function() {
                const part = parseInt(this.getAttribute('data-part'));
                navigateToPart(part);
            });
        });

        // -----------------------
        // Arrow navigation
        // -----------------------
        document.getElementById('prev-btn').addEventListener('click', function() {
            if (currentPart > 1) navigateToPart(currentPart - 1);
        });

        document.getElementById('next-btn').addEventListener('click', function() {
            if (currentPart < totalParts) navigateToPart(currentPart + 1);
        });

        // -----------------------
        // Bottom question numbers click
        // -----------------------
        document.querySelectorAll('.question-num').forEach(num => {
            num.addEventListener('click', function(e) {
                e.preventDefault();
                const questionNumber = parseInt(this.getAttribute('data-question'), 10);

                // Determine part
                let part = 1;
                if (questionNumber >= 1 && questionNumber <= 10) part = 1;
                else if (questionNumber >= 11 && questionNumber <= 20) part = 2;
                else if (questionNumber >= 21 && questionNumber <= 30) part = 3;
                else if (questionNumber >= 31 && questionNumber <= 40) part = 4;

                // Navigate to part if needed
                if (part !== currentPart) navigateToPart(part);

                // Highlight active question number
                document.querySelectorAll('.question-num').forEach(qn => qn.classList.remove('active'));
                this.classList.add('active');

                // Scroll input or radio into view
                const inputField = document.getElementById(`q${questionNumber}`) || document.getElementById(
                    `q${questionNumber}a`);
                if (inputField) {
                    setTimeout(() => {
                        inputField.scrollIntoView({
                            behavior: 'smooth',
                            block: 'center'
                        });
                        inputField.focus({
                            preventScroll: true
                        });
                    }, 50); // small delay to ensure part is visible
                }

                // Scroll bottom nav to center active question
                this.scrollIntoView({
                    behavior: 'smooth',
                    inline: 'center'
                });
            });
        });


        // -----------------------
        // Input focus highlights bottom nav
        // -----------------------
        document.querySelectorAll('.questions-section input').forEach(input => {
            input.addEventListener('focus', function() {
                const questionNumber = parseInt(this.id.replace('q', ''), 10);

                // Determine part
                let part = 1;
                if (questionNumber >= 1 && questionNumber <= 10) part = 1;
                else if (questionNumber >= 11 && questionNumber <= 20) part = 2;
                else if (questionNumber >= 21 && questionNumber <= 30) part = 3;
                else if (questionNumber >= 31 && questionNumber <= 40) part = 4;

                // Only auto-switch if necessary
                if (part !== currentPart) navigateToPart(part);

                // Highlight active question number
                document.querySelectorAll('.question-num').forEach(qn => qn.classList.remove('active'));
                const activeQuestion = document.querySelector(
                    `.question-num[data-question="${questionNumber}"]`);
                if (activeQuestion) {
                    activeQuestion.classList.add('active');
                    // Scroll bottom nav smoothly
                    activeQuestion.scrollIntoView({
                        behavior: 'smooth',
                        inline: 'center'
                    });
                }

                // Smooth scroll input into view
                const container = document.querySelector('.container');
                if (container) {
                    setTimeout(() => {
                        const inputRect = input.getBoundingClientRect();
                        const containerRect = container.getBoundingClientRect();

                        let scrollTop = container.scrollTop + (inputRect.top - containerRect.top) -
                            container.clientHeight / 2 + input.clientHeight / 2;

                        scrollTop = Math.max(0, Math.min(scrollTop, container.scrollHeight -
                            container.clientHeight));

                        container.scrollTo({
                            top: scrollTop,
                            behavior: 'smooth'
                        });
                    }, 50);
                }
            });
        });

        // -----------------------
        // Functions
        // -----------------------
        function navigateToPart(part) {
            currentPart = part;

            // Hide all parts
            document.querySelectorAll('.part-content').forEach(content => content.classList.remove('active'));

            // Show selected part
            document.querySelector(`.part-content[data-part="${part}"]`).classList.add('active');

            // Update part items
            document.querySelectorAll('.part-item').forEach(item => item.classList.remove('active'));
            document.querySelector(`.part-item[data-part="${part}"]`).classList.add('active');

            // Show/hide question numbers based on part
            document.querySelectorAll('.question-numbers').forEach(qn => qn.style.display = 'none');
            document.querySelectorAll('.page-indicator').forEach(pi => pi.style.display = 'inline');

            const currentPartQuestions = document.querySelector(`#part${part}-questions`);
            if (currentPartQuestions) {
                currentPartQuestions.style.display = 'flex';
                const indicator = document.querySelector(`.part-item[data-part="${part}"] .page-indicator`);
                if (indicator) indicator.style.display = 'none';
            }

            updateNavigation();

            // Scroll to top of container
            const container = document.querySelector('.container');
            if (container) {
                container.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            } else {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            }
        }

        function updateNavigation() {
            document.getElementById('prev-btn').disabled = currentPart === 1;
            document.getElementById('next-btn').disabled = currentPart === totalParts;
        }
    </script>

</body>

</html>
