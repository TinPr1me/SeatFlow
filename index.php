<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SeatFlow | Login</title>
    <link rel="stylesheet" href="style.css" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <header>
        <nav class="navbar">
            <a href="#" class="logo">SeatFlow<span>.</span></a>
            <ul class="menu-links">
                <li><a href="#">test</a></li>
            </ul>            
        </nav>
    </header>
    <div class="wrapper">
        <form action="" method="post">
        <?php
  
            // Database connection
            $con = mysqli_connect("localhost","root","","studentdb") or die("Couldn't connect");
  
             // Check if form is submitted
            if(isset($_POST['submit'])){
  
            // Retrieve form data
            $idnum = mysqli_real_escape_string($con, $_POST['idnum']);
            $password = mysqli_real_escape_string($con, $_POST['password']);
  
             // Query the database
            $result = mysqli_query($con, "SELECT * FROM student WHERE idnum = '$idnum' AND password = '$password'") or die("Failed to query database".mysqli_error($con));
  
            // Check if user exists
            $count = mysqli_num_rows($result);
            if($count ==  1){
                // User exists, start a new session and redirect to the dashboard
                session_start();
                $_SESSION['idnum'] = $idnum;
                header("Location: dashboard.php");

            } else {
                // Display an error message
                echo "<div class='message'>
                <p>Wrong ID Number or Password</p>
                 </div> <br>";

            }
        }
        ?>
                <h1>LOGIN</h1>
                <div class="input-box">
                    <label for="idnum">ID Number</label>
                    <input type="text" name="idnum" id="idnum" autocomplete="off" required>
                </div>

                <div class="input-box">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" required>
                </div>

                <div class="field">
                    
                    <input type="submit" class="btn" name="submit" value="Login" required>
                </div>
                <div class="links">
                    Don't have account? <a href="register.php">Sign Up Now</a>
                </div>

        </form>
    </div>
</body>
</html>