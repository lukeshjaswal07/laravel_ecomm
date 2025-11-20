<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            padding: 20px;
            margin: 0;
        }
        .container {
            max-width: 900px;
            margin: auto;
            background: #fff;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 25px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        thead {
            background: #4a90e2;
            color: white;
        }
        th, td {
            padding: 12px 15px;
            border-bottom: 1px solid #eee;
        }
        tr:nth-child(even) {
            background: #f9f9f9;
        }
        .btn-back {
            display: inline-block;
            margin-bottom: 20px;
            padding: 10px 15px;
            background: #4a90e2;
            color: white;
            border-radius: 6px;
            text-decoration: none;
        }
        .total-box {
            margin-top: 20px;
            text-align: right;
            font-size: 18px;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="container">
    
    <a href="/dashboard" class="btn-back">← Back to Products</a>

    <h2>Your Cart</h2>

    @if($cartItems->isEmpty())
        <p style="text-align:center; font-size:18px; font-weight:bold; color:#555;">
            Your cart is empty.
        </p>
    @else
        <table>
            <thead>
                <tr>
                    <th>Sr No</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody>
                @php 
                    $total = 0; 
                    $srno = 1; 
                @endphp

                @foreach($cartItems as $item)
                    @php
                        $total += $item->product->price * $item->quantity; 
                    @endphp

                    <tr>
                        <td>{{ $srno++ }}</td>
                        <td>{{ $item->product->name }}</td>
                        <td>₹{{ number_format($item->product->price, 2) }}</td>
                        <td>{{ $item->quantity }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="total-box">
            Total: ₹{{ number_format($total, 2) }}
        </div>
    @endif
</div>

</body>
</html>
