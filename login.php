<!-- <?php
session_start();
$conn = new mysqli("localhost", "root", "", "parfumeriya");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 1) {
        $stmt->bind_result($id, $hashed_password);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            $_SESSION['user_id'] = $id;
            echo "<p style='color:green;'>Kirish muvaffaqiyatli! <a href='dashboard.php'>Dashboard</a></p>";
        } else {
            echo "<p style='color:red;'>Noto‘g‘ri parol!</p>";
        }
    } else {
        echo "<p style='color:red;'>Email topilmadi!</p>";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tizimga kirish</title>
    <style>
        body {
            font-family: Arial;
            background: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .form-container {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
        }
        input {
            width: 100%;
            padding: 10px;
            margin-top: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }
        button {
            background-color: #28a745;
            color: white;
            padding: 10px;
            border: none;
            width: 100%;
            border-radius: 6px;
            cursor: pointer;
        }
        button:hover {
            background-color: #218838;
        }
        h2 {
            text-align: center;
        }
    </style>
</head>
<body>
<div class="form-container">
    <h2>Tizimga kirish</h2>
    <form method="POST" action="">
        Email: <input type="email" name="email" required><br>
        Parol: <input type="password" name="password" required><br>
        <button type="submit">Kirish</button>
    </form>
</div>
</body>
</html>
 -->


<!-- 
 <?php
session_start();
$conn = new mysqli("localhost", "root", "", "parfumeriya");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 1) {
        $stmt->bind_result($id, $hashed_password);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            $_SESSION['user_id'] = $id;
            $_SESSION['success_message'] = "Kirish muvaffaqiyatli!";
            header("Location: index.php"); // <-- PHP faylga o'tadi!
            exit();
        } else {
            echo "<p style='color:red;'>Noto‘g‘ri parol!</p>";
        }
    } else {
        echo "<p style='color:red;'>Email topilmadi!</p>";
    }
    $stmt->close();
}
?>
 -->








 <?php
session_start();
$conn = new mysqli("localhost", "root", "", "parfumeriya");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 1) {
        $stmt->bind_result($id, $hashed_password);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            $_SESSION['user_id'] = $id;
            $_SESSION['success_message'] = "Kirish muvaffaqiyatli!";
            header("Location: index.php");
            exit();
        } else {
            echo "<p style='color:red; text-align:center;'>Noto‘g‘ri parol!</p>";
        }
    } else {
        echo "<p style='color:red; text-align:center;'>Email topilmadi!</p>";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="uz">
<head>
  <title>Tizimga kirish</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: #f4f4f4;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }
    .form-container {
      background: white;
      border-radius: 20px;
      width: 400px;
      box-shadow: 0 4px 20px rgba(0,0,0,0.2);
      display: flex;
      overflow: hidden;
    }
    .form-left {
      background: #6b9bff;
      color: white;
      padding: 30px;
      width: 40%;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }
    .form-right {
      padding: 30px;
      width: 60%;
    }
    .form-left h2 {
      font-size: 1.5rem;
      margin-bottom: 10px;
    }
    .form-left p {
      font-size: 0.9rem;
    }
    .form-right h2 {
      font-size: 1.5rem;
      margin-bottom: 20px;
    }
    .form-right input {
      width: 100%;
      padding: 10px;
      margin: 10px 0;
      border: 1px solid #ddd;
      border-radius: 5px;
    }
    .form-right button {
      width: 100%;
      padding: 10px;
      background: #6b9bff;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
    .form-right a {
      display: block;
      text-align: center;
      margin-top: 10px;
      color: #6b9bff;
      text-decoration: none;
    }
    .social-login {
      display: flex;
      justify-content: center;
      gap: 10px;
      margin-top: 15px;
    }
    .social-login button {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      background: #f0f0f0;
      color: #333;
      border: none;
    }
  </style>
</head>
<body>
<div class="form-container">
  <div class="form-left">
    <h2>Salom, Xush Kelibsiz!</h2>
    <p>Hisobingiz yo‘qmi?</p>
    <a href="register.php" style="color: white; text-decoration: none; margin-top: 10px; display: inline-block; border: 1px solid white; padding: 5px 10px; border-radius: 5px;">Ro‘yxatdan o‘tish</a>
  </div>
  <div class="form-right">
    <h2>Kirish</h2>
    <form method="POST" action="">
      <input type="email" name="email" placeholder="Email" required>
      <input type="password" name="password" placeholder="Parol" required>
      <a href="#" style="font-size: 0.9rem;">Parolni unutdingizmi?</a>
      <button type="submit">Kirish</button>
    </form>
    <p style="text-align: center; margin-top: 10px; font-size: 0.9rem;">yoki ijtimoiy tarmoqlar orqali kirish</p>
    <div class="social-login">
      <button>G</button>
      <button>f</button>
      <button>Git</button>
      <button>in</button>
    </div>
  </div>
</div>
</body>
</html>