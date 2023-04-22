<!DOCTYPE html>
<html>
<head>
    <title>Admin Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container mt-4">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h2 class="mb-0">Calculate Sales</h2>
            </div>
            <div class="card-body">
                <form method="post">
                    <div class="form-group row">
                        <!-- The for attribute is used in labels. It refers to the id of the element this label is associated with. When the user clicks with the mouse on the start-date text, the browser will automatically put the focus in the corresponding input field. -->
                        <label for="start-date" class="col-sm-2 col-form-label">Start Date:</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="start-date" name="start-date" required value="<?php echo isset($_POST['start-date']) ? $_POST['start-date'] : ''; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="end-date" class="col-sm-2 col-form-label">End Date:</label>
                        <div class="col-sm-10">
                            <!-- <input type="date" class="form-control" id="end-date" name="end-date" required> -->
                            <input type="date" class="form-control" id="end-date" name="end-date" required value="<?php echo isset($_POST['end-date']) ? $_POST['end-date'] : ''; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12 text-center">
                            <button type="submit" class="btn btn-primary">Calculate</button>
                        </div>
                    </div>
                </form>
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                  // Include calculation code
                  include('bll/calculate-total-sale.php');

                  // Retrieve and display results
                  include('partial-pages/total-sale.php');
              }
              ?>
          </div>
      </div>
  </div>
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <!-- Bootstrap JS -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>