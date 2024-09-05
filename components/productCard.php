<div class="col-12 col-sm-6 col-lg-3">
  <div class="card h-100 position-relative">
    <div class="card-body d-flex flex-column">
      <?php
      $discount = round((($product['price'] - $product['salePrice']) / $product['price']) * 100);
      ?>
      <div class="discount-badge position-absolute top-0 end-0 bg-danger text-white p-1 rounded">
        <?php echo $discount; ?>% OFF
      </div>
      
      <div class="image-container mb-3" style="height: 200px; display: flex; align-items: center; justify-content: center; overflow: hidden;">
        <img src="<?php echo $product['img']; ?>" alt="<?php echo $product['name']; ?>" style="max-height: 100%; max-width: 100%;">
      </div>
      
      <h5 class="card-title"><?php echo $product['name']; ?></h5>
      <p class="card-text text-muted">
        <s>$<?php echo $product['price']; ?></s> 
        <span class="text-danger">$<?php echo $product['salePrice']; ?></span>
      </p>
      <div class="mt-auto">
        <form action="handleBuy.php" method="post">
          <!-- <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>"> -->
          <button type="submit" class="btn btn-primary w-100">Buy Now</button>
        </form>
      </div>
    </div>
  </div>
</div>
