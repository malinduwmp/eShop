<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <title>User Profile | eShop</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <link rel="icon" href="resource/logo.svg" />

</head>

<body>

    <div class="container-fluid">
        <div class="row">

            <?php include "header.php"; ?>

            <?php

            require "connection.php";

            if (isset($_SESSION["u"])) {

                $email = $_SESSION["u"]["email"];

                $details_rs = Database::search("SELECT * FROM `user` INNER JOIN `gender` ON
                gender.id = user.gender_id WHERE `email`='" . $email . "'");

                $image_rs = Database::search("SELECT * FROM `profile_image` WHERE `user_email`='" . $email . "'");

                $address_rs = Database::search("SELECT * FROM `user_has_address` INNER JOIN `city` ON
                user_has_address.city_id = city.id INNER JOIN `district` ON
                city.district_id = district.id INNER JOIN `province` ON
                district.province_id = province.id WHERE `user_email` = '" . $email . "'");

                $data = $details_rs->fetch_assoc();
                $image_data = $image_rs->fetch_assoc();
                $address_data = $address_rs->fetch_assoc();


             ?>

                <div class="col-12 bg-primary">
                    <div class="row">

                        <div class="col-12 bg-body rounded mt-4 mb-4">
                            <div class="row g-2">

                                <div class="col-md-3 border-end">
                                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">

                                        <?php

                                        if (empty($image_data["path"])) {

                                        ?>
                                            <img src="resource/profile_img/new_user.svg" class="mt-5 rounded-circle" style="width: 150px;" id="viewImg"/>
                                        <?php

                                        } else {

                                        ?>
                                            <img src="<?php echo $image_data["path"]; ?>" class="mt-5 rounded-circle" style="width: 150px;" id="viewImg"/>
                                        <?php

                                        }

                                        ?>


                                        <span class="fw-bold"><?php echo $data["fname"] . " " . $data["lname"]; ?></span>
                                        <span class="fw-bold text-black-50"><?php echo $data["email"]; ?></span>

                                        <input type="file" class="d-none" id="profileimg" accept="image/*" />
                                        <label for="profileimg" class="btn btn-primary mt-5" onclick="changeImage();">Update Profile image</label>

                                    </div>
                                </div>

                                <div class="col-md-5 border-end">
                                    <div class="p-3 py-3">

                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <h4 class="fw-bold">Profile Settings</h4>
                                        </div>

                                        <div class="row mt-4">

                                            <!-- first name -->
                                            <div class="col-12 col-lg-6">
                                                <lable class="form-label">First Name</lable>
                                                <input type="text" class=" form-control" value="<?php echo $data["fname"]; ?>" id="fname" />
                                            </div>
                                            <!-- first name -->


                                            <!-- last name -->
                                            <div class="col-12 col-lg-6">
                                                <lable class="form-label">Last Name</lable>
                                                <input type="text" class=" form-control" value="<?php echo $data["lname"]; ?>" id="lname" />
                                            </div>
                                            <!-- last name -->

                                            <!-- mobile -->
                                            <div class="col-12 pt-2">
                                                <lable class="form-label">Mobile</lable>
                                                <input type="text" class=" form-control" value="<?php echo $data["mobile"]; ?>" id="mobile" />
                                            </div>
                                            <!-- mobile -->

                                            <!-- password -->
                                            <div class="col-12 pt-2">
                                                <lable class="form-label">Password</lable>
                                                <div class="input-group">
                                                    <input type="password" class="form-control" readonly aria-label="Recipient's username" aria-describedby="basic-addon2" value="<?php echo $data["password"]; ?>" >
                                                    <span class="input-group-text bg-secondary" id="basic-addon2">
                                                        <i class="bi bi-eye-slash-fill text-white"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <!-- password -->


                                            <!-- email -->
                                            <div class="col-12 pt-2">
                                                <lable class="form-label">Email</lable>
                                                <input type="text" class=" form-control" readonly value="<?php echo $data["email"]; ?>" />
                                            </div>
                                            <!-- email -->


                                            <!-- register date -->
                                            <div class="col-12 pt-2">
                                                <lable class="form-label">Registered Date</lable>
                                                <input type="text" class=" form-control" readonly value="<?php echo $data["joined_date"]; ?>" />
                                            </div>
                                            <!-- register date -->


                                            <!-- address line 01 -->
                                            <?php
                                            if (!empty($address_data["line1"])) {

                                            ?>

                                                <div class="col-12 pt-2">
                                                    <lable class="form-label">Address line 1</lable>
                                                    <input type="text" class=" form-control" value="<?php echo $address_data["line1"]; ?>"  id="line1"/>
                                                </div>


                                            <?php

                                            } else {

                                            ?>

                                                <div class="col-12 pt-2">
                                                    <lable class="form-label">Address line 1</lable>
                                                    <input type="text" class=" form-control" id="line1"/>
                                                </div>

                                            <?php

                                            }

                                            ?>
                                            <!-- address line 01 -->


                                            <!-- address line 02 -->
                                            <?php
                                            if (!empty($address_data["line2"])) {

                                            ?>

                                                <div class="col-12 pt-2">
                                                    <lable class="form-label">Address line 2</lable>
                                                    <input type="text" class=" form-control" value="<?php echo $address_data["line2"]; ?>" id="line2" />
                                                </div>


                                            <?php

                                            } else {

                                            ?>

                                                <div class="col-12 pt-2">
                                                    <lable class="form-label">Address line 2</lable>
                                                    <input type="text" class=" form-control" id="line2"/>
                                                </div>

                                            <?php

                                            }

                                            ?>
                                            <!-- address line 03 -->

                                            <?php

                                            $province_rs = Database::search("SELECT * FROM `province`");
                                            $district_rs = Database::search("SELECT * FROM `district`");
                                            $city_rs = Database::search("SELECT * FROM `city`");

                                            ?>


                                            <!-- province -->
                                            <div class="col-12 col-lg-6 pt-2">
                                                <lable class="form-label">Province</lable>
                                                <select class="form-select" id="province">

                                                    <option value="0">Select Province</option>

                                                    <?php

                                                    $province_num = $province_rs->num_rows;
                                                    for ($x = 0; $x < $province_num; $x++) {
                                                        $province_data = $province_rs->fetch_assoc();
                                                    ?>

                                                        <option value="<?php echo $province_data["id"]; ?>" <?php
                                                                                                            if (!empty($address_data["province_id"])) {
                                                                                                                if ($province_data["id"] == $address_data["province_id"]) {
                                                                                                            ?> selected <?php
                                                                                                                    }
                                                                                                                } ?>><?php echo $province_data["province_name"]; ?></option>

                                                    <?php
                                                    }

                                                    ?>

                                                </select>
                                            </div>
                                            <!-- province -->


                                            <!-- district -->
                                            <div class="col-12 col-lg-6 pt-2">
                                                <lable class="form-label">District</lable>
                                                <select class="form-select" id="district">
                                                    <option value="0">Select District</option>

                                                    <?php

                                                    $district_num = $district_rs->num_rows;
                                                    for ($x = 0; $x < $district_num; $x++) {
                                                        $district_data = $district_rs->fetch_assoc();
                                                    ?>

                                                        <option value="<?php echo $district_data["id"]; ?>" <?php
                                                                                                            if (!empty($address_data["district_id"])) {
                                                                                                                if ($district_data["id"] == $address_data["district_id"]) {
                                                                                                            ?> selected <?php
                                                                                                                    }
                                                                                                                } ?>><?php echo $district_data["district_name"]; ?></option>

                                                    <?php
                                                    }

                                                    ?>
                                                </select>
                                            </div>
                                            <!-- district -->


                                            <!-- city -->
                                            <div class="col-12 col-lg-6 pt-2">
                                                <lable class="form-label">City</lable>
                                                <select class="form-select" id="city">
                                                    <option value="0">Select City</option>

                                                    <?php

                                                    $city_num = $city_rs->num_rows;
                                                    for ($x = 0; $x < $city_num; $x++) {
                                                        $city_data = $city_rs->fetch_assoc();
                                                    ?>
                                                        <option value="<?php echo $city_data["id"]; ?>" <?php
                                                                                                            if (!empty($address_data["city_id"])) {
                                                                                                                if ($city_data["id"] == $address_data["city_id"]) {
                                                                                                            ?> selected <?php
                                                                                                                    }
                                                                                                                } ?>><?php echo $city_data["city_name"]; ?></option>

                                                    <?php
                                                    }

                                                    ?>
                                                </select>
                                            </div>
                                            <!-- city -->



                                            <!-- postal-code -->
                                            <?php

                                            if (!empty($address_data["postal_code"])) {

                                            ?>

                                                <div class="col-12 col-lg-6 pt-2">
                                                    <lable class="form-label">Postal-code</lable>
                                                    <input type="text" class=" form-control" value="<?php echo $address_data["postal_code"]; ?>" id="pcode" />
                                                </div>


                                            <?php

                                            } else {

                                            ?>

                                                <div class="col-12 col-lg-6 pt-2">
                                                    <lable class="form-label">postal_code</lable>
                                                    <input type="text" class=" form-control" id="pcode" />
                                                </div>

                                            <?php

                                            }

                                            ?>
                                            <!-- postal-code -->



                                            <!-- gender -->
                                            <div class="col-12 pt-2">
                                                <lable class="form-label">Gender</lable>
                                                <input type="text" class="form-control" readonly value="<?php echo $data["gender_name"]; ?>" />
                                            </div>
                                            <!-- gender -->

                                            <!-- update my profile -->
                                            <div class="col-12 d-grid mt-3 pt-2">
                                                <button class="btn btn-primary" onclick="updateProfile();">Update My Profile</button>
                                            </div>
                                            <!-- update my profile -->

                                        </div>
                                    </div>
                                </div>

                                <!-- ads -->
                                <div class="col-md-4 text-center">
                                    <div class="row">
                                        <span class="mt-5 fw-bold text-black-50">Display ads</span>
                                    </div>
                                </div>
                                <!-- ads -->

                            </div>
                        </div>

                    </div>
                </div>


            <?php

            } else {
                header("Location:http://localhost/eshop/home.php");
            }

            ?>


            <?php include "footer.php"; ?>

        </div>
    </div>



    <script src="bootstrap.js"></script>
    <script src="bootstrap.bundle.js"></script>
</body>

</html>