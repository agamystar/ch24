<?php
require_once "../views/layout/header.php";
?>
    <h4 class="text-center"><?php echo $title ?? ""; ?> </h4>
    <h4 class="text-center  text-success"><?php echo flash_session("msg"); ?> </h4>
    <br/>
    <div class="offset-1 col-sm-10   mt-5 pt-5 row">
        <?php foreach ($data as $one) { ?>
            <div class="row mt-4">
                <div class="col-sm-12 card">
                    <div class="card-body row">
                        <div class=" col-sm-2"><img src="blog.jpg" width="130" height="130"/></div>
                        <div class=" col-sm-10">
                            <h5 class="card-title"><?php echo $one["title"]; ?></h5>
                            <p class="card-text"><?php echo $one["body"]; ?></p>
                            <p class="card-text">Date : <?php echo $one["created_at"]; ?></p>
                            <p class="card-text">Author : <?php echo $one["name"]; ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <br/>

        <?php } ?>

    </div>

    </div>
<?php
require_once "../views/layout/footer.php";
?>