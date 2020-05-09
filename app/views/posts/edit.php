<?php require APPROOT . '/views/special/headerS.php'; ?>

    <a href="<?php echo URL; ?>posts" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
    <div class="card card-body bg-light mt-5">
        <h2>Edit</h2>
        <p>Edit your post</p>
        <form action="<?php echo URL; ?>posts/edit/<?php echo $data['id']; ?>" method="post">
            <div class="form-group">
                <label for="title">Title: <sup>*</sup></label>
                <input type="text" name="title" class="form-control form-control-lg <?php echo (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['title']; ?>">
                <span class="invalid-feedback"><?php echo $data['title_err']; ?></span>
            </div>
            <div class="form-group">
                <label for="exampleFormControlFile1">Insert Photo</label>
                <input type="file" class="form-control-file" id="exampleFormControlFile1">
            </div>
            <div class="form-group">
                <label for="body">Body: <sup>*</sup></label>
                <textarea name="post" class="form-control form-control-lg <?php echo (!empty($data['post_err'])) ? 'is-invalid' : ''; ?>"><?php echo $data['post']; ?></textarea>
                <span class="invalid-feedback"><?php echo $data['post_err']; ?></span>
            </div>
            <div class="form-group">
                <label for="title">Price: <sup>*</sup></label>
                <input type="text" name="price" class="w-50 form-control form-control-lg <?php echo (!empty($data['price_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['price']; ?>">
                <span class="invalid-feedback"><?php echo $data['price_err']; ?></span>
            </div>
            <input type="submit" class="btn btn-success" value="Submit">
        </form>
    </div>

<?php require APPROOT . '/views/special/footerS.php'; ?>