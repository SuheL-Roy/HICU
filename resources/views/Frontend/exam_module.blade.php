<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Partial - HEXA'S Zindabazar</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Georgia', serif;
            background: linear-gradient(135deg, #b8e6e1 0%, #a8ddd8 100%);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Header */
        .header {
            padding: 20px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .logo-main {
            font-size: 42px;
            font-weight: bold;
            color: #2c3e9e;
            letter-spacing: 2px;
            line-height: 1;
        }

        .logo-sub {
            font-size: 14px;
            color: #e63946;
            letter-spacing: 3px;
            font-weight: 600;
            margin-top: -5px;
        }

        .logo-accent {
            color: #e63946;
        }

        .user-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: 3px solid white;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            position: relative;
        }

        .user-avatar::after {
            content: '';
            width: 12px;
            height: 12px;
            background: #4ade80;
            border: 2px solid white;
            border-radius: 50%;
            position: absolute;
            bottom: 2px;
            right: 2px;
        }

        /* User Dropdown */
        .user-menu {
            position: relative;
        }

        .user-avatar {
            cursor: pointer;
        }

        .dropdown {
            position: absolute;
            top: 60px;
            right: 0;
            background: white;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            min-width: 200px;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: all 0.3s ease;
            z-index: 1000;
        }

        .dropdown.active {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .dropdown::before {
            content: '';
            position: absolute;
            top: -8px;
            right: 15px;
            width: 16px;
            height: 16px;
            background: white;
            transform: rotate(45deg);
            border-radius: 2px;
        }

        .dropdown-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 14px 20px;
            color: #2d3748;
            text-decoration: none;
            font-size: 15px;
            transition: all 0.2s ease;
            border-bottom: 1px solid #e2e8f0;
        }

        .dropdown-item:first-child {
            border-radius: 12px 12px 0 0;
        }

        .dropdown-item:last-child {
            border-bottom: none;
            border-radius: 0 0 12px 12px;
        }

        .dropdown-item:hover {
            background: #f7fafc;
            color: #2563eb;
        }

        .dropdown-icon {
            font-size: 18px;
            width: 20px;
            text-align: center;
        }

        /* Main Content */
        .main-content {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 40px;
        }

        .title {
            font-size: 56px;
            color: #2d3748;
            margin-bottom: 20px;
            font-weight: 400;
        }

        .subtitle {
            font-size: 22px;
            color: #4a5568;
            margin-bottom: 50px;
            font-weight: 400;
        }

        /* Buttons Container */
        .button-container {
            display: flex;
            gap: 25px;
            margin-bottom: 40px;
        }

        .exam-button {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 16px 40px;
            background: #2563eb;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-size: 18px;
            font-weight: 500;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
        }

        .exam-button:hover {
            background: #1d4ed8;
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(37, 99, 235, 0.4);
        }

        .exam-button:active {
            transform: translateY(0);
        }

        .button-icon {
            font-size: 22px;
        }

        /* Footer */
        .footer {
            text-align: center;
            padding: 30px;
            color: #64748b;
            font-size: 14px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .button-container {
                flex-direction: column;
                gap: 15px;
            }

            .title {
                font-size: 40px;
            }

            .subtitle {
                font-size: 18px;
            }

            .exam-button {
                width: 100%;
                justify-content: center;
            }
        }
    </style>
</head>

<body>
    <!-- Header -->
    <div class="header">
        <div class="logo">
            <div class="logo-main">HEXA<span class="logo-accent">S</span></div>
            <div class="logo-sub">ZINDABAZAR</div>
        </div>
        <div class="user-menu">
            {{-- <div class="user-avatar" id="userAvatar"></div> --}}
            <div id="userAvatar"
                style="
        width:42px;
        height:42px;
        border-radius:50%;
        background:linear-gradient(135deg,#4f46e5,#9333ea);
        color:#fff;
        font-weight:600;
        font-size:16px;
        display:flex;
        align-items:center;
        justify-content:center;
        box-shadow:0 4px 10px rgba(0,0,0,0.15);
        cursor:pointer;
     ">
                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
            </div>

            <div class="dropdown" id="dropdown">
                <a href="#dashboard" class="dropdown-item">
                    <span>Dashboard</span>
                </a>
                <a href="{{ route('logout') }}" class="dropdown-item"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">


                    <span>Logout</span>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>

            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <h1 class="title">Partial</h1>
        <p class="subtitle">Venue - HEXA'S Zindabazar</p>

        <div class="button-container">
            <a href="{{ route('frontend.listening') }}" class="exam-button">
                <span class="button-icon">🎧</span>
                <span>Listening</span>
            </a>
            <a href="{{ route('frontend.writing_type') }}" class="exam-button">
                <span class="button-icon">📝</span>
                <span>Writing</span>
            </a>
            <a href="{{ route('frontend.reading') }}" class="exam-button">
                <span class="button-icon">📖</span>
                <span>Reading</span>
            </a>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        Copyright © All rights reserved.
    </div>

    <script>
        const userAvatar = document.getElementById('userAvatar');
        const dropdown = document.getElementById('dropdown');

        // Toggle dropdown when clicking avatar
        userAvatar.addEventListener('click', function(e) {
            e.stopPropagation();
            dropdown.classList.toggle('active');
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', function(e) {
            if (!dropdown.contains(e.target) && e.target !== userAvatar) {
                dropdown.classList.remove('active');
            }
        });

        // Prevent dropdown from closing when clicking inside it
        dropdown.addEventListener('click', function(e) {
            e.stopPropagation();
        });
    </script>
</body>

</html>
