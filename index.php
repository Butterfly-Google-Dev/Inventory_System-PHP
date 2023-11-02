<!DOCTYPE html>
<html>
<head>
    <title>Inventory System</title>
    <style>
        body {
            background-color: #F0F0F0;
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 0;
            padding: 0;
            animation: fadeIn 1s;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        header {
            background-color: beige;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        header img {
            max-width: 120px;
            margin: 0;
            background-color: transparent; 
        }

        p {
            font-size: 1.5rem;
            margin-top: 20px;
            animation: slideIn 1s;
        }

        @keyframes slideIn {
            from {
                transform: translateY(-20px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .link-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
            animation: slideIn 1s;
        }

        .link-button {
            text-decoration: none;
            background: #0097e6;
            color: white;
            padding: 12px 20px;
            border: none;
            cursor: pointer;
            font-size: 1.2rem;
            margin: 0 10px;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .link-button:hover {
            background: #005AA7;
        }
    </style>
</head>
<body>
    <header>
        <img src="logo.png" alt="Logo">
    </header>

    <p>Welcome to the Inventory System</p>

    <div class="link-container">
        <a href="ItemForm.php" class="link-button">Item Form</a>
        <a href="ItemList.php" class="link-button">Item List</a>
    </div>
</body>
</html>
