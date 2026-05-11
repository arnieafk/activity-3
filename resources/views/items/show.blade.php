<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item Details</title>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg: #fffcf2;
            --black: #1a1a1a;
            --accent: #ffdf00; /* Bold Yellow */
            --white: #ffffff;
            --border-width: 3px;
        }

        body {
            font-family: 'Space Grotesk', sans-serif;
            background-color: var(--bg);
            color: var(--black);
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            width: 100%;
            max-width: 550px;
        }

        /* The Chunky Card */
        .detail-card {
            background: var(--white);
            border: var(--border-width) solid var(--black);
            padding: 40px;
            box-shadow: 12px 12px 0px var(--black);
            position: relative;
        }

        /* Status Badge - Brutalist Style */
        .status-pill {
            display: inline-block;
            padding: 6px 16px;
            border: var(--border-width) solid var(--black);
            font-size: 0.8rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 25px;
            transform: rotate(-1deg); /* Slight tilt for uniqueness */
        }

        .lost { background: #ff4d4d; color: white; }
        .found { background: #00e676; color: var(--black); }

        h1 {
            font-size: 2.8rem;
            margin: 0 0 30px 0;
            color: var(--black);
            text-transform: uppercase;
            letter-spacing: -2px;
            line-height: 1;
            border-bottom: var(--border-width) solid var(--black);
            padding-bottom: 10px;
        }

        /* Info Layout */
        .info-grid {
            display: grid;
            gap: 25px;
            text-align: left;
            margin-bottom: 30px;
        }

        .info-item {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .label {
            font-size: 0.85rem;
            font-weight: 800;
            color: var(--black);
            text-transform: uppercase;
            letter-spacing: 1px;
            text-decoration: underline var(--accent) 4px; /* Fun underlined accent */
        }

        .value {
            font-size: 1.2rem;
            font-weight: 700;
            color: var(--black);
        }

        .description-box {
            background: var(--bg);
            padding: 20px;
            border: 2px solid var(--black);
            line-height: 1.6;
            font-weight: 500;
            box-shadow: 4px 4px 0px var(--black);
        }

        /* Back Button - Brutalist Button Style */
        .back-btn {
            display: inline-flex;
            align-items: center;
            text-decoration: none;
            background: var(--accent);
            color: var(--black);
            border: var(--border-width) solid var(--black);
            padding: 12px 24px;
            font-weight: 800;
            font-size: 1rem;
            text-transform: uppercase;
            transition: all 0.2s;
            box-shadow: 4px 4px 0px var(--black);
        }

        .back-btn:hover {
            transform: translate(-2px, -2px);
            box-shadow: 6px 6px 0px var(--black);
            background: var(--black);
            color: var(--white);
        }

        .icon { margin-right: 10px; font-weight: 900; }
    </style>
</head>
<body>

<div class="container">
    <div class="detail-card">
        <div class="status-pill {{ strtolower($item->status) == 'lost' ? 'lost' : 'found' }}">
            {{ $item->status }}
        </div>

        <h1>{{ $item->item_name }}</h1>

        <div class="info-grid">
            <div class="info-item">
                <span class="label">Location Found</span>
                <span class="value">{{ $item->location_found }}</span>
            </div>

            <div class="info-item">
                <span class="label">Date Reported</span>
                <span class="value">{{ \Carbon\Carbon::parse($item->date_reported)->format('M d, Y') }}</span>
            </div>

            <div class="info-item">
                <span class="label">Details & Notes</span>
                <div class="description-box">
                    {{ $item->description }}
                </div>
            </div>
        </div>

        <div style="margin-top: 35px; text-align: left;">
            <a href="{{ route('items.index') }}" class="back-btn">
                <span class="icon">←</span> Back to List
            </a>
        </div>
    </div>
</div>

</body>
</html>
