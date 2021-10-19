<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/login.css">
    <title>Midterm Exam</title>
  </head>
  <body>
<div class="login_body">
    <div class="login">
        
        <form action="./backend/loginController.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required><br><br>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required><br><br>
            <input type="submit" name="submit" value="Submit">
        </form>
    </div>
</div>


  </body>
</html>