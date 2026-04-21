<link rel="stylesheet" href="../style/cardlayout.css">

<section class="card-layout">
  <?php
  include './config/connection.php';

  $sql = "SELECT name, price, discount, imgUrl  FROM products;";
  $result = $conn->query($sql);

  $products = [];

  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $products[] = $row;
    }
  }

  foreach ($products as $product):
    $price = $product['price'];
    $discount = $product['discount'];
    $finalPrice = $price - ($price * $discount / 100);
    ?>
    <figure class="card">
      <div class="card-img">
        <img src="<?= $product['imgUrl']; ?>" alt="<?= $product['name']; ?>" />
      </div>
      <figcaption><?= $product['name']; ?></figcaption>

      <?php if ($discount > 0): ?>
        <span class="discount-badge">
          -<?= $discount; ?>%
        </span>
      <?php endif; ?>

      <div class="price-wrapper">
        <?php if ($discount > 0): ?>
          <p class="old-price">$<?= number_format($price, 2); ?></p>
          <p class="new-price"><b>$<?= number_format($finalPrice, 2); ?></b></p>
        <?php else: ?>
          <p><b>$<?= number_format($price, 2); ?></b></p>
        <?php endif; ?>
      </div>

      <div class="btn-wrapper">
        <button​​ class="card-button">Learn More</button​​>
        <button​​ class="card-button">Add to Cart</button​​>
      </div>
    </figure>
  <?php endforeach; ?>
</section>