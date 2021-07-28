<div class="row">
    <div class="col-md-6">
        <img src="<?= base_url('vendor/Login/images/splashscreen.jpg'); ?>" class="img-thumbnail" alt="Splash Screen Login" style="width: 450px;">
    </div>

    
    <div class="col-md-6">
    <form method="post" action="<?= base_url('admin/uploadSplashLogin'); ?>" enctype="multipart/form-data">
        <div class="row">

            <label for="splash">Ubah Splash Screen Login</label>
            <div class="input-group">
                <input type="file" class="form-control" id="splash" aria-describedby="splash" aria-label="Upload" name="splash">
                <button class="btn btn-outline-primary" type="submit">Upload</button>
            </div>

        </div>
    </form>
    </div>
    

    
</div>
