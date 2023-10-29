<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <title>Add Products | eShop</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <link rel="icon" href="resource/logo.svg" />

</head>

<body>

    <div class="container-fluid">
        <div class="row gy-3">
            <?php include "header.php";

            require "connection.php";

            if (isset($_SESSION["u"])) {

            ?>

                <div class="col-12">
                    <div class="row">

                        <div class="col-12 text-center">
                            <h2 class="h2 text-primary fw-bold">Add New Product</h2>
                        </div>

                        <div class="col-12">
                            <div class="row">

                                <div class="col-12 col-lg-4 border-end border-success">
                                    <div class="row">

                                        <div class="col-12">
                                            <label class="form-label fw-bold" style="font-size: 20px;">Select Product Category</label>
                                        </div>

                                        <div class="col-12">
                                            <select class="form-select text-center" id="category" onchange="load_brand();">
                                                <option value="0">Select Category</option>
                                                <?php

                                                $category_rs = Database::search("SELECT * FROM `category`");
                                                $category_num = $category_rs->num_rows;

                                                for ($x = 0; $x < $category_num; $x++) {
                                                    $category_data = $category_rs->fetch_assoc();

                                                ?>

                                                    <option value="<?php echo $category_data["id"]; ?>"><?php echo $category_data["name"]; ?></option>

                                                <?php
                                                }

                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-lg-4 border-end border-success">
                                    <div class="row">

                                        <div class="col-12">
                                            <label class="form-label fw-bold" style="font-size: 20px;">Select Product Brand</label>
                                        </div>

                                        <div class="col-12">
                                            <select class="form-select text-center" id="brand">
                                                <option value="0">Select Brand</option>
                                                <?php

                                                $brand_rs = Database::search("SELECT * FROM `brand`");
                                                $brand_num = $brand_rs->num_rows;

                                                for ($y = 0; $y < $brand_num; $y++) {
                                                    $brand_data = $brand_rs->fetch_assoc();

                                                ?>

                                                    <option value="<?php echo $brand_data["id"]; ?>"><?php echo $brand_data["name"]; ?></option>

                                                <?php
                                                }

                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-lg-4 border-end border-success">
                                    <div class="row">

                                        <div class="col-12">
                                            <label class="form-label fw-bold" style="font-size: 20px;">Select Product Model</label>
                                        </div>

                                        <div class="col-12">
                                            <select class="form-select text-center" id="model">
                                                <option value="0">Select Model</option>
                                                <?php

                                                $model_rs = Database::search("SELECT * FROM `model`");
                                                $model_num = $model_rs->num_rows;

                                                for ($z = 0; $z < $model_num; $z++) {
                                                    $model_data = $model_rs->fetch_assoc();

                                                ?>

                                                    <option value="<?php echo $model_data["id"]; ?>"><?php echo $model_data["name"]; ?></option>

                                                <?php
                                                }

                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <hr class="border-dark" style="border-width: 3px;" />
                                </div>

                                <div class="col-12">
                                    <div class="row">

                                        <div class="col-12">
                                            <label class="form-label fw-bold" style="font-size: 20px;">
                                                Add a Title to your Product
                                            </label>
                                        </div>

                                        <div class="col-12 offset-0 offset-lg-2 col-lg-8">
                                            <input type="text" class="form-control" id="title" />
                                        </div>

                                    </div>
                                </div>

                                <div class="col-12">
                                    <hr class="border-dark" style="border-width: 3px;" />
                                </div>

                                <div class="col-12">
                                    <div class="row">

                                        <div class="col-12 col-lg-4 border-end border-secondary" style="border-width: 3px;">
                                            <div class="row">
                                                <div class="col-12">
                                                    <label class="form-label fw-bold" style="font-size: 20px;">Select Product Condition</label>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-check form-check-inline mx-5">
                                                        <input class="form-check-input" type="radio" name="c" id="b" checked/>
                                                        <label class="form-check-label fw-bold" for="b">Brand New</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="c" id="u"/>
                                                        <label class="form-check-label fw-bold" for="u">Used</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-lg-4 border-end border-secondary" style="border-width: 3px;">
                                            <div class="row">
                                                <div class="col-12">
                                                    <label class="form-label fw-bold" style="font-size: 20px;">Select Product Colour</label>
                                                </div>

                                                <div class="col-12">
                   

                                                        <select class="form-select" id="clr">
                                                            <option value="0">Select Colour</option>
                                                        

                                                        <?php

                                                        $clr_rs = Database::search("SELECT * FROM `colour`");
                                                        $clr_num = $clr_rs->num_rows;

                                                        for ($a = 0; $a < $clr_num; $a++) {
                                                            $clr_data = $clr_rs->fetch_assoc();

                                                        ?>

                                                            <option value="<?php echo $clr_data["id"]; ?>"><?php echo $clr_data["name"]; ?></option>

                                                        <?php
                                                        }

                                                        ?>

                                                        </select>

                                                 
                                                </div>


                                                <div class="col-12">
                                                    <div class="input-group mt-2 mb-2">
                                                        <input class="form-control" type="text" placeholder="Add New Colour" id="clr_in">
                                                        <button class="btn btn-outline-primary" type="button" id="button-addon2">+ Add</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-lg-4">
                                            <div class="row">
                                                <div class="col-12">
                                                    <label class="form-label fw-bold" style="font-size: 20px;">Add Product Quantity</label>
                                                </div>
                                                <div class="col-12">
                                                    <input type="number" class="form-control" value="0" min="0" id="qty">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-12">
                                    <hr class="border-dark" style="border-width: 3px;" />
                                </div>

                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-6 border-end border-success">
                                            <div class="row">
                                                <div class="col-12">
                                                    <label class="form-label fw-bold" style="font-size: 20px;">Cost Per Item</label>
                                                </div>
                                                <div class="col-12 offset-0 offset-lg-2 col-lg-8">
                                                    <div class="input-group mb-2 mt-2">
                                                        <span class="input-group-text">Rs.</span>
                                                        <input type="text" class="form-control" id="cost" />
                                                        <span class="input-group-text">.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="row">
                                                <div class="col-12">
                                                    <label class="form-label fw-bold" style="font-size: 20px;">Approved Payment Methods</label>
                                                </div>
                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="offset-0 offset-lg-2 col-6 col-lg-2 pm pm1"></div>
                                                        <div class="col-6 col-lg-2 pm pm2"></div>
                                                        <div class="col-6 col-lg-2 pm pm3"></div>
                                                        <div class="col-6 col-lg-2 pm pm4"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <hr class="border-dark" style="border-width: 3px;" />
                                </div>

                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12">
                                            <label class="form-label fw-bold" style="font-size: 20px;">Delevery Cost</label>
                                        </div>

                                        <div class="col-12 col-lg-6 border-end border-success">
                                            <div class="row">
                                                <div class="col-12 offset-0 offset-lg-1 col-lg-3">
                                                    <labe class="form-label">Delevery Cost Within Colombo</labe>
                                                </div>
                                                <div class="col-12 col-lg-8">
                                                    <div class="input-group mb-2 mt-2">
                                                        <span class="input-group-text">Rs.</span>
                                                        <input type="text" class="form-control" id="dwc" />
                                                        <span class="input-group-text">.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-lg-6">
                                            <div class="row">
                                                <div class="col-12 offset-0 offset-lg-1 col-lg-3">
                                                    <labe class="form-label">Delevery Cost Out Of Colombo</labe>
                                                </div>
                                                <div class="col-12 col-lg-8">
                                                    <div class="input-group mb-2 mt-2">
                                                        <span class="input-group-text">Rs.</span>
                                                        <input type="text" class="form-control" id="doc" />
                                                        <span class="input-group-text">.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-12">
                                    <hr class="boeder-dark" style="border-width: 3px;" />
                                </div>

                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12">
                                            <label class="form-label fw-bold" style="font-size: 20px;">Product Description</label>
                                        </div>
                                        <div class="col-12">
                                            <textarea cols="30" rows="15" class="form-control" id="desc"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <hr class="border-dark" style="border-width: 3px;" />
                                </div>

                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12">
                                            <label class="form-label fw-bold" style="font-size: 20px;">Add Product Images</label>
                                        </div>
                                        <div class="offset-lg-3 col-12 col-lg-6">
                                            <div class="row">
                                                <div class="col-4 border border-primary rounded">
                                                    <img src="resource/addproductimg.svg" class="img-fluid" style="height: 300px;" id="i0" />
                                                </div>
                                                <div class="col-4 border border-primary rounded">
                                                    <img src="resource/addproductimg.svg" class="img-fluid" style="height: 300px;" id="i1" />
                                                </div>
                                                <div class="col-4 border border-primary rounded">
                                                    <img src="resource/addproductimg.svg" class="img-fluid" style="height: 300px;" id="i2" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="offset-lg-3 col-12 col-lg-6 d-grid mt-3">
                                            <input type="file" class="d-none" id="imageuploader" multiple />
                                            <label for="imageuploader" class="col-12 btn btn-primary" onclick="changeProductImage();">Upload Images</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <hr class="boeder-dark" style="border-width: 3px;" />
                                </div>

                                <div class="col-12">
                                    <label class="form-label fw-bold" style="font-size: 20px;">Notice...</label><br />
                                    <label class="form-label">
                                        We are taking 5% of the product from price from every
                                        product as a service charge.
                                    </label>
                                </div>

                                <div class="offset-lg-4 col-12 col-lg-4 d-grid mt-3 mb-3">
                                    <button class="btn btn-success" onclick="addProduct();">Save Product</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            <?php

            } else {
                header("location:home.php");
            }

            ?>



            <?php include "footer.php"; ?>
        </div>
    </div>



    <script src="script.js"></script>
    <script src="bootstrap.bundle.js"></script>
</body>

</html>