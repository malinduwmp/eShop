<?php

require "connection.php";

$txt = $_POST["t"];
$select = $_POST["s"];

$query = "SELECT * FROM `product`";

if (!empty($txt) && $select == 0) {
    $query .= " WHERE `title` LIKE '%" . $txt . "%'";
} else if (empty($txt) && $select != 0) {
    $query .= " WHERE `category_id`='" . $select . "'";
} else if (!empty($txt) && $select != 0) {
    $query .= " WHERE `title` LIKE '%" . $txt . "%' AND `category_id`='" . $select . "'";
}

?>

<div class="row">
    <div class="offset-lg-1 col-12 col-lg-10 text-center">
        <div class="row justify-content-center">

            <?php


            if ("0" != ($_POST["page"])) {
                $pageno = $_POST["page"];
            } else {
                $pageno = 1;
            }

            $product_rs = Database::search($query);
            $product_num = $product_rs->num_rows;

            $results_per_page = 10;
            $number_of_pages = ceil($product_num / $results_per_page);

            $page_results = ($pageno - 1) * $results_per_page;
            $selected_rs =  Database::search($query . " LIMIT " . $results_per_page . " OFFSET " . $page_results . "");

            $selected_num = $selected_rs->num_rows;

            for ($x = 0; $x < $selected_num; $x++) {
                $selected_data = $selected_rs->fetch_assoc();

            ?>

                <div class="card col-6 col-lg-2 mt-2 mb-2" style="width: 18rem;">

                    <?php

                    $product_img_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $selected_data["id"] . "'");
                    $product_img_data = $product_img_rs->fetch_assoc();

                    ?>
                    <img src="<?php echo $product_img_data["code"]; ?>" class="card-img-top p-3" style="height: 230px;" />

                    <div class="card-body ms-0 m-0 text-center">
                        <h5 class="card-title fs-6 fw-bold"><?php echo $selected_data["title"]; ?></h5>
                        <span class="card-text text-primary">Rs. <?php echo $selected_data["price"]; ?> .00</span> <br />
                        <span class="card-text text-warning fw-bold">In Stock</span> <br />
                        <span class="card-text text-success fw-bold"><?php echo $selected_data["qty"]; ?> Items Available</span><br /><br />
                        <button class="col-12 btn btn-success">Buy Now</button>
                        <button class="col-12 btn btn-danger mt-2" onclick='addToCart(<?php echo $selected_data["id"]; ?>);'>Add to Cart</button>
                        <button class="col-12 btn btn-outline-light mt-2 border border-info" onclick='addToWatchlistSearch(<?php echo $selected_data["id"]; ?>);'>
                            <i class="bi bi-heart-fill text-dark fs-5" id='heart<?php echo $selected_data["id"]; ?>'></i>
                        </button>
                    </div>

                </div>

            <?php

            }
            ?>



        </div>
    </div>
    
</div>