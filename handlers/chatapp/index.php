<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chatapp | Login - Signup</title>
    <link type="text/css" rel="stylesheet" href="style.css" />
</head>

<body>

    <div class="container">

    <div><h1>Chatapp.io</h1></div>

    <div>
        <div class="login">
            <form method="POST" action="handlers/userLogin.php">
                <h2>Login</h2>

                <table>
                    <tr>
                        <td><input type="email" name="usermaillogin" placeholder="Email" required autocomplete="new" /></td>
                    </tr>
                    <tr>
                        <td><input type="password" name="userpasswordlogin" placeholder="Password" required autocomplete="new-password" /></td>
                    </tr>
                    <tr>
                        <td><input type="submit" value="Login" /></td>
                    </tr>
                    <?php if(isset($_GET['error'])){ ?>
                    <tr><td><span style="color: red;">Check your Email Or Password</span></td></tr>
                    <?php } ?>
                </table>
            </form>
        </div>

        <div class="signup">
            <form action="handlers/userSigned.php" method="POST">
                <h2>Sign Up</h2>
                <table>
                    <tr>
                        <td><input type="text" name="username" placeholder="Name"  required autocomplete="new"></td>
                    </tr>
                    <tr>
                        <td><input type="email" name="usermail" placeholder="Email"  equired autocomplete="new"></td>
                    </tr>
                    <tr>
                        <td><input type="password" name="userpassword" placeholder="Password" required autocomplete="new-password"></td>
                    </tr>
                    <tr>
                        <td><input type="submit" value="Sign Up"></td>
                    </tr>
                    <?php if(isset($_GET['success'])){ ?>
                    <tr> <td><span style="color: green;">User Registered</span></td></tr>
                    <?php } ?>
                </table>
            </form>
        </div>

    </div>
    <!-- forms -->
    </div>
    <!--/container -->
</body>

</html>