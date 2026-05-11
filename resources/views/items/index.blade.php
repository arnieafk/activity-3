<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lost & Found</title>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg: #fffcf2;
            --black: #1a1a1a;
            --accent: #ffdf00; /* Bold Yellow */
            --highlight: #8b5cf6; /* Vibrant Purple */
            --border: 3px solid var(--black);
        }

        body {
            font-family: 'Space Grotesk', sans-serif;
            background-color: var(--bg);
            color: var(--black);
            margin: 0;
            padding: 40px 20px;
        }

        .container { max-width: 800px; margin: 0 auto; }

        /* Header with tilted text effect */
        .header-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 50px;
            padding-bottom: 20px;
            border-bottom: var(--border);
        }

        h1 {
            font-size: 3rem;
            margin: 0;
            text-transform: uppercase;
            letter-spacing: -2px;
        }

        /* Bold, chunky button */
        .btn-create {
            background: var(--accent);
            border: var(--border);
            padding: 12px 24px;
            font-weight: 700;
            text-decoration: none;
            color: var(--black);
            box-shadow: 6px 6px 0px var(--black);
            transition: all 0.2s;
        }

        .btn-create:hover { transform: translate(2px, 2px); box-shadow: 4px 4px 0px var(--black); }

        /* Chunky Cards */
        .item-card {
            background: white;
            border: var(--border);
            padding: 24px;
            margin-bottom: 24px;
            box-shadow: 8px 8px 0px var(--black);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .item-info h3 { font-size: 1.5rem; margin: 0 0 10px 0; }

        .status-badge {
            display: inline-block;
            padding: 4px 10px;
            border: 2px solid var(--black);
            font-size: 0.7rem;
            font-weight: 900;
            text-transform: uppercase;
        }

        .status-lost { background: #ff4d4d; color: white; }
        .status-found { background: #00e676; color: var(--black); }
        .status-default { background: #e0e0e0; }

        /* Action Buttons */
        .actions { display: flex; gap: 12px; }

        .btn-action {
            border: 2px solid var(--black);
            padding: 8px 16px;
            font-weight: 700;
            text-decoration: none;
            color: var(--black);
            background: white;
        }

        .btn-action:hover { background: var(--accent); }

        .btn-delete {
            background: var(--black);
            color: white;
            border: 2px solid var(--black);
            padding: 8px 16px;
            font-weight: 700;
            cursor: pointer;
            font-family: inherit;
        }

        /* Empty State */
        .empty-state {
            border: var(--border);
            padding: 40px;
            text-align: center;
            background: #f0f0f0;
            font-weight: 700;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="header-section">
        <h1>Lost and Found Items</h1>
        <a href="{{ route('items.create') }}" class="btn-create">+ ADD ITEM</a>
    </div>

    @forelse($items as $item)
        <div class="item-card">
            <div class="item-info">
                <h3>{{ $item->item_name }}</h3>
                <span class="status-badge {{ strtolower($item->status) == 'lost' ? 'status-lost' : (strtolower($item->status) == 'found' ? 'status-found' : 'status-default') }}">
                    {{ $item->status }}
                </span>
            </div>

            <div class="actions">
                <a href="{{ route('items.show', $item->id) }}" class="btn-action">VIEW</a>
                <a href="{{ route('items.edit', $item->id) }}" class="btn-action">EDIT</a>
                <form action="{{ route('items.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-delete">DELETE</button>
                </form>
            </div>
        </div>
    @empty
        <div class="empty-state">
            <p>NO ITEMS IN THE LIST. START ADDING SOME!</p>
        </div>
    @endforelse
</div>

</body>
</html>
