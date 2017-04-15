    <section class="generate-new-password">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-md-offset-3">
            <div class="generate-new-password-content">
              <h2 class="generate-new-password__title"><?php echo translate($this, $content->title) ;?></h2>
              <form action="" class="generate-new-password-form">
                <div class="form-group">
                  <input type="password" name="password-old" class="form-control font-montserrat--light" value="" placeholder="Current password">
                </div>
                <div class="form-group">
                  <input type="password" name="password-new" class="form-control font-montserrat--light" value="" placeholder="New password">
                </div>
                <button type="submit" class="btn btn-primary btn-block btn-lg font-montserrat text-uppercase">Save password</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>