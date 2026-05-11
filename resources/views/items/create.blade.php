<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Item</title>
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

        .form-card {
            background: var(--white);
            width: 100%;
            max-width: 500px;
            padding: 40px;
            border: var(--border-width) solid var(--black);
            box-shadow: 12px 12px 0px var(--black);
            position: relative;
        }

        .form-card::before {
            content: "NEW ENTRY";
            position: absolute;
            top: -16px;
            right: 20px;
            background: var(--black);
            color: var(--accent);
            padding: 4px 12px;
            font-weight: 800;
            font-size: 0.75rem;
            letter-spacing: 1px;
            border: var(--border-width) solid var(--black);
        }

        header {
            text-align: left;
            margin-bottom: 35px;
        }

        h1 {
            font-size: 2.2rem;
            font-weight: 800;
            margin: 0;
            text-transform: uppercase;
            letter-spacing: -1.5px;
            line-height: 1;
        }

        .subtitle {
            color: var(--black);
            margin-top: 10px;
            font-size: 1rem;
            font-weight: 600;
            background: var(--accent);
            display: inline-block;
            padding: 2px 8px;
            border: 2px solid var(--black);
        }

        .form-group {
            margin-bottom: 25px;
        }

        label {
            display: block;
            font-size: 0.9rem;
            font-weight: 800;
            margin-bottom: 8px;
            text-transform: uppercase;
        }

        input[type="text"],
        input[type="date"],
        select,
        textarea {
            width: 100%;
            padding: 14px;
            border: var(--border-width) solid var(--black);
            border-radius: 0;
            font-family: inherit;
            font-size: 1rem;
            font-weight: 600;
            color: var(--black);
            background: var(--white);
            box-sizing: border-box;
            transition: all 0.1s ease;
        }

        input:focus, select:focus, textarea:focus {
            outline: none;
            background: var(--white);
            box-shadow: 4px 4px 0px var(--black);
            transform: translate(-2px, -2px);
        }

        textarea {
            resize: vertical;
            min-height: 120px;
        }

        .btn-container {
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 15px;
            margin-top: 35px;
        }

        .btn-save {
            background: var(--black);
            color: var(--white);
            border: var(--border-width) solid var(--black);
            padding: 16px;
            font-weight: 800;
            font-size: 1rem;
            text-transform: uppercase;
            cursor: pointer;
            box-shadow: 4px 4px 0px #666;
            transition: all 0.2s;
        }

        .btn-save:hover {
            background: var(--accent);
            color: var(--black);
            box-shadow: 6px 6px 0px var(--black);
            transform: translate(-2px, -2px);
        }

        .btn-cancel {
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            background: var(--white);
            color: var(--black);
            border: var(--border-width) solid var(--black);
            padding: 16px;
            font-weight: 800;
            font-size: 1rem;
            text-transform: uppercase;
            transition: all 0.2s;
        }

        .btn-cancel:hover {
            background: #eee;
            transform: translate(2px, 2px);
        }

    </style>
</head>
<body>

<div class="form-card">
    <header>
        <h1>Add New Item</h1>
        <p class="subtitle">Record the details below</p>
    </header>

    {{-- ERROR DISPLAY --}}
    @if ($errors->any())
        <div style="color:red; margin-bottom:15px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('items.store') }}">
        @csrf

        <div class="form-group">
            <label>Item Name</label>
            <input type="text" name="item_name" placeholder="Ex. Silver iPhone 13" required>
        </div>

        <div class="form-group">
            <label>Location</label>
            <input type="text" name="location_found" placeholder="Ex. Terminal 2, Arrival Area" required>
        </div>

        <div class="form-group">
            <label>Current Status</label>
            <select name="status">
                <option value="Lost">Lost</option>
                <option value="Found">Found</option>
            </select>
        </div>

        <div class="form-group">
            <label>Description</label>
            <textarea name="description" placeholder="Provide details like color, brand, or unique marks..."></textarea>
        </div>

        <div class="form-group">
            <label>Date Reported</label>
            <input type="date" name="date_reported" required value="{{ date('Y-m-d') }}">
        </div>

        <div class="btn-container">
            <a href="{{ route('items.index') }}" class="btn-cancel">Cancel</a>
            <button type="submit" class="btn-save">Publish Record</button>
        </div>
    </form>
</div>

</body>
</html>
