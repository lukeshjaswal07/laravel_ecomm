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
        .qty-btn {
        width: 28px;
        height: 28px;
        border: none;
        background: #4a90e2;
        color: white;
        border-radius: 5px;
        cursor: pointer;
        font-size: 18px;
    }
    .qty-btn:hover { background: #3579c6; }
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
                    <th>Remove</th>
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
                        <td>
                            <div style="display:flex; align-items:center;">
                                <button class="qty-btn" data-id="{{ $item->id }}" data-type="decrease">−</button>

                                <span id="qty-{{ $item->id }}" style="padding: 0 10px;">
                                    {{ $item->quantity }}
                                </span>

                                <button class="qty-btn" data-id="{{ $item->id }}" data-type="increase">+</button>
                            </div>
                        </td>
                        <td>
                            <a href="{{ url('remove-item/'.$item->id) }}" 
                            style="color:red; font-weight:bold;">
                            X
                            </a>
                        </td>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).on('click', '.qty-btn', function() {

    let cartId = $(this).data('id');

    let type = $(this).data('type');

    $.ajax({

        url: "/cart/update",
    
        method: "POST",
    
        data: {
    
            _token: "{{ csrf_token() }}",
    
            id: cartId,
    
            action: type
    
        },
    
        success: function(res) {

            $("#qty-" + cartId).text(res.quantity);


            $(".total-box").text("Total: ₹" + res.total.toFixed(2));
        }
    });

});
</script>

</html>
