<html>

<head>

    <title>Home</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="app\views\Styles\cartPage.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans&display=swap" rel="stylesheet">

    <script>
        function refreshItemInformation() {
            console.log('hi');
            $('#cartItemsContainer').load(location.href + ' #cartItemsContainer');
        }
    </script>



</head>

<body>

    <div id="cartTopBar">
        <?php include 'app/views/topBar.php'; ?>
    </div>




    <div id="cartWrapper">
        <div id="cartHeading">
            <h3>Your Cart</h3>
            <button type="text" id="checkoutButton"><i class="bi bi-cart-check-fill"></i> Checkout: $<?php echo isset($data['itemsInCart'][0]['cart_price']) ? $data['itemsInCart'][0]['cart_price'] : '0'; ?>

            </button>
        </div>
        <h6>Thank you for choosing PriceWave!</h6>

        <div id="cartItemsContainer">
            <div id="cartItems">
                <?php foreach ($data['itemsInCart'] as $item) : ?>
                    <div class="itemCard">

                        <img class="itemImages" src=<?php echo $item['image'] ?>>

                        <!-- <div id ="itemInformation"> -->
                        <h5><?php echo $item['name'] ?></h5>
                        <h6 style="margin-left:2%;"><?php echo $item['brand'] ?></h6>
                        <h6 id="quantity" style="margin-left:2%;"><?php echo $item['quantity'] ?></h6>
                        <h6 style="margin-left:2%;">Price: $<?php echo $item['price'] ?></h6>
                        <h6 id="quantity_purchased" style="margin-left:2%;">In cart: <?php echo $item['quantity_purchased'] ?></h6>
                        <!-- </div> -->
                        <h5 style="margin-left:2%;">
                            <?php

                            $totalItemPrice = $item['price'] * $item['quantity_purchased'];
                            echo ("Total: $" . $totalItemPrice);

                            ?>
                        </h5>

                        <!-- <form id="cartForm" method='post' action=''> -->
                            <input id="itemId" type="hidden" name="item_id" value="<?php echo $item['item_id'] ?>">
                            <input id="cartId" type="hidden" name="cart_id" value="<?php echo $item['cart_id'] ?>">
                            <div id="cartButtons">
                                <button name="minus1" class="bttns" onclick="removeOne()">-</button>
                                <input type="submit" name="add1" value="+" class="bttns">
                                <button type="submit" class="bttns" name="deleteButton">
                                    <i class="bi bi-trash3"></i>
                                </button>

                            </div>

                        <!-- </form> -->

                    </div>
                <?php endforeach ?>
            </div>
        </div>

    </div>

    

    <!-- Button to show/hide map -->
<!-- <button id="toggleMapButton" class="btn btn-primary" onclick="toggleMap()">Show Map</button> -->

<!-- Map container -->
<div id="cartMap"> 
<?php include 'app/views/map.php'; ?>
</div>

<script>
    function removeOne() {

            var itemsDiv = document.getElementById("quantity_purchased").value;
            var url = "/cart/" + itemsDiv;

            var cartId = document.getElementById("cartId").value;
            var itemId = document.getElementById("itemId").value;
            console.log(cartId);
            console.log(itemId);

            <?php 
                 $itemToBeUpdated = new \app\models\Cart();
                 $itemToBeUpdated->subtractItemQuantityInCart("<script>document.write(cartId)</script>", "<script>document.write(itemId)</script>");

                //  $itemsInCart = new \app\models\Cart();
                //  $itemsInCart = $itemsInCart->getUserCartItems($_SESSION['user_id']);
                //  log($itemsInCart);
            ?>            

            // Make the fetch request
            fetch(url)
                .then(response => {
                    // Check if the response is successful
                    if (response.ok) {
                        return response.text();
                    } else {
                        throw new Error('Network response was not ok');
                    }
                })
                .then(data => {
                    // Replace the content of the lorem-ipsum div with the response text
                    document.getElementById("quantity_purchased").innerHTML = <?php echo "" ?>;
                })
                .catch(error => {
                    console.error('There was a problem with the fetch request:', error);
                });
        }
</script>


</body>

</html>