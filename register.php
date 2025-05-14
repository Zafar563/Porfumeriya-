<!-- <?php
$conn = new mysqli("localhost", "root", "", "parfumeriya");
if ($conn->connect_error) {
    die("Bazaga ulanib bo'lmadi: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (fullname, email, password) VALUES (?, ?, ?)");
    if ($stmt) {
        $stmt->bind_param("sss", $fullname, $email, $password);
        $stmt->execute(); 
        echo "<script>alert('Ro‘yxatdan o‘tish muvaffaqiyatli amalga oshirildi!');</script>";
        $stmt->close();
    } else {
        echo "Xatolik: " . $conn->error;
    }
}

$conn->close();
?>


<!DOCTYPE html>
<html>
<head>
    <title>Ro'yxatdan o'tish</title>
    <style>
        body {
            font-family: Arial;
            background: #f4f4f4;
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
            background-color: #007BFF;
            color: white;
            padding: 10px;
            border: none;
            width: 100%;
            border-radius: 6px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        h2 {
            text-align: center;
        }
    </style>
</head>
<body>
<div class="form-container">
    <h2>Ro'yxatdan o'tish</h2>
    <form method="POST" action="">
        FIO: <input type="text" name="fullname" required><br>
        Email: <input type="email" name="email" required><br>
        Parol: <input type="password" name="password" required><br>
        <button type="submit">Ro'yxatdan o'tish</button>
    </form>
</div>
</body>
</html>
 -->






 <?php
$conn = new mysqli("localhost", "root", "", "parfumeriya");
if ($conn->connect_error) {
    die("Bazaga ulanib bo'lmadi: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (fullname, email, password) VALUES (?, ?, ?)");
    if ($stmt) {
        $stmt->bind_param("sss", $fullname, $email, $password);
        $stmt->execute(); 
        echo "<script>alert('Ro‘yxatdan o‘tish muvaffaqiyatli!'); window.location.href='login.php';</script>";
        $stmt->close();
    } else {
        echo "Xatolik: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="uz">
<head>
  <title>Ro'yxatdan o'tish</title>
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
  </style>
</head>
<body>
<div class="form-container">
  <div class="form-left">
    <h2>Xush Kelibsiz!</h2>
    <p>Allaqachon hisobingiz bormi?</p>
    <a href="login.php" style="color: white; text-decoration: none; margin-top: 10px; display: inline-block; border: 1px solid white; padding: 5px 10px; border-radius: 5px;">Kirish</a>
  </div>
  <div class="form-right">
    <h2>Ro'yxatdan o'tish</h2>
    <form method="POST" action="">
      <input type="text" name="fullname" placeholder="FIO" required>
      <input type="email" name="email" placeholder="Email" required>
      <input type="password" name="password" placeholder="Parol" required>
      <button type="submit">Ro'yxatdan o'tish</button>
    </form>
  </div>
</div>
</body>
</html>