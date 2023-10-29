<?php

require "connection.php";

$txt = $_POST["t"];
$category = $_POST["c"];
$brand = $_POST["b"];
$model = $_POST["m"];
$condition = $_POST["co"];
$color = $_POST["col"];
$pricef = $_POST["pf"];
$pricet = $_POST["pt"];
$sort = $_POST["s"];

$query = "SELECT * FROM `product` 
INNER JOIN brand_has_model ON product.brand_has_model_id = brand_has_model.id 
INNER JOIN images ON images.product_id = product.id 
WHERE product.title LIKE '%" . $txt . "%'";


if ($category != 0) {
    $query .= " AND product.category_id = '" . $category . "'";
}

if ($brand != 0) {
    $query .= " AND brand_has_model.brand_id = '" . $brand . "'";
}

if ($model != 0) {
    $query .= " AND brand_has_model.model_id = '" . $model . "'";
}

if ($condition != 0) {
    $query .= " AND product.condition_id = '" . $condition . "'";
}

if ($color != 0) {
    $query .= " AND product.colour_id = '" . $color . "'";
}

if (!empty($pricef)) {
    $query .= " AND product.price >='" . $pricef . "'";
}

if (!empty($pricet)) {
    $query .= " AND product.price <='" . $pricet . "'";
}

switch ($sort) {
    case 1:
        $query .= " ORDER BY `price` DESC";

        break;

    case 2:
        $query .= " ORDER BY `price` ASC";

        break;

    case 3:
        $query .= " ORDER BY `qty` DESC";

        break;

    case 4:
        $query .= " ORDER BY `qty` ASC";

        break;
}

if (empty($txt) && $category == 0 && $brand == 0 && $model == 0 && $condition == 0 && $color == 0 && empty($pricef) && empty($pricet)) {

?>

    <div class="offset-5 col-2 mt-5">
        <span class="fw-bold text-black-50"><i class="bi bi-search" style="font-size: 100px;"></i></span>
    </div>
    <div class="offset-3 col-6 mt-3 mb-5">
        <span class="h1 text-black-50 fw-bold">No Items Searched Yet...</span>
    </div>

<?php
    return;
}


if ($_POST["page"] != "0") {

    $pageno = $_POST["page"];
} else {

    $pageno = 1;
}

$product_rs = Database::search($query);
$product_num = $product_rs->num_rows;

$results_per_page = 6;
$number_of_pages = ceil($product_num / $results_per_page);

$viewed_results_count = ((int)$pageno - 1) * $results_per_page;

$query .= " LIMIT " . $results_per_page . " OFFSET " . $viewed_results_count . "";
$results_rs = Database::search($query);
$results_num = $results_rs->num_rows;

while ($results_data = $results_rs->fetch_assoc()) {
?>

    <div class="card mb-3 mt-3 col-12 col-lg-6">
        <div class="row">

            <div class="col-md-4 col-lg-4 pt-2 pb-2">

                <img src="<?php echo $results_data["code"]; ?>" class="img-fluid rounded-start" style="height: 120px;">
            </div>
            <div class="col-md-8">
                <div class="card-body">

                    <h5 class="card-title fw-bold"><?php echo $results_data["title"]; ?></h5>
                    <span class="card-text text-primary fw-bold">Rs. <?php echo $results_data["price"]; ?> .00</span>
                    <br />
                    <span class="card-text text-success fw-bold fs"><?php echo $results_data["qty"]; ?> Items Left</span>

                    <div class="row">
                        <div class="col-12">

                            <div class="row g-1">
                                <div class="col-12 col-lg-6 d-grid">
                                    <a href='<?php echo "singleProductView.php?id=" . $results_data["id"]; ?>' class="col-12 btn btn-success">Buy Now</a>
                                </div>
                                <div class="col-12 col-lg-6 d-grid">
                                    <a href="#" class="btn btn-danger fs" onclick='addToCart(<?php echo $results_data["id"]; ?>);'>Add Cart</a>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

<?php
}

?>


<!--  -->
<div class="offset-2 offset-lg-3 col-8 col-lg-6 text-center mb-3">
    <nav aria-label="Page navigation example">
        <ul class="pagination pagination-lg justify-content-center">
            <li class="page-item">
                <a class="page-link" <?php if ($pageno <= 1) {
                                            echo ("#");
                                        } else {
                                        ?> onclick="advancedSearch(<?php echo ($pageno - 1) ?>);" <?php
                                                                                                } ?> aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <?php

            for ($x = 1; $x <= $number_of_pages; $x++) {
                if ($x == $pageno) {
            ?>
                    <li class="page-item active">
                        <a class="page-link" onclick="advancedSearch(<?php echo ($x) ?>);"><?php echo $x; ?></a>
                    </li>
                <?php
                } else {
                ?>
                    <li class="page-item">
                        <a class="page-link" onclick="advancedSearch(<?php echo ($x) ?>);"><?php echo $x; ?></a>
                    </li>
            <?php
                }
            }

            ?>

            <li class="page-item">
                <a class="page-link" <?php if ($pageno >= $number_of_pages) {
                                            echo ("#");
                                        } else {
                                        ?> onclick="advancedSearch(<?php echo ($pageno + 1) ?>);" <?php
                                                                                                } ?> aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
</div>
<!--  -->