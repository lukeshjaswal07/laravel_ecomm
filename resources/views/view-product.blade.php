<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Product</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            padding: 20px;
            margin: 0;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background: #fff;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        .info-box {
            margin-bottom: 15px;
        }
        .label {
            font-weight: bold;
            color: #444;
        }
        .value {
            margin-left: 5px;
            color: #333;
        }
        .btn-back {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 18px;
            background: #4a90e2;
            color: white;
            border-radius: 6px;
            text-decoration: none;
        }
        .btn-back:hover {
            background: #3a7ac7;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Product Details</h2>

    <div class="info-box">
        <span class="label">Product ID:</span>
        <span class="value">{{ $product->id }}</span>
    </div>

    <div class="info-box">
        <span class="label">Name:</span>
        <span class="value">{{ $product->name }}</span>
    </div>

    <div class="info-box">
        <span class="label">Price:</span>
        <span class="value">₹{{ number_format($product->price, 2) }}</span>
    </div>

    <div class="info-box">
        <span class="label">Stock:</span>
        <span class="value">{{ $product->stock }}</span>
    </div>

    <div class="info-box">
        <span class="label">Description:</span>
        <p class="value">{{ $product->description }}</p>
    </div>

    <a href="/dashboard" class="btn-back">← Back to Products</a>
</div>

</body>
</html>
