<?php

require "connection.php";

if (isset($_GET["c"])) {

    $category_id = $_GET["c"];

    $brands_rs = Database::search("SELECT * FROM `brand` WHERE `category_id`='" . $category_id . "'");
    $brands_num = $brands_rs->num_rows;

    if ($brands_num > 0) {

        for ($x = 0; $x < $brands_num; $x++) {

            $brands_data = $brands_rs->fetch_assoc();

        ?>

        <option value="<?php echo $brands_data["id"]; ?>"><?php echo $brands_data["name"]; ?></option>
            
        <?php

        }

    } else {
        
        $all_brands = Database::search("SELECT * FROM `brand`");
        $all_num = $all_brands->num_rows;

        for($y = 0; $y < $all_num; $y++){
            $all_data = $all_brands->fetch_assoc();

            ?>

            <option value="<?php echo $all_data["id"]; ?>"><?php echo $all_data["name"]; ?></option>

            <?php
        }
    }
}
        
        
?>