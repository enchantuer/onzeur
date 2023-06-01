<html>
<head>
  <title>Sign Up</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="style.css"/>
</head>
<body>

<div class="form">
<h1>Login</h1>
<p>Don't have an account? <a href='signup.php'>SIGN UP</a></p>

<form name="login" action="" method="post">
  <label for="email">Email:</label>
  <input type="email" name="email" placeholder="Email" required/>
  <label for="password">Password:</label>
  <input type="password" name="password" placeholder="Password" required/>
  <input class="button" type="submit" name="submit" value="Login"/>
</form>

</div>

<!-- switch mode light/dark button -->
<div class="toggle">
    <input type="checkbox" id="toggle_theme"/>
    <label for="toggle"></label>
</div>

<script>
function myFunction() {
   var element = document.body;
   element.classList.toggle("dark-mode");
}






const toggle=document.getElementById('toggle_theme');
const body=document.body;

toggle.addEventListener('input', e => {
    const checked = e.target.checked;

    if(checked){
      body.classList.add('dark');
    }else{
      body.classList.remove('dark');
    }
});









</script>







<div class="checkbox-wrapper-10">
  <input class="tgl tgl-flip" id="cb5" type="checkbox" checked />
  <label class="tgl-btn" data-tg-off="Nope" data-tg-on="Yeah!" for="cb5"></label>
</div>

<style>
  .checkbox-wrapper-10 .tgl {
    display: none;
  }
  .checkbox-wrapper-10 .tgl,
  .checkbox-wrapper-10 .tgl:after,
  .checkbox-wrapper-10 .tgl:before,
  .checkbox-wrapper-10 .tgl *,
  .checkbox-wrapper-10 .tgl *:after,
  .checkbox-wrapper-10 .tgl *:before,
  .checkbox-wrapper-10 .tgl + .tgl-btn {
    box-sizing: border-box;
  }
  .checkbox-wrapper-10 .tgl::-moz-selection,
  .checkbox-wrapper-10 .tgl:after::-moz-selection,
  .checkbox-wrapper-10 .tgl:before::-moz-selection,
  .checkbox-wrapper-10 .tgl *::-moz-selection,
  .checkbox-wrapper-10 .tgl *:after::-moz-selection,
  .checkbox-wrapper-10 .tgl *:before::-moz-selection,
  .checkbox-wrapper-10 .tgl + .tgl-btn::-moz-selection,
  .checkbox-wrapper-10 .tgl::selection,
  .checkbox-wrapper-10 .tgl:after::selection,
  .checkbox-wrapper-10 .tgl:before::selection,
  .checkbox-wrapper-10 .tgl *::selection,
  .checkbox-wrapper-10 .tgl *:after::selection,
  .checkbox-wrapper-10 .tgl *:before::selection,
  .checkbox-wrapper-10 .tgl + .tgl-btn::selection {
    background: none;
  }
  .checkbox-wrapper-10 .tgl + .tgl-btn {
    outline: 0;
    display: block;
    width: 4em;
    height: 2em;
    position: relative;
    cursor: pointer;
    -webkit-user-select: none;
       -moz-user-select: none;
        -ms-user-select: none;
            user-select: none;
  }
  .checkbox-wrapper-10 .tgl + .tgl-btn:after,
  .checkbox-wrapper-10 .tgl + .tgl-btn:before {
    position: relative;
    display: block;
    content: "";
    width: 50%;
    height: 100%;
  }
  .checkbox-wrapper-10 .tgl + .tgl-btn:after {
    left: 0;
  }
  .checkbox-wrapper-10 .tgl + .tgl-btn:before {
    display: none;
  }
  .checkbox-wrapper-10 .tgl:checked + .tgl-btn:after {
    left: 50%;
  }

  .checkbox-wrapper-10 .tgl-flip + .tgl-btn {
    padding: 2px;
    transition: all 0.2s ease;
    font-family: sans-serif;
    perspective: 100px;
  }
  .checkbox-wrapper-10 .tgl-flip + .tgl-btn:after,
  .checkbox-wrapper-10 .tgl-flip + .tgl-btn:before {
    display: inline-block;
    transition: all 0.4s ease;
    width: 100%;
    text-align: center;
    position: absolute;
    line-height: 2em;
    font-weight: bold;
    color: #fff;
    position: absolute;
    top: 0;
    left: 0;
    -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
    border-radius: 4px;
  }
  .checkbox-wrapper-10 .tgl-flip + .tgl-btn:after {
    content: attr(data-tg-on);
    background: #02C66F;
    transform: rotateY(-180deg);
  }
  .checkbox-wrapper-10 .tgl-flip + .tgl-btn:before {
    background: #FF3A19;
    content: attr(data-tg-off);
  }
  .checkbox-wrapper-10 .tgl-flip + .tgl-btn:active:before {
    transform: rotateY(-20deg);
  }
  .checkbox-wrapper-10 .tgl-flip:checked + .tgl-btn:before {
    transform: rotateY(180deg);
  }
  .checkbox-wrapper-10 .tgl-flip:checked + .tgl-btn:after {
    transform: rotateY(0);
    left: 0;
    background: #7FC6A6;
  }
  .checkbox-wrapper-10 .tgl-flip:checked + .tgl-btn:active:after {
    transform: rotateY(20deg);
  }
</style>







</body>
</html>