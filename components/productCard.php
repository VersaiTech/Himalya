<<<<<<< HEAD


<!-- Product Card -->
<!-- <div class="col-12 col-sm-6 col-lg-3">
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
=======
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
>>>>>>> c58a34b1e76cee5f868bf0f9c29c9493db0a8be8
      </div>
    </div>
  </div>
</div> -->
<style>
/* From Uiverse.io by andrew-demchenk0 */ 
/* before adding the img to the div with the 
"card-img" class, remove css styles 
.Mycard-img .img::before and .Mycard-img .img::after,
then set the desired styles for .Mycard-img. */
.Mycard {
  --font-color: #323232;
  --font-color-sub: #666;
  --bg-color: #fff;
  --main-color: #323232;
  --main-focus: #2d8cf0;
  width: 300px;
  height: 400px;
  background: var(--bg-color);
  border: 2px solid var(--main-color);
  box-shadow: 4px 4px var(--main-color);
  border-radius: 5px;
  display: flex;
  flex-direction: column;
  justify-content: flex-start;
  padding: 20px;
  gap: 10px;
  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
}

.Mycard:last-child {
  justify-content: flex-end;
}

.Mycard-img {
    /* clear and add new css */
  transition: all 0.5s;
  display: flex;
  justify-content: center;
  margin-bottom: -2vh;
}


.Mycard-title {
  font-size: 20px;
  font-weight: 500;
  text-align: center;
  color: var(--font-color);
}

.Mycard-subtitle {
  font-size: 14px;
  font-weight: 400;
  color: var(--font-color-sub);
}

.Mycard-divider {
  width: 100%;
  border: 1px solid var(--main-color);
  border-radius: 50px;
}

.Mycard-footer {
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  align-items: center;
}

.Mycard-price {
  font-size: 20px;
  font-weight: 500;
  color: var(--font-color);
}

.Mycard-price span {
  font-size: 20px;
  font-weight: 500;
  color: var(--font-color-sub);
}

.Mycard-btn {
  height: 35px;
  background: var(--bg-color);
  border: 2px solid var(--main-color);
  border-radius: 5px;
  padding: 0 15px;
  transition: all 0.3s;
}

.Mycard-btn svg {
  width: 100%;
  height: 100%;
  fill: var(--main-color);
  transition: all 0.3s;
}

.Mycard-img:hover {
  transform: translateY(-3px);
}

.Mycard-btn:hover {
  border: 2px solid var(--main-focus);
}

.Mycard-btn:hover svg {
  fill: var(--main-focus);
}

.Mycard-btn:active {
  transform: translateY(3px);
}

</style>
<div class="col-12 col-sm-6 col-lg-4" style="margin-top: 2vh; margin-bottom: 2vh">
<div class="Mycard">
    <div class="Mycard-img"><div class="img"><img src=<?php echo $img ?> alt=""></div></div>
    <div class="Mycard-title"><?php echo $name ?> </div>
    <div class="Mycard-subtitle">Product description. Lorem ipsum dolor sit amet, consectetur adipisicing elit.</div>
    <hr class="Mycard-divider">
    <div class="Mycard-footer">
        <div class="Mycard-price"><?php echo $salePrice ?></div>
        <form action="handleBuy" method="post">
        <input type="hidden" name="product_id" value="<?php echo $productId; ?>">
        <button class="Mycard-btn" type="submit">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="m397.78 316h-205.13a15 15 0 0 1 -14.65-11.67l-34.54-150.48a15 15 0 0 1 14.62-18.36h274.27a15 15 0 0 1 14.65 18.36l-34.6 150.48a15 15 0 0 1 -14.62 11.67zm-193.19-30h181.25l27.67-120.48h-236.6z"></path><path d="m222 450a57.48 57.48 0 1 1 57.48-57.48 57.54 57.54 0 0 1 -57.48 57.48zm0-84.95a27.48 27.48 0 1 0 27.48 27.47 27.5 27.5 0 0 0 -27.48-27.47z"></path><path d="m368.42 450a57.48 57.48 0 1 1 57.48-57.48 57.54 57.54 0 0 1 -57.48 57.48zm0-84.95a27.48 27.48 0 1 0 27.48 27.47 27.5 27.5 0 0 0 -27.48-27.47z"></path><path d="m158.08 165.49a15 15 0 0 1 -14.23-10.26l-25.71-77.23h-47.44a15 15 0 1 1 0-30h58.3a15 15 0 0 1 14.23 10.26l29.13 87.49a15 15 0 0 1 -14.23 19.74z"></path></svg>
        </button>
        </form>
    </div>
</div>
</div>
