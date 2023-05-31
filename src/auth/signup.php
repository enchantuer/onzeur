<html>
<head>
  <title>Sign Up</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="style.css"/>
</head>
<body>

<div class="form">
<h1>Sign up</h1>
<p>Already have an account? <a href='login.php'>LOG IN</a></p>
<form name="registration" action="" method="post">
  <label for="firstname">First Name:</label>
  <input type="text" name="firstname" placeholder="First Name" required/>
  <label for="lastname">Last Name:</label>
  <input type="text" name="lastname" placeholder="Last Name" required/>
  <label for="birthdate">Birthdate:</label>
  <input type="date" name="birthdate" placeholder="Birthdate" required/>
  <label for="email">Email:</label>
  <input type="email" name="email" placeholder="Email" required/>
  <label for="password">Password:</label>
  <input type="password" name="password" placeholder="Password" required/>
  <label for="password2">Password Verification:</label>
  <input type="password" name="password2" placeholder="Password Verification" required/>
  <input class="button" type="submit" name="submit" value="Sign Up"/>

</form>

</div>

</body>
</html>