<?php
session_start();
$conn = new mysqli("localhost", "root", "", "parfumeriya");

if ($conn->connect_error) {
    die("Bazaga ulanib bo'lmadi: " . $conn->connect_error);
}

// Ro‘yxatdan o‘tish jarayoni
if (isset($_GET['action']) && $_GET['action'] == 'register' && $_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (fullname, email, password) VALUES (?, ?, ?)");
    if ($stmt) {
        $stmt->bind_param("sss", $fullname, $email, $password);
        $stmt->execute();
        echo "<script>alert('Ro‘yxatdan o‘tish muvaffaqiyatli!'); window.location.href='auth.php?action=login';</script>";
        $stmt->close();
    } else {
        echo "<p style='color:red; text-align:center;'>Xatolik: " . $conn->error . "</p>";
    }
}

// Tizimga kirish jarayoni
if (isset($_GET['action']) && $_GET['action'] == 'login' && $_SERVER["REQUEST_METHOD"] == "POST") {
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

$conn->close();
?>

<!DOCTYPE html>
<html lang="uz">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo isset($_GET['action']) && $_GET['action'] == 'register' ? "Ro‘yxatdan o‘tish" : "Tizimga kirish"; ?></title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: #e0e0e0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }
    .form-container {
      background: white;
      border-radius: 15px;
      width: 500px;
      box-shadow: 0 4px 20px rgba(0,0,0,0.2);
      display: flex;
      overflow: hidden;
    }
    .form-left {
      background: #4a90e2;
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
      background: #4a90e2;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
    .form-right a {
      display: block;
      text-align: center;
      margin-top: 10px;
      color: #4a90e2;
      text-decoration: none;
      font-size: 0.9rem;
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
      cursor: pointer;
    }
  </style>
</head>
<body>
<div class="form-container">
  <div class="form-left">
    <?php if (isset($_GET['action']) && $_GET['action'] == 'register'): ?>
      <h2>Xush Kelibsiz!</h2>
      <p>Allaqachon hisobingiz bormi?</p>
      <a href="auth.php?action=login" style="color: white; text-decoration: none; margin-top: 10px; display: inline-block; border: 1px solid white; padding: 5px 10px; border-radius: 5px;">Kirish</a>
    <?php else: ?>
      <h2>Salom, Xush Kelibsiz!</h2>
      <p>Hisobingiz yo‘qmi?</p>
      <a href="auth.php?action=register" style="color: white; text-decoration: none; margin-top: 10px; display: inline-block; border: 1px solid white; padding: 5px 10px; border-radius: 5px;">Ro‘yxatdan o‘tish</a>
    <?php endif; ?>
  </div>
  <div class="form-right">
    <?php if (isset($_GET['action']) && $_GET['action'] == 'register'): ?>
      <h2>Ro‘yxatdan o‘tish</h2>
      <form method="POST" action="auth.php?action=register">
        <input type="text" name="fullname" placeholder="F.I.O" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Parol" required>
        <button type="submit">Ro‘yxatdan o‘tish</button>
      </form>
    <?php else: ?>
      <h2>Kirish</h2>
      <form method="POST" action="auth.php?action=login">
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Parol" required>
        <a href="#">Parolni unutdingizmi?</a>
        <button type="submit">Kirish</button>
      </form>

    <?php endif; ?>
  </div>
</div>
</body>
</html>