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

  <!-- <label>First Name:</label>
  <input type="text" name="firstname" placeholder="First Name" required />
  <label>Last Name:</label>
  <input type="text" name="lastname" placeholder="Last Name" required /> -->
  <input type="text" name="age" placeholder="Age" required />
  <input type="email" name="email" placeholder="Email" required />
  <input type="password" name="password" placeholder="Password" required />
  <input type="password" name="password2" placeholder="Password Verification" required />
  <input type="submit" name="submit" value="Register" />
</form>

<p>Already registered? <a href='login.php'>Login Here</a></p>

</div>

</body>
</html>