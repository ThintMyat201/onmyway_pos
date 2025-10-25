<?php
use Barryvdh\DomPDF\Facade\Pdf;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Sales Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .info {
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f5f5f5;
        }
        .total {
            text-align: right;
            margin-top: 20px;
            font-weight: bold;
        }
        .footer {
            margin-top: 40px;
            text-align: center;
            font-size: 12px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>Sales Report</h2>
    </div>

    <div class="info">
        <p><strong>Session Information:</strong></p>
        <p>Opened: {{ $session->opened_at->format('Y-m-d H:i:s') }}</p>
        <p>Closed: {{ $session->closed_at->format('Y-m-d H:i:s') }}</p>
        <p>Duration: {{ $session->opened_at->diffForHumans($session->closed_at) }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Price (MMK)</th>
                <th>Quantity</th>
                <th>Total (MMK)</th>
            </tr>
        </thead>
        <tbody>
            @foreach($session->sales as $sale)
            <tr>
                <td>{{ $sale->product->name ?? '-' }}</td>
                <td>{{ number_format($sale->product->price ?? 0, 2) }}</td>
                <td>{{ $sale->quantity }}</td>
                <td>{{ number_format($sale->total, 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="total">
        <p>Total Items Sold: {{ $totalItems }}</p>
        <p>Total Sales: {{ number_format($totalSales, 2) }} MMK</p>
    </div>

    <div class="footer">
        <p>Generated on {{ now()->format('Y-m-d H:i:s') }}</p>
    </div>
</body>
</html>
