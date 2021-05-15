<!DOCTYPE html>
<html lang="en">
<head>
  <title>Ec2-Rds Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h1> PHP Example Version - <?php echo phpversion(); ?></h1>
    <?php
    $servername = "maridb.c4aqiudsec7a.ap-south-1.rds.amazonaws.com:3306";
    $username = "admin";
    $password = "admin123456";
    $dbname = "masud";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    ?>

    <?php
      // Insert Into DB when form is submitted
    if (isset($_POST['name']) && isset($_POST['email'])) {
        $recieveName = $_POST['name'];
        $recieveEmail = $_POST['email'];
        $sql = "INSERT INTO users (name, email) VALUES ('" . $recieveName . "', '" .$recieveEmail . "')";
        mysqli_query($conn, $sql);
    }
    ?>


    <table class="table" class="userList">
        <thead>
          <tr>
            <th>Name</th>
            <th>Email Address</th>

          </tr>
        </thead>
        <tbody>
        <?php
        // retrieve data from DB
         $sql = "SELECT * FROM users";
         $result =  mysqli_query($conn, $sql);

         while($row = mysqli_fetch_array($result)) {
	
             ?>

             <tr>
                 <td><?php echo $row['name'];?></td>
                <td><?php echo $row['email'];?></td>
             </tr>
         <?php } ?>

        </tbody>
  </table>




  <div style="margin-top: 30px; border: 1px solid #cccccc; padding: 10px">
      <div style="padding: 5px; font-weight: bold">Form Submit & DB Insert Example:</div>
    <form action="" method="post">
        <div class="form-group">
            <label for="email">Name</label>
            <input type="text" class="form-control" name="name">
        </div>
        <div class="form-group">
            <label for="pwd">Email</label>
            <input type="text" class="form-control" name="email">
        </div>

        <button type="submit" class="btn btn-default">Submit</button>
    </form>
  </div>

</div>

</body>
</html>
