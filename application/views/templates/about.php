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
              <li class="active">About Us</li>
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

        <hr>
        
        <div class="row">
          <div class="col-md-7">
            <p class="about-us__desc"><?php echo translate($this, $themeOptions['more_about']);?></p>
          </div>
          <div class="col-md-5">
            <div class="about-us__link">
              <a href="<?php echo myPermalink($this, $themeOptions['term_of_trading']) ;?>" class="btn btn-primary"><i class="icons icons--trade"></i>Term Of Trading</a>
              <a href="<?php echo myPermalink($this, $themeOptions['payment_of_solution']) ;?>" class="btn btn-primary"><i class="icons icons--card"></i>Payment Solution</a>
              <a href="<?php echo myPermalink($this, $themeOptions['investment']) ;?>" class="btn btn-primary"><i class="icons icons--money"></i>Invesment</a>
              <a href="<?php echo myPermalink($this, $themeOptions['demo_account']) ;?>" class="btn btn-primary"><i class="icons icons--computer"></i>Demo Account</a>
              <a href="<?php echo myPermalink($this, $themeOptions['payment_of_solution']) ;?>" class="btn btn-primary"><i class="icons icons--payment"></i>Payment Solution</a>
              <a href="<?php echo myPermalink($this, $themeOptions['partnership_program']) ;?>" class="btn btn-primary"><i class="icons icons--partner"></i>Partnership Program</a>
            </div>
          </div>
        </div>

        <hr>

        <div class="row">
          <div class="col-md-12">
            <div class="about-us-partner row">
              <div class="col-md-2">
                <h4 class="about-us-partner__title">Partners</h4>
              </div>
              <div class="col-md-10">
                <img class="about-us-partner__image" src="<?php echo site_url("dist/images/icon-partner.jpg"); ?>" class="img-responsive">
              </div>
            </div>
          </div>
        </div>

        <hr>

        <div class="row mtl">
          <div class="col-md-12">
            <h4 class="headtitle">Having <b>questions?</b></h4>
            <h5 class="subheadtitle">Contact any of our departments!</h5>
            <div class="seperator seperator--full">
              <i class="icons icons--seperator icons--seperator--small"></i>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-3">
            <div class="question-box">
              <h4 class="question-box__title">General<br>questions</h4>
              <div class="question-box__icons">
                <i class="icons icons--comment"></i>
              </div>
              <div class="question-box--info">
                <span class="question-box__info"><?php echo $themeOptions['general_email'] ;?></span>
                <span class="question-box__info"><?php echo $themeOptions['general_phone'] ;?></span>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="question-box">
              <h4 class="question-box__title">Technical<br>questions</h4>
              <div class="question-box__icons">
                <i class="icons icons--gear"></i>
              </div>
              <div class="question-box--info">
                <span class="question-box__info"><?php echo $themeOptions['technical_email'] ;?></span>
                <span class="question-box__info"><?php echo $themeOptions['technical_phone'] ;?></span>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="question-box">
              <h4 class="question-box__title">Financial<br>questions</h4>
              <div class="question-box__icons">
                <i class="icons icons--user"></i>
              </div>
              <div class="question-box--info">
                <span class="question-box__info"><?php echo $themeOptions['financial_email'] ;?></span>
                <span class="question-box__info"><?php echo $themeOptions['financial_phone'] ;?></span>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="question-box">
              <h4 class="question-box__title">Partnership<br>questions</h4>
              <div class="question-box__icons">
                <i class="icons icons--people"></i>
              </div>
              <div class="question-box--info">
                <span class="question-box__info"><?php echo $themeOptions['partnership_email']; ?></span>
                <span class="question-box__info"><?php echo $themeOptions['partnership_phone']; ?></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
