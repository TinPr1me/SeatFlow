<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SeatFlow | Register</title>
    <link rel="stylesheet" href="style.css" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <header>
        <nav class="navbar">
            <a href="#" class="logo">SeatFlow<span>.</span></a>           
        </nav>
    </header>

    <div class="wrapper">
        <div class="box form-box">

        <?php 
         
         include("config.php");
         if(isset($_POST['submit'])){
            $idnum = $_POST['idnum'];
            $firstname = $_POST['firstname'];
            $middlename = $_POST['middlename'];
            $lastname = $_POST['lastname'];
            $age = $_POST['age'];
            $gender = $_POST['gender'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $password = $_POST['password'];

         //verifying the unique email

         $verify_query = mysqli_query($con,"SELECT email FROM student    WHERE email ='$email'");

         if(mysqli_num_rows($verify_query) !=0 ){
            echo "<div class='message'>
                      <p>This email is used, Please try another One</p>
                  </div> <br>";
            echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
         }
         else{

            mysqli_query($con,"INSERT INTO student (idnum,firstname,middlename,lastname, age, gender, email, address, password)
                VALUES('$idnum','$firstname','$middlename','$lastname', '$age', '$gender', '$email', '$address', '$password')") or die("Erroe Occured");

            echo "<div class='message'>
                      <p>Registration successfully!</p>
                  </div> <br>";
            echo "<a href='index.php'><button class='btn'>Login Now</button>";
         

         }

         }else{
         
        ?>
            <h1>Sign Up</h1>
            <form action="" method="post">

                <div class="input-box">
                    <label for="idnum">ID Number</label>
                    <input type="idnum" name="idnum" id="idnum" autocomplete="off" required>
                </div>

                <div class="input-box">
                    <label for="firstname">First Name</label>
                    <input type="firstname" name="firstname" id="firstname" autocomplete="off" required>
                </div>

                <div class="input-box">
                    <label for="middlename">Middle Name</label>
                    <input type="middlename" name="middlename" id="middlename" autocomplete="off">
                </div>

                <div class="input-box">
                    <label for="lastname">Last Name</label>
                    <input type="lastname" name="lastname" id="lastname" autocomplete="off" required>
                </div>

                <div class="input-box">
                    <label for="agee">Age</label>
                    <input type="age" name="age" id="age" autocomplete="off" required>
                </div>

                <div class="input-box">
                    <label for="gender">Gender</label>
                    <input type="gender" name="gender" id="gender" autocomplete="off" required>
                </div>

                <div class="input-box">
                    <label for="email">E-Mail</label>
                    <input type="email" name="email" id="email" autocomplete="off" required>
                </div>

                <div class="input-box">
                    <label for="address">Address</label>
                    <input type="address" name="address" id="address" autocomplete="off" required>
                </div>

                <div class="input-box">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" required>
                </div>

                <div class="field">                   
                    <input type="submit" class="btn" name="submit" value="Register" required>
                </div>

                <div class="links">
                    Already a member? <a href="index.php">Sign In</a>
                </div>
            </form>
        </div>
        <?php } ?>
      </div>

</body>
</html>