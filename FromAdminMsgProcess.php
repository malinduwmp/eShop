<?php

session_start();
require "connection.php";

$admin = $_SESSION["au"]["email"];
$user = $_POST["e"];

$msg_rs = Database::search("SELECT * FROM chat WHERE chat.`to`='" . $user . "' AND `from`='" . $admin . "' 
OR chat.`from`='" . $user . "' AND `to`='" . $admin . "' ORDER BY chat.id ASC");
$msg_num = $msg_rs->num_rows;

for ($y = 0; $y < $msg_num; $y++) {
    $msg_data = $msg_rs->fetch_assoc();

    if ($msg_data["from"] == $admin) {

?>

        <!-- sent -->
        <div class="col-12 mt-2">
            <div class=" row">
                <div class="offset-4 col-8 rounded bg-primary">
                    <div class="row">

                        <div class="col-12 pt-2">
                            <span class="text-white fw-bold fs-4"><?php echo $msg_data["content"] ?></span>
                        </div>
                        <div class="col-12 text-end pb-2">
                            <span class="text-white fs-6"><?php echo $msg_data["date_time"] ?></span>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- sent -->




    <?php

    } else {

    ?>

        <!-- received -->
        <div class="col-12 mt-2">
            <div class=" row">
                <div class="col-8 rounded bg-success">
                    <div class="row">
                        <div class="col-12 pt-2 mt-1">
                            <span class="text-white fw-bold fs-4"><?php echo $msg_data["content"] ?></span>
                        </div>
                        <div class="col-12 text-end pb-2">
                            <span class="text-white fs-6"><?php echo $msg_data["date_time"] ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- received -->
<?php

    }
}

?>
