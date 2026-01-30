<!DOCTYPE html>
<html>
<head>
    <style>
        @page {
            margin: 0;
        }

        body {
            font-family: DejaVu Sans;
            font-size: 12px;
        }

        /* Letterhead background */
        .letterhead {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
        }

        .content {
            padding: 160px 40px 40px 40px; /* adjust based on letterhead */
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #000;
            padding: 6px;
        }
    </style>
</head>
<body>

    <!-- Letterhead -->
    <img src="{{ public_path('letterhead/letterhead2.png') }}" class="letterhead">

    <!-- Content -->
    <div class="content">

        <h3>Price List</h3>
        <p>Date: {{ \Carbon\Carbon::parse($date)->format('d-m-Y') }}</p>

        <table>
            <thead>
                <tr>
                    <th>Qty</th>
                    <th>Model</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                    <tr>
                        <td>{{ $item['quantity'] }}</td>
                        <td>{{ $item['model'] }}</td>
                        <td>{{ number_format($item['price'], 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>

</body>
</html>
