<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Partial - Listening Test</title>
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
            justify-content: flex-start;
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

        /* Main Content */
        .main-content {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 40px 20px;
        }

        .title {
            font-size: 56px;
            color: #2d3748;
            margin-bottom: 60px;
            font-weight: 400;
        }

        /* Buttons Grid */
        .buttons-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            max-width: 1100px;
            width: 100%;
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
            border-radius: 8px;
            font-size: 17px;
            font-weight: 500;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
            min-height: 60px;
        }

        .test-button:hover {
            background: #1d4ed8;
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(37, 99, 235, 0.4);
        }

        .test-button:active {
            transform: translateY(0);
        }

        .button-icon {
            font-size: 22px;
        }

        /* Last row - 2 centered buttons */
        .buttons-grid .test-button:nth-child(9),
        .buttons-grid .test-button:nth-child(10) {
            grid-column: span 1;
        }

        .buttons-grid .test-button:nth-child(9) {
            grid-column: 2 / 3;
        }

        .buttons-grid .test-button:nth-child(10) {
            grid-column: 3 / 4;
        }

        /* Footer */
        .footer {
            text-align: center;
            padding: 30px;
            color: #64748b;
            font-size: 14px;
            border-top: 1px solid rgba(100, 116, 139, 0.2);
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .buttons-grid {
                grid-template-columns: repeat(3, 1fr);
            }

            .buttons-grid .test-button:nth-child(9) {
                grid-column: 1 / 2;
            }

            .buttons-grid .test-button:nth-child(10) {
                grid-column: 2 / 3;
            }
        }

        @media (max-width: 768px) {
            .buttons-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .title {
                font-size: 40px;
            }

            .test-button {
                font-size: 15px;
                padding: 16px 20px;
            }

            .buttons-grid .test-button:nth-child(9),
            .buttons-grid .test-button:nth-child(10) {
                grid-column: span 1;
            }
        }

        @media (max-width: 480px) {
            .buttons-grid {
                grid-template-columns: 1fr;
            }

            .header {
                padding: 20px;
            }

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
        <div class="logo">
            <div class="logo-main">HEXA<span class="logo-accent">S</span></div>
            <div class="logo-sub">ZINDABAZAR</div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <h1 class="title">Partial</h1>

        <div class="buttons-grid">
            @foreach ($listening_modules as $item)
                <a href="{{ route('ListeningTest.listening_test',['id' => $item->id]) }}" class="test-button">
                    <span class="button-icon">🎧</span>
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
