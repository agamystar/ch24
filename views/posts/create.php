<?php
require_once   "../views/layout/header.php";
?>

    <h4 class="text-center"><?php echo $title ?? ""; ?>  </h4>
    <br/>
    <h4 class="text-center text-success"><?php echo flash_session("msg"); ?> </h4>
    <form class="offset-2 col-sm-8   mt-5 pt-5 " action="/post/store" method="post" enctype="multipart/form-data">
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Title</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="title" value="<?php echo old("title"); ?>">
                <?php if (error('title')) { ?>
                    <div class="invalid-feedback d-flex"> <?php echo error('title'); ?>  </div><?php } ?>
            </div>
        </div>

        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-10">
                <textarea class="form-control" name="body" rows="8"><?php echo old("body") ?></textarea>
                <?php if (error('body')) { ?>
                    <div class="invalid-feedback d-flex"> <?php echo error('body'); ?>  </div><?php } ?>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="formFileSm" class="col-sm-2 form-label"></label>
            <div class="col-sm-10">
                <button class="btn btn-primary" type="submit">Save</button>
            </div>
        </div>

    </form>

<?php
require_once   "../views/layout/footer.php";
?>