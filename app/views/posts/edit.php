
<?php require APPROOT . '/views/inc/header.php'; ?>
<!-- start content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10  mx-auto">
                <div class="card card-body bg-light ">
                    
                    <h5>Naw Post</h5>
                    <form action="<?php echo URLROOT; ?>/posts/edit/<?php echo $data['id']; ?>"  method="POST" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label for="title" class="col-sm-2 col-form-label">Title :<sup>*</sup></label>
                            <div class="col-sm-10">
                                <input type="text" name="title" class="form-control form-control-lg <?php echo (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['title']; ?>" id="title">
                                <span class="invalid-feedback"><?php echo $data['title_err']; ?></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="category" class="col-sm-2 col-form-label">category :<sup>*</sup></label>
                            <div class="col-sm-10">
                                <input type="text" name="category" class="form-control form-control-lg <?php echo (!empty($data['category_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['category']; ?>" id="category">
                                <span class="invalid-feedback"><?php echo $data['category_err']; ?></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="image" class="col-sm-2 col-form-label">Image :<sup>*</sup></label>
                            <div class="col-sm-10">
                                <input type="file" name="image" class="form-control form-control-lg <?php echo (!empty($data['image_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['image']; ?>" id="image">
                                <span class="invalid-feedback"><?php echo $data['image_err']; ?></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="content" class="col-sm-2 col-form-label">Content :<sup>*</sup></label>
                            <div class="col-sm-10">
                                <textarea name="content" id="content" rows="5" class="form-control form-control-lg <?php echo (!empty($data['content_err'])) ? 'is-invalid' : ''; ?>" id="content"><?php echo $data['content']; ?></textarea>
                                <span class="invalid-feedback"><?php echo $data['content_err']; ?></span>
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