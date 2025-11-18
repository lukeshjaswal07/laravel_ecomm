<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            padding: 20px;
            margin: 0;
        }
        .container {
            max-width: 1000px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        thead {
            background: #4a90e2;
            color: #fff;
        }
        th, td {
            padding: 12px 15px;
            text-align: left;
        }
        tr:nth-child(even) {
            background: #f2f2f2;
        }
        tr:hover {
            background: #e8f0fe;
            transition: 0.3s;
        }
        .btn {
            padding: 6px 12px;
            border-radius: 6px;
            border: none;
            cursor: pointer;
            font-size: 14px;
        }
        .btn-edit {
            background: #28a745;
            color: white;
        }
        .btn-delete {
            background: #dc3545;
            color: white;
        }
        @media(max-width: 768px) {
            table, thead, tbody, th, td, tr {
                display: block;
            }
            thead {
                display: none;
            }
            tr {
                margin-bottom: 15px;
                border: 1px solid #ddd;
                padding: 10px;
                border-radius: 8px;
                background: #fff;
            }
            td {
                display: flex;
                justify-content: space-between;
                padding: 10px;
                border-bottom: 1px solid #eee;
            }
            td:last-child {
                border-bottom: none;
            }
            td::before {
                content: attr(data-label);
                font-weight: bold;
                color: #333;
            }
        }
    </style>
</head>
<body>
    <nav style="background:#4a90e2; padding:15px; display:flex; justify-content:space-between; align-items:center; color:white; border-radius:8px; margin-bottom:20px;">
    <form action="{{ url('/logout') }}" method="POST" style="float:right;">
        @csrf
        <button type="submit" style="background:#dc3545; color:white; padding:8px 15px; border:none; border-radius:6px; cursor:pointer; font-size:14px;">Logout</button>
    </form>
</nav>

<div class="container">
    <h2>Products List</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $product)
            <tr>
                <td data-label="ID">{{ $product->id }}</td>
                <td data-label="Name">{{ $product->name }}</td>
                <td data-label="Price">₹{{ number_format($product->price, 2) }}</td>
                <td data-label="Stock">{{ $product->stock }}</td>
                <td data-label="Actions">
                    <a href="{{ url('/view-product', $product->id) }}" class="btn btn-edit">View Product</a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" style="text-align:center; padding:20px; font-weight:bold; color:#555;">No products available</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <div style="margin-top:20px; text-align:center;">
    {{ $products->links('pagination::simple-default') }}
</div>
</div>
</body>
</html>
