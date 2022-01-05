<form class="form1" action='index.php' method="get">
    <input type="hidden" name="action" value="createAccount">
    <h1> SIGN UP</h1>
    First name:
    <input type="text" name="firstname" required><br>
    Last name:
    <input type="text" name="lastname" required><br>
    Email:
    <input type = "email" name = "email" required><br>
    Username:
    <input type = "username" name = "username" required><br>
    Password:
    <input type = "password" name = "password" required><br>
    <p style="color:lightblue;">Password must contain: <br> Length: 8-30<br> 1 uppercase<br> 1 lowercase<br> 1 number <br></p>
    <a href="?action=login" style="color:rosybrown">CLICK ME TO LOGIN</a>
    <input type="submit" value="Submit">

</form>
<div id="errorHandler"></div>