<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Writing Module</title>

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
        }

        .logo-main {
            font-size: 42px;
            font-weight: bold;
            color: #2c3e9e;
            letter-spacing: 2px;
        }

        .logo-sub {
            font-size: 14px;
            color: #e63946;
            letter-spacing: 3px;
            font-weight: 600;
        }

        .logo-accent {
            color: #e63946;
        }

        /* Main Content */
        .main-content {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 40px 20px;
        }

        .title {
            font-size: 56px;
            color: #2d3748;
            margin-bottom: 60px;
            font-weight: 400;
            text-align: center;
        }

        /* 🔥 Dynamic Grid */
        .buttons-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 280px));
            justify-content: center;
            gap: 25px;
            width: 100%;
            max-width: 1100px;
            margin-bottom: 40px;
        }

        .test-button {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            padding: 18px 30px;
            background: #2563eb;
            color: white;
            text-decoration: none;
            border-radius: 10px;
            font-size: 17px;
            font-weight: 500;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
            min-height: 60px;
        }

        .test-button:hover {
            background: #1d4ed8;
            transform: translateY(-3px);
            box-shadow: 0 8px 18px rgba(37, 99, 235, 0.4);
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
            border-top: 1px solid rgba(100, 116, 139, 0.2);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .title {
                font-size: 40px;
            }

            .test-button {
                font-size: 15px;
                padding: 16px 20px;
            }
        }

        @media (max-width: 480px) {
            .logo-main {
                font-size: 32px;
            }

            .logo-sub {
                font-size: 12px;
            }
        }
    </style>
</head>

<body>

    <!-- Header -->
    <div class="header">
        <div class="logo-main">HEXA<span class="logo-accent">S</span></div>
        <div class="logo-sub">ZINDABAZAR</div>
    </div>

    <!-- Main -->
    <div class="main-content">
        <h1 class="title">Writing Module</h1>

        <div class="buttons-grid">
            @foreach ($writing_modules as $item)
                <a href="" class="test-button">
                    <span class="button-icon">📝</span>
                    <span>{{ $item->name }}</span>
                </a>
            @endforeach
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        Copyright © All rights reserved.
    </div>

</body>
</html>
