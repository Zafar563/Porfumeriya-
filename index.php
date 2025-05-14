

<?php
session_start(); // Eng yuqoriga ko‘chirildi
?>

<!DOCTYPE html>
<html lang="uz">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Online Parfyumeriya</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Segoe UI', sans-serif;
    }
    body {
      background: #fff8f0;
      color: #333;
    }
    header {
      background-color: #ffccd5;
      padding: 20px;
      text-align: center;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }
    header h1 {
      font-size: 2.5rem;
      color: #b30059;
    }
    nav {
      display: flex;
      justify-content: center;
      gap: 30px;
      background: #fff0f5;
      padding: 10px;
    }
    nav a {
      text-decoration: none;
      color: #800040;
      font-weight: bold;
    }
    nav a:hover {
      color: #e60073;
    }
    .products {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 20px;
      padding: 40px;
    }
    .product {
      background: white;
      border-radius: 10px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      padding: 20px;
      text-align: center;
      transition: transform 0.3s;
    }
    .product:hover {
      transform: scale(1.05);
    }
    .product img {
      max-width: 100%;
      height: 200px;
      object-fit: cover;
      border-radius: 8px;
    }
    .product h3 {
      margin: 15px 0 10px;
      color: #b30059;
    }
    .product p {
      color: #333;
      font-weight: bold;
    }
    .product button {
      margin-top: 10px;
      padding: 8px 12px;
      background-color: #b30059;
      color: white;
      border: none;
      border-radius: 6px;
      cursor: pointer;
    }
    .product button:hover {
      background-color: #e60073;
    }
    footer {
      text-align: center;
      background: #ffccd5;
      padding: 20px;
      margin-top: 40px;
    }
  </style>
</head>
<body>

<!-- loginni girishini muvofaqqiyatli dagani chiqishi -->
<?php
if (isset($_SESSION['success_message'])) {
    echo "<div style='text-align:center; background:#d4edda; color:#155724; padding:10px; margin:20px; border:1px solid #c3e6cb; border-radius:5px;'>
        {$_SESSION['success_message']}
    </div>";
    unset($_SESSION['success_message']);
}
?>

  <header>
    <h1>Online Parfyumeriya</h1>
  </header>

  <nav>
    <a href="index.html">Bosh sahifa</a>
    <a href="home.html">Atirlar</a>
    <a href="kosmetika.html">Kosmetikalar</a>
    <a href="Yuz uxodlari.html">Yuz uxodlari</a>
    <a href="contacts.html">Bog‘lanish</a>
    <a href="auth.php?action=register">Ro‘yxatdan o‘tish</a>
    <a href="auth.php?action=login">Kirish</a>
  </nav>

  <section class="products" id="products">
    <div class="product">
      <img src="./imgs/my way.webp" alt="My Way parfyum">
      <h3>My Way</h3>
      <p>1 000 000 so'm</p>
      <button onclick="addToCart('My Way', '1 000 000 so\'m')">Savatga qo‘shish</button>
    </div>
    <div class="product">
      <img src="./imgs/Gypsy Water.webp" alt="Gypsy Water parfyum">
      <h3>Gypsy Water</h3>
      <p>1 500 000 so'm</p>
      <button onclick="addToCart('Gypsy Water', '1 500 000 so\'m')">Savatga qo‘shish</button>
    </div>
    <div class="product">
      <img src="./imgs/emissa.jpg" alt="Emissa parfyum">
      <h3>Emissa</h3>
      <p>2 000 000 so'm</p>
      <button onclick="addToCart('Emissa', '2 000 000 so\'m')">Savatga qo‘shish</button>
    </div>
    <div class="product">
      <img src="./imgs/Maybelline Mascara.webp" alt="Maybelline Maskara">
      <h3>Maybelline Mascara</h3>
      <p>300 000 so'm</p>
      <button onclick="addToCart('Maybelline Mascara', '300 000 so\'m')">Savatga qo‘shish</button>
    </div>
    <div class="product">
      <img src="./imgs/Smoky eyes.jpg" alt="Smoky Eyes">
      <h3>Smoky Eyes</h3>
      <p>350 000 so'm</p>
      <button onclick="addToCart('Smoky Eyes', '350 000 so\'m')">Savatga qo‘shish</button>
    </div>
    <div class="product">
      <img src="./imgs/Volume.jpg" alt="Volume">
      <h3>Volume</h3>
      <p>400 000 so'm</p>
      <button onclick="addToCart('Volume', '400 000 so\'m')">Savatga qo‘shish</button>
    </div>
    <div class="product">
      <img src="./imgs/Kosmetika sumkasi.webp" alt="Kosmetika sumkasi">
      <h3>Kosmetika sumkasi</h3>
      <p>1 500 000 so'm</p>
      <button onclick="addToCart('Kosmetika sumkasi', '1 500 000 so\'m')">Savatga qo‘shish</button>
    </div>
    <div class="product">
      <img src="./imgs/Kistichka nabor.webp" alt="Kistichka nabor">
      <h3>Kistichka nabor</h3>
      <p>1 500 000 so'm</p>
      <button onclick="addToCart('Kistichka nabor', '1 500 000 so\'m')">Savatga qo‘shish</button>
    </div>
    <div class="product">
      <img src="./imgs/Jadore.jpg" alt="Jadore">
      <h3>Jadore</h3>
      <p>1 500 000 so'm</p>
      <button onclick="addToCart('Jadore', '1 500 000 so\'m')">Savatga qo‘shish</button>
    </div>
    <div class="product">
      <img src="./imgs/Gucci.webp" alt="Gucci">
      <h3>Gucci</h3>
      <p>1 500 000 so'm</p>
      <button onclick="addToCart('Gucci', '1 500 000 so\'m')">Savatga qo‘shish</button>
    </div>
  </section>

  <div style="text-align: center; margin-bottom: 40px;">
    <a href="savat.html">
      <button style="padding: 10px 20px; background-color: #b30059; color: white; border: none; border-radius: 8px;">
        🛒 Savatga o‘tish
      </button>
    </a>
  </div>

  <footer id="contact">
    <h2>Bog'lanish</h2>
    <p>Telegram: <a href="https://t.me/shahrizoda77">@shahrizoda77</a></p>
  </footer>

  <script>
    function addToCart(name, price) {
      let cart = JSON.parse(localStorage.getItem('cart')) || [];
      cart.push({ name: name, price: price });
      localStorage.setItem('cart', JSON.stringify(cart));
      alert(`${name} savatga qo‘shildi!`);
    }
  </script>

</body>
</html>