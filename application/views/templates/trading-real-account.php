<section class="parallax-window parallax-window--trading-demo" data-image-src="<?php echo getImage($content->meta['parallax_image'], 'large', 'post') ;?>">
  <div class="container">
    <div class="row">
      <div class="col-md-9">
        <h3 class="parallax__title">
          <?php echo translate($this, $content->meta['parallax_title']) ;?>
        </h3>
        <p class="parallax__desc">
          <?php echo translate($this, $content->meta['parallax_description']) ;?>
        </p>
      </div>
      <div class="col-md-3">
        <ol class="breadcrumb">
          <li><a href="#">Home</a></li>
          <li><a href="#">Trading</a></li>
          <li class="active">Real Account</li>
        </ol>
      </div>
    </div>
  </div>
</section>

<div class="trading container ptl pbl">
  <div class="row">
    <div class="col-md-12">
      <h4 class="headtitle"><?php echo translate($this, $content->title);?></h4>
      <div class="seperator seperator--full mbl">
        <i class="icons icons--seperator"></i>
      </div>
      <?php echo translate($this, $content->content);?>
    </div>
  </div>
</div>

<section class="trading trading-step">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <ul class="trading-step--list">
          <li class="trading-step__item">
            <span class="trading-step__icons"><i class="icons icons-trading--registration"></i></span>
            <span class="trading-step__label">Registration</span>
          </li>
          <li class="trading-step__item">
            <span class="trading-step__icons"><i class="icons icons-trading--access"></i></span>
            <span class="trading-step__label">Access</span>
          </li>
          <li class="trading-step__item">
            <span class="trading-step__icons"><i class="icons icons-trading--trading"></i></span>
            <span class="trading-step__label">Trading</span>
          </li>
        </ul>
      </div>
    </div>
  </div>
</section>

<section class="trading trading-registration">
  <div class="container ptl pbl">
    <div class="row">
      <div class="col-md-12">
        <h4 class="headtitle">Registration</h4>
        <div class="seperator seperator--full mbl"><i class="icons icons--seperator"></i></div>
      </div>
      <div class="col-md-5">
        <form action="" method="post" class="form-horizontal" accept-charset="UTF-8">
          <div class="form-group">
            <label for="firstDeposit" class="col-sm-offset-1 col-sm-4 control-label">First deposit:</label>
            <div class="col-sm-6 col-sm-offset-1">
              <input type="text" class="form-control" id="firstDeposit" placeholder="" value="10 000 USD" disabled="disabled">
            </div>
          </div>
          <div class="form-group">
            <label for="firstName" class="col-sm-offset-1 col-sm-4 control-label">First name:</label>
            <div class="col-sm-6 col-sm-offset-1">
              <input type="text" class="form-control" id="firstName" placeholder="">
            </div>
          </div>
          <div class="form-group">
            <label for="lastName" class="col-sm-offset-1 col-sm-4 control-label">Last name:</label>
            <div class="col-sm-6 col-sm-offset-1">
              <input type="text" class="form-control" id="lastName" placeholder="">
            </div>
          </div>
          <div class="form-group">
            <label for="phone" class="col-sm-offset-1 col-sm-4 control-label">Phone:</label>
            <div class="col-sm-6 col-sm-offset-1">
              <input type="number" class="form-control" id="phone" placeholder="">
            </div>
          </div>
          <div class="form-group">
            <label for="country" class="col-sm-offset-1 col-sm-4 control-label">Country:</label>
            <div class="col-sm-6 col-sm-offset-1">
              <select name="country" class="select2" style="width: 100%;">
                <?php
                foreach ($country_list as $val) {
                  echo '<option value="'.$val.'">'.$val.'</option>';
                }
                ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="email" class="col-sm-offset-1 col-sm-4 control-label">Email:</label>
            <div class="col-sm-6 col-sm-offset-1">
              <input type="email" class="form-control" id="email" placeholder="">
            </div>
          </div>
          <div class="form-group">
            <label for="securityCode" class="col-sm-offset-1 col-sm-4 control-label">Security code:</label>
            <div class="col-sm-6 col-sm-offset-1">
              <div class="" id="captchaCode" placeholder="">
                <input type="text" class="form-control" id="securityCode" placeholder="">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-5 col-sm-7 text-right">
              <button type="submit" class="btn btn-lg btn-primary pll prl">Open</button>
            </div>
          </div>
        </form>
      </div>
      <div class="col-md-5 col-md-offset-1">
        <ul class="checklist mbm">
          <?php
            $detail = myExplode(translate($this, $themeOptions['detail_real_account']));
            foreach ($detail as $val){
              echo '<li><i class="glyphicon glyphicon-ok-circle"></i>'.$val.'</li>';
            }
          ?>
        </ul>
        <?php echo translate($this, $themeOptions['info_real_account']);?>
      </div>
    </div>
  </div>
</section>