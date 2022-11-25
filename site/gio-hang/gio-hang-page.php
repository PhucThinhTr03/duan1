<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= $CONTENT_URL ?>/css/style.css">
    <link rel="stylesheet" href="<?= $CONTENT_URL ?>/css/gio-hang.css">
    <title>gio hàng</title>
    <style>
        .checkout-btn a {
            width: 100%;
            padding: 12px 24px;
            text-transform: uppercase;
            background-color: #000;
            color: #fff;
            font-size: 1.6rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 16px;
        }

        .checkout-btn a i {
            font-size: 1.8rem;
        }
    </style>
</head>

<body>
    <div class="cart-container">
        <div class="row cart-contai">
            <div class="prod-list">
                <div class="row">
                    <?php
                    $cookie_data = isset($_COOKIE["cart"]) ? $_COOKIE['cart'] : '[]';
                    $cart_data = json_decode($cookie_data, true);
                    // var_dump($cart_data);
                    $total = 0;
                    foreach ($cart_data as $sp) :
                        $giam_gia = $sp['giam_gia'] ? $sp['giam_gia'] : 0;
                        $subtotal = ($sp['don_gia'] - (($sp['don_gia'] * $giam_gia) / 100)) * $sp['quantity'];
                        $total += $subtotal;
                    ?>
                        <form class="cart-prod-item" action="" method="POST">
                            <input type="hidden" name="ma_hh" value="<?php echo $sp['ma_hh']; ?>">
                            <div class="row cart-item">
                                <div class="prod-img">
                                    <img src="<?= $CONTENT_URL ?>/images/products/<?php echo $sp['hinh']; ?>" alt="">
                                </div>
                                <div class="prod-info">
                                    <p class="itemNumber">#QUE-007544-002</p>
                                    <h3>
                                        <?php echo $sp['ten_hh']; ?>
                                        <?php
                                        if ($giam_gia > 0) {
                                        ?>
                                            <div class="prod-sale">
                                                <span>
                                                    -<?= $giam_gia ?>%
                                                </span>
                                            </div>
                                        <?php
                                        } ?>
                                    </h3>
                                    <p>
                                        <input class="quantityInp" type="number" name="quantity" class="qty product-qty" value='<?php echo $sp['quantity'] ?>' /> x $<span class="prod-price">
                                            <?php echo $sp['don_gia']; ?>
                                        </span>
                                    </p>
                                </div>
                                <div class="prod-total">
                                    <p class="prod-subtotal">$<?php echo $subtotal; ?></p>
                                </div>
                                <div class="prod-action">
                                    <button class="delete-prod" name="delcart">x</button>
                                </div>
                            </div>
                        </form>
                    <?php
                    endforeach;
                    ?>
                </div>
            </div>
            <div class="cart-checkout">
                <div class="cart-sumary">
                    <h3>ORDER SUMARY</h3>
                    <div class="subtotal">
                        <span>Subtotal</span>
                        <span class="cart-subtotal">$<?php echo $total ?></span>
                    </div>
                    <div class="delivery">
                        <span>Estimated Delivery & Handling
                        </span>
                        <span>FREE</span>
                    </div>
                    <div class="total">
                        <p>TOTAL
                            (inclusive of tax 370,370₫)</p>
                        <p class="cart-total">
                            $<?php echo $total ?>
                        </p>
                    </div>
                </div>
                <div class="checkout-btn">
                    <a href="?thanh-toan">
                        Checkout
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <script>
    </script>
</body>

</html>