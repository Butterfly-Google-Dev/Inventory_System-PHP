<!DOCTYPE html>
<html>
<head>
    <title>Invoice Summary</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .invoice-container {
            border: 1px solid #e0e0e0;
            padding: 20px;
            width: 80%;
            margin: 20px auto;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            border-radius: 8px;
            background-color: white;
        }
        .invoice-header {
            text-align: center;
            font-size: 1.8rem;
            color: #0074d9;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 40px;
            margin-bottom: 60px;
        }
        th {
            background: #0074d9;
            color: white;
            padding: 15px;
            text-align: left;
        }
        td {
            padding: 15px;
            border: 1px solid #e0e0e0;
            text-align: left;
        }
        .total-price {
            margin-top: 20px;
            font-weight: bold;
            font-size: 1.2rem;
            color: #0074d9;
        }
        .print-button {
            background: #0074d9;
            color: white;
            padding: 12px 24px;
            border: none;
            cursor: pointer;
            font-size: 1.4rem;
            transition: background 0.2s;
            font-family: Arial, sans-serif;
            border-radius: 6px;
        }
    </style>
</head>
<body>
    <div class="invoice-container">
        <h2 class="invoice-header">Invoice Summary</h2>
        <table>
            <thead>
                <tr>
                    <th>Item Name</th>
                    <th>Quantity</th>
                    <th>Price per Unit (₹)</th>
                    <th>Item Total (₹)</th>
                </tr>
            </thead>
            <tbody>
                <?php
   
                session_start();

      
                $items = isset($_SESSION['items']) ? $_SESSION['items'] : [];

        
                foreach ($items as $item) {
                    $itemTotal = $item['unit'] * $item['price'];
                    echo '<tr>';
                    echo '<td>' . $item['name'] . '</td>';
                    echo '<td>' . $item['unit'] . '</td>';
                    echo '<td>₹' . number_format($item['price'], 2) . '</td>';
                    echo '<td>₹' . number_format($itemTotal, 2) . '</td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
        <?php
      
        $overallTotal = 0;
        foreach ($items as $item) {
            $overallTotal += $item['unit'] * $item['price'];
        }
        echo '<h3 class="total-price">Overall Total Price: ₹' . number_format($overallTotal, 2) . '</h3>';
        ?>


        <button class="print-button" onclick="printInvoice()">Print Invoice</button>
    </div>

    <script>
        function printInvoice() {
   
            window.print();
        }
    </script>
</body>
</html>
