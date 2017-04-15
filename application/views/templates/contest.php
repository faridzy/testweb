   <section class="parallax-window parallax-window--contest contest-section--header" data-image-src="<?php echo getImage($content->meta['parallax_image'], 'large', 'post') ;?>">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="parallax-box"> 
              <h4>
                <?php echo translate($this, $content->meta['parallax_title']) ;?>
              </h4>
              <?php echo translate($this, $content->meta['parallax_description']) ;?>
            </div>
          </div>
          <div class="col-md-6">
            <ol class="breadcrumb">
              <li><a href="#">Home</a></li>
              <li class="active">Contest</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <section class="contest-section--step">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <ul class="contest-step">
              <li class="contest-step__item"><a href="#">About Forex Contest</a></li>
              <li class="contest-step__item"><a href="#">HOW TO BEGIN</a></li>
              <li class="contest-step__item"><a href="#">TERMS</a></li>
              <li class="contest-step__item"><a href="#">START REGISTRATION</a></li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <section class="contest-section--about">
      <div class="container">
        <div class="row">
          <div class="col-md-6">            
            <?php echo translate($this, $themeOptions['cnts_about']) ;?>
          </div>
          <div class="col-md-6">
            <?php echo translate($this, $themeOptions['cnts_real_price']) ;?>
          </div>
        </div>
        <div class="row mtl">
          <div class="col-md-12 text-center">
            <h4 class="contest__headline mbs">The more participants are, <b>the greater the prize fund is!</b></h4>
            <div class="seperator seperator--full mbm">
              <i class="icons icons--seperator icons--seperator--small"></i>
            </div>
            <img src="<?php echo site_url("dist/images/icon-thorpy.png"); ?>" class="img-responsive block-center" alt="">
          </div>
        </div>
      </div>
    </section>

    <section class="parallax-contest contest-section--part" data-image-src="<?php echo getImage($themeOptions['parallax_body_contest'], 'large', 'post');?>">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h4 class="contest__headline color-white mbs">How to take part <b>in the Contest?</b></h4>
            <div class="seperator seperator--full mbm">
              <i class="icons icons--seperator icons--seperator--small"></i>
            </div>
            <?php
              echo translate($this, $themeOptions['cnts_how_to']);
            ?>
            <ul class="contest-part">
              <li class="contest-part__item">
                <span class="contest-part__icons"><i class="icons icons--signin"></i></span>
                <span class="contest-part__title">Sign in</span>
              </li>
              <li class="contest-part__item">
                <span class="contest-part__icons"><i class="icons icons--account"></i></span>
                <span class="contest-part__title">Create your account</span>
              </li>
              <li class="contest-part__item">
                <span class="contest-part__icons"><i class="icons icons--fee"></i></span>
                <span class="contest-part__title">Pay 5USD participation fee </span>
              </li>
              <li class="contest-part__item">
                <span class="contest-part__icons"><i class="icons icons--contest"></i></span>
                <span class="contest-part__title">Take part in the contest</span>
              </li>
            </ul>
            <button type="button" class="mtm btn btn-primary">Start Registration</button>
          </div>
        </div>
      </div>
    </section>
    <section class="contest-section--terms">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mbl">
            <h4 class="contest__headline text-center mbs">Terms of <b>Participants</b></h4>
            <div class="seperator seperator--full mbm">
              <i class="icons icons--seperator icons--seperator--small"></i>
            </div>
            <?php echo translate($this, $themeOptions['cnts_term_part']) ;?>
          </div>
        </div>
        <div class="row">
          <div class="col-md-5">
            <h4 class="contest__subheadline">The beginning and <b>the end of the Contest</b></h4>
            <ul class="checklist">
              <?php
                $begins = myExplode(translate($this, $themeOptions['cnts_begin_end']));
                foreach ($begins as $val) {
                  echo '<li><i class="glyphicon glyphicon-ok-circle"></i>'.$val.'</li>';
                }
              ?>            
            </ul>
          </div>
          <div class="col-md-3">
            <h4 class="contest__subheadline">Terms of <b>trading</b></h4>
            <ul class="checklist">
            <?php
              $terms = myExplode(translate($this, $themeOptions['cnts_term_trade']));
              foreach ($terms as $val) {
                echo '<li><i class="glyphicon glyphicon-ok-circle"></i>'.$val.'</li>';
              }
            ?>
            </ul>
          </div>
          <div class="col-md-4">
            <h4 class="contest__subheadline">You are not <b>allowed to</b></H4>
            <ul class="checklist">
            <?php
              $notAlllow = myExplode(translate($this, $themeOptions['cnts_not_allow']));
              foreach ($notAlllow as $val) {
                echo '<li><i class="glyphicon glyphicon-remove-circle"></i>'.$val.'</li>';
              }
            ?>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <section class="contest-section--desc">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h4 class="contest__subheadline">Defining <b>A winner</b><i class="icons icons--seperator icons--seperator--small"></i></h4>
            <?php echo translate($this, $themeOptions['cnts_define_win']) ;?>
          </div>
          <div class="col-md-6">
            <h4 class="contest__subheadline">Prize<b>fund</b><i class="icons icons--seperator icons--seperator--small"></i></h4>
            <?php echo translate($this, $themeOptions['cnts_prize_fund']) ;?>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <h4 class="contest__subheadline">Disputes and <b>Complaints</b><i class="icons icons--seperator icons--seperator--small"></i></h4>
            <?php echo translate($this, $themeOptions['cnts_complaint']) ;?>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <h4 class="contest__subheadline">How to receive <b>the prize</b><i class="icons icons--seperator icons--seperator--small"></i></h4>
            <?php echo translate($this, $themeOptions['cnts_receive_prize']) ;?>
          </div>
          <div class="col-md-6">
            <h4 class="contest__subheadline"><b>Miscellaneous</b><i class="icons icons--seperator icons--seperator--small"></i></h4>
            <?php echo translate($this, $themeOptions['cnts_miscellaneous']) ;?>
          </div>
        </div>
      </div>
    </section>