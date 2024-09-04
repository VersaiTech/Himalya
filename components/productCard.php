

<!-- Product Card -->
<div class="col-12 col-sm-6 col-lg-3">
  <div class="card hp-card-1" style="min-width: 250px; min-height: 400px;">
  <div class="card-img-container">
      <img src="<?php echo $img ?>" class="card-img-top" alt="...">
    </div>
    <div class="card-body">
      <h5 class="card-title"><?php echo $name ?></h5>
      <p class="card-text">
        <span class="text-decoration-line-through"><?php echo $price ?></span>
        <span><?php echo $salePrice ?></span>
      </p>
      <div class="star-rating">
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star"></span>
        <span class="fa fa-star"></span>
        <span class="fa fa-star"></span>
      </div>
      <form action="handleBuy" method="post">
        <input type="hidden" name="product_id" value="<?php echo $productId; ?>">
        <button type="submit" class="btn btn-primary mt-2">Buy Now</button>
      </form>
    </div>
  </div>
</div>
