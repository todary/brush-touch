<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
            text-align: center;
        }
        p {
            line-height: 1.6;
            color: #555;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .total-price {
            font-weight: bold;
            font-size: 1.2em;
            color: #28a745;
            margin-top: 20px;
            text-align: right;
        }
        .order-status {
            font-weight: bold;
            color: #007bff;
        }
        .footer {
            margin-top: 20px;
            text-align: center;
            color: #777;
            font-size: 0.9em;
        }
        .logo {
            display: block;
            margin: 0 auto 20px auto; /* Center the logo and add bottom margin */
            max-width: 150px; /* Set a max width for the logo */
        }
    </style>
</head>
<body>
<div class="container">
    <img src="{{ asset('storage/logo.png') }}" alt="Company Logo" class="logo" style="width: 100px; height: 150px">
    <h1>Order Details</h1>
    <p>Dear {{ $order->user->name }},</p>
    <p>Thank you for your order! Here are the details:</p>

    <table>
        <thead>
        <tr>
            <th>Service Name</th>
            <th>Hours</th>
            <th>Total Price</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($order->order_services as $orderService)
            <tr>
                <td>{{ $orderService->service->name }}</td>
                <td>{{ $orderService->hours }} hours</td>
                <td>${{ $orderService->total_price }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <p class="total-price">Total Price: ${{ $order->total_price }}</p>
    <p>Order Status: <span class="order-status">{{ $order->order_status }}</span></p>
    <div class="footer">
        <p>Thank you for choosing our services!</p>
    </div>
</div>
</body>
</html>
