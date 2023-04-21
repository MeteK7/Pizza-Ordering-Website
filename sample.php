<!DOCTYPE html>
<html>
  <head>
    <title>Admin Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container mt-4">
        <h2>Calculate Sales</h2>
        <form method="post">
            <div class="form-group">
                <label for="start-date">Start Date:</label>
                <input type="date" class="form-control" id="start-date" name="start-date" required>
            </div>
            <div class="form-group">
                <label for="end-date">End Date:</label>
                <input type="date" class="form-control" id="end-date" name="end-date" required>
            </div>
            <button type="submit" class="btn btn-primary">Calculate</button>
        </form>

        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Include calculation code
                include('bll/calculate-total-sale.php');

                // Retrieve and display results
                echo "<h3>Total Sale: $" . number_format($total_sale, 2) . "</h3>";
                echo "<h3>Gross Profit: $" . number_format($gross_profit, 2) . "</h3>";
                echo "<h3>Net Income: $" . number_format($net_income, 2) . "</h3>";
            }
        ?>
    </div>
</body>
</html>