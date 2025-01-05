<?php
session_start();
include "connection.php";

// Funcția pentru a curăța și valida datele introduse
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Procesare înregistrare
$numeErr = $emailErr = $passErr = "";
$name = $email = $password = "";
$err = 0; // Adăugăm o variabilă pentru a urmări dacă există erori

// Verifică dacă formularul de înregistrare a fost trimis
if (isset($_POST["signup"])) {
    // Validare nume
    if (empty($_POST["name"])) {
        $numeErr = "Name is required";
        $err = 1;
    } else {
        $name = test_input($_POST["name"]);
        // Verifică dacă numele conține doar litere și spații
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            $numeErr = "Only letters and white space allowed";
            $err = 1;
        }
    }

    // Validare email
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
        $err = 1;
    } else {
        $email = test_input($_POST["email"]);
        // Verifică formatul email-ului
        $pattern = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";
        if (!preg_match($pattern, $email)) {
            $emailErr = "Invalid email format";
            $err = 1;
        }
    }

    // Validare parolă
    if (empty($_POST["pass"])) {
        $passErr = "Password is required";
        $err = 1;
    } else {
        $password = password_hash($_POST['pass'], PASSWORD_DEFAULT); // Hash parola
    }

    // Dacă nu există erori de validare, adaugă utilizatorul în baza de date
    if ($err == 0) {
        // Generare remember_token
        $remember_token = bin2hex(random_bytes(32));

        // Specificarea valorii pentru 'role'
        $role = 'user';

        $sql = "INSERT INTO users (username, email, password, remember_token, role) VALUES ('$name', '$email', '$password', '$remember_token', '$role')";

        if ($con->query($sql) === TRUE) {
            // Redirecționează către pagina index.php după înregistrare
            header("Location: index.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }
    }
}
// Procesare autentificare
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["signin"])) {
    // Validare nume
    if (empty($_POST["your_name"])) {
        $numeErr = "Name is required";
        $err = 1;
    } else {
        $nume = test_input($_POST["your_name"]);
        // Verifică dacă numele conține doar litere și spații
        if (!preg_match("/^[a-zA-Z ]*$/", $nume)) {  
            $numeErr = "Only alphabets and white space are allowed"; 
            $err = 1;
        }
    }

    // Validare parolă
    if (empty($_POST["your_pass"])) {
        $passErr = "Password is required";
        $err = 1;
    } else {
        $password = $_POST['your_pass'];
    }

    // Dacă nu există erori de validare, procesează datele de autentificare
    if ($err == 0) {
        // Procesare date de autentificare
        $username = $_POST["your_name"];
        $password = $_POST["your_pass"];

        $sql = "SELECT * FROM users WHERE username='$username'";
        $result = $con->query($sql);

        if ($result) {
            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
                if (password_verify($password, $row['password'])) {
                    // Autentificare reușită
                    $_SESSION['username'] = $username;

                    // Dacă opțiunea "Remember me" este bifată, generează și salvează un token
                    if (isset($_POST['remember-me'])) {
                        $token = bin2hex(random_bytes(32)); // Generare token
                        $sql = "UPDATE users SET remember_token='$token' WHERE username='$username'";
                        $con->query($sql);

                        // Setează un cookie cu token-ul pe o perioadă lungă de timp 
                        setcookie('remember_token', $token, time() + (30 * 24 * 60 * 60), '/');
                    }

                    // Redirecționează către pagina protejată pentru admini sau pagina principală
                    if ($row['role'] == 'admin') {
                        header("Location: admin.php");
                    } else {
                        header("Location: index.php");
                    }
                    exit();
                } else {
                    echo "Autentificare eșuată. Nume de utilizator sau parolă incorectă.";
                }
            } else {
                echo "Autentificare eșuată. Nume de utilizator sau parolă incorectă.";
            }
        } else {
            echo "Conexiunea la baza de date a eșuat.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up / Log In Form</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/styleLogin.css">
    <script>
        function anti_right() {
            alert('Right Click not authorized!');
            return false;
        }
        document.oncontextmenu = anti_right;
        function disabletextselect(i) {
            return false;
        }
        function renabletextselect() {
            return true;
        }
        // Dacă este IE4+
        document.onselectstart = new Function("return false");
        // Dacă este NS6+
        if (window.sidebar) {
            document.onmousedown = disabletextselect;
            document.onclick = renabletextselect;
        }

    </script>
</head>
<body>

    <div class="main">
        
        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>" class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="Your Name"/>
                                <span class="error"><?php echo $numeErr;?></span>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email"/>
                                <span class="error"><?php echo $emailErr;?></span>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="pass" placeholder="Password"/>
                                <span class="error"><?php echo $passErr;?></span>
                            </div>
                        
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
                    </div>
                </div>
            </div>
        </section>

        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="images/signin-image.jpg" alt="sing up image"></figure>
                        <a href="#" class="signup-image-link">Create an account</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Sign in</h2>
                        <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="your_name" id="your_name" placeholder="Your Name"/>
                                <span class="error"><?php echo $numeErr;?></span>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="your_pass" id="your_pass" placeholder="Password"/>
                                <span class="error"><?php echo $passErr;?></span>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Log in"/>
                            </div>
                        
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
