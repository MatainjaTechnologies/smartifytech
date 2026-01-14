<!DOCTYPE html>
<html>
<head>
    <title>Registration Details</title>
    <style>
        body { font-family: sans-serif; }
        .container { width: 100%; margin: 0 auto; padding: 20px; }
        h1 { text-align: center; color: #333; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Registration Details</h1>
        <table>
            @foreach($registration->toArray() as $key => $value)
                @if($key !== 'password')
                <tr>
                    <th>{{ ucfirst(str_replace('_', ' ', $key)) }}</th>
                    <td>{{ is_bool($value) ? ($value ? 'Yes' : 'No') : $value }}</td>
                </tr>
                @endif
            @endforeach
        </table>
    </div>
</body>
</html>
