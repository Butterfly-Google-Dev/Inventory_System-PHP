<!DOCTYPE html>
<html>
<head>
    <title>Item Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .form-container {
            border: 1px solid #e0e0e0;
            padding: 20px;
            width: 50%;
            margin: 20px auto;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.2s;
            background: #fff;
        }
        .form-header {
            text-align: center;
            font-size: 2rem;
            color: #0074d9;
            margin-bottom: 20px;
            text-transform: uppercase;
        }
        .form-label {
            display: block;
            margin-bottom: 10px;
            font-size: 1.4rem;
            color: #333;
            font-family: Arial, sans-serif;
        }
        .form-input {
            width: calc(100% - 24px);
            padding: 12px;
            font-size: 1.2rem;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 20px;
            transition: border 0.2s;
            font-family: Arial, sans-serif;
        }
        .form-button {
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

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.6);
            z-index: 1;
        }
        .modal-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            padding: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <?php
    $message = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $itemName = $_POST["item_name"];
        $itemUnit = $_POST["item_unit"];
        $itemPrice = $_POST["item_price"];
        
      
        if (!empty($itemName) && $itemUnit > 0 && $itemPrice > 0) {
       
            session_start();

    
            $_SESSION['items'][] = [
                'name' => $itemName,
                'unit' => $itemUnit,
                'price' => $itemPrice
            ];

            $message = "Item submitted successfully.";
        } else {
            $message = "Please fill out all fields correctly.";
        }
    }
    ?>
    <div class="form-container">
        <h2 class="form-header">Enter Item Details</h2>
        <form method="post" action="">
            <label class="form-label">Item Name:
                <input type="text" name="item_name" required class="form-input">
            </label>
            <label class "form-label">Item Unit:
                <input type="number" name="item_unit" required class="form-input">
            </label>
            <label class="form-label">Item Price per Unit (₹):
                <input type="number" name="item_price" required class="form-input">
            </label>
            <button type="submit" class="form-button">Save</button>
        </form>
    </div>

  
    <div id="modal" class="modal">
        <div class="modal-content">
            <p><?php echo $message; ?></p>
            <button class="form-button" id="ok-button">OK</button>
            <button class="form-button" id="add-more-button">Add More</button>
        </div>
    </div>

    <script>
        const modal = document.getElementById("modal");
        const okButton = document.getElementById("ok-button");
        const addMoreButton = document.getElementById("add-more-button");

        okButton.addEventListener("click", function() {
            modal.style.display = "none";
            window.location.href = "index.php";
        });

        addMoreButton.addEventListener("click", function() {
            modal.style.display = "none";
        });

  
        if ("<?php echo $message; ?>" !== "") {
            modal.style.display = "block";
        }
    </script>
</body>
</html>
