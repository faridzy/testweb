    <section class="parallax-window parallax-window--about" data-image-src="<?php echo getImage($content->meta['parallax_image'], 'large', 'post') ;?>">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h3 class="parallax__title">
              <?php echo translate($this, $content->meta['parallax_title']) ;?>  
            </h3>
            <p class="parallax__desc">
              <?php echo translate($this, $content->meta['parallax_description']) ;?>
            </p>
          </div>
          <div class="col-md-6">
            <ol class="breadcrumb">
              <li><a href="<?php echo base_url();?>">Home</a></li>
              <li class="active">default</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <section class="about-us-container bg-graffic">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h4 class="headtitle"><?php echo translate($this, $content->title) ;?></h4>
            <div class="seperator seperator--full">
              <i class="icons icons--seperator icons--seperator--small"></i>
            </div>
            <div class="about-us-content">
            <center>
              <?php echo translate($this, $content->content) ;?>
            </center>
            </div>
          </div>
        </div>
      </div>
    </section>