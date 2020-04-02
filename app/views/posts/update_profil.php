
<?php require APPROOT . '/views/inc/header.php'; ?>
<!-- start content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10  mx-auto">
                <div class="card card-body bg-light ">
                    
                    <h5>Naw Post </h5>
                    <form action="<?php echo URLROOT; ?>/posts/update_profil/<?php echo $_SESSION['user_id']; ?>"  method="POST" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">name :<sup>*</sup></label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control form-control-lg <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['name']; ?>" id="name">
                                <span class="invalid-feedback"><?php echo $data['name_err']; ?></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="photo" class="col-sm-2 col-form-label">photo :<sup>*</sup></label>
                            <div class="col-sm-10">
                                <input type="file" name="photo" class="form-control form-control-lg <?php echo (!empty($data['photo_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['photo']; ?>" id="photo">
                                <span class="invalid-feedback"><?php echo $data['photo_err']; ?></span>
                            </div>
                        </div>
                        <div class="div-but">
                            <input type="submit"  class="btn btn-success" value="submit">
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- end content -->
<?php require APPROOT . '/views/inc/footer.php'; ?>