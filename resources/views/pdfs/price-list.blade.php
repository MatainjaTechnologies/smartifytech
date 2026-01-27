<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: DejaVu Sans;
            font-size: 12px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #000;
            padding: 6px;
        }
        .header {
            text-align: center;
            margin-bottom: 15px;
        }
        .header-logo {
            height: 60px;
        }
    </style>
</head>
<body>

    <!-- Logo -->
    <div class="header">
        <img src="{{ public_path('images/logo.png') }}" alt="Smartify Tech Logo" class="header-logo">
    </div>

    <h2>Price List</h2>
    <p>Date: {{ $date }}</p>

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
                    <td>{{ $item['price'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
