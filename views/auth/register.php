<?php
require_once   "../views/layout/header.php";
?>
    <h4 class="text-center"><?php echo $title ?? ""; ?> </h4>
    <br/>
    <h4 class="text-center  text-success"><?php echo flash_session("msg") ?? ""; ?> </h4>
    <br/>
    <form class="offset-3 col-sm-6   mt-5 pt-5 " action="/auth/register" method="post">
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Name </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="name" value="<?php echo old("name"); ?>">
                <?php if (error('name')) { ?>
                    <div class="invalid-feedback d-flex"> <?php echo error('name'); ?>  </div><?php } ?>

            </div>
        </div>

        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="email" value="<?php echo old("email"); ?>">
                <?php if (error('email')) { ?>
                    <div class="invalid-feedback d-flex"> <?php echo error('email'); ?>  </div><?php } ?>

            </div>
        </div>

        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" name="password" value="<?php echo old("password"); ?>">
                <?php if (error('password')) { ?>
                    <div class="invalid-feedback d-flex"> <?php echo error('password'); ?>  </div><?php } ?>

            </div>
        </div>


        <div class="mb-3 row">
            <label class="col-sm-2 form-label"></label>
            <div class="col-sm-10">
                <button class="btn btn-primary" type="submit">Register</button>
            </div>
        </div>

    </form>

<?php
require_once  "../views/layout/footer.php";
?>