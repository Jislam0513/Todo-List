<div>
    <form class="form1" action='index.php' method="get">
        <input type="hidden" name="action" value="checkLogin">
        <h1> LOGIN</h1>
        Username:
        <input type = "username" name = "username" required autocomplete="off"><br>
        Password:
        <input type = "password" name = "password" required autocomplete="off"><br>

        <a href="?action=signup" style="color:rosybrown">CLICK ME TO SIGN UP</a>
        <input type="submit" value="Login">
    </form>
</div>