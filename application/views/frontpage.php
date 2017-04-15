 <?php
 $slider = mySlider($this,$sliders);
 ?>
<section class="slider-homepage">
<?php echo $slider['slider'];?>
</section>
<section class="slider-homepage--action">
<div class="slider-nav">
  <div class="container">
     <ul class="slider-nav-row slider-nav--action">
     <?php echo $slider['nav'] ;?>
     </ul>
  </div>
</div>
</section>

<section class="benefit benefit--homepage">
  <div class="benefit-container bg-grafity bg-iphone">
    <div class="container">
      <div class="benefit-content">
        <center>
          <div class="col-md-8 col-md-offset-2">
            <?php echo translate($this, $content->content) ;?>
          </div>
        </center>

        
        <div class="seperator seperator--full"><i class="icons icons--seperator"></i></div>

        <div class="benefit-feature">
          <ul class="benefit-feature-list">
            <li class="benefit-feature-list__item">
              <span class="benefit-feature__label">Minimal <b>Deposit</b></span>
              <span class="benefit-feature__value">1$</span></li>
            <li class="benefit-feature-list__item">
              <span class="benefit-feature__label">Spreads <b>From</b></span>
              <span class="benefit-feature__value">0.0</span></li>
            <li class="benefit-feature-list__item">
              <span class="benefit-feature__label">Execution <b>Time</b></span>
              <span class="benefit-feature__value">0.01 SEC</span></li>
            <li class="benefit-feature-list__item">
              <span class="benefit-feature__label">Client <b>Support</b></span>
              <span class="benefit-feature__value">24/5</span></li>
            <li class="benefit-feature-list__item">
              <span class="benefit-feature__label"><b>Leverage</b></span>
              <span class="benefit-feature__value">1:500</span></li>
            <li class="benefit-feature-list__item">
              <span class="benefit-feature__label">Minimal <b>Lot</b></span>
              <span class="benefit-feature__value">0.01</span></li>
            <li class="benefit-feature-list__item">
              <span class="benefit-feature__label">Execution <b>Type</b></span>
              <span class="benefit-feature__value">STP</span></li>
            <li class="benefit-feature-list__item">
              <span class="benefit-feature__label">Execution <b>Type2</b></span>
              <span class="benefit-feature__value">NDD</span></li>
          </ul>
        </div>

        <div class="row">
          <div class="col-md-4 benefit-info">
            <h4 class="benefit-info__title"><span>Quality</span></h4>
            <ul class="benefit-info-list">
            <?php
              foreach ($quality as $q){
                echo '<li class="benefit-info__item"><i class="fa fa-check"></i>'.$q.'</li>';
              }
            ?>
            </ul>
          </div>
          <div class="col-md-4 col-md-offset-4 benefit-info">
            <h4 class="benefit-info__title"><span>Reliability</span></h4>
            <ul class="benefit-info-list">
            <?php
              foreach ($reliability as $r){
                echo '<li class="benefit-info__item"><i class="fa fa-plus"></i>'.$r.'</li>';
              }
            ?>
            </ul>
          </div>
        </div>
        
      </div>
    </div>
  </div>
</section>

<section class="our-services our-services--homepage parallax" data-image-src="<?php echo getImage($general['parallax_body_homepage'], 'large', 'post')?>">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h4 class="our-services__title">Our <b>Services</b> <i class="icons icons--seperator icons--block"></i></h4>

        <div class="slider-services">
          <a href="<?php echo myPermalink($this, $general['link_copy_trade'] );?>">        
          <div class="slider-services-item">
            <div class="our-services-box">
              <div class="our-services__icon">
                <i class="icons icons--graffic"></i>
              </div>
              <div class="our-services__label">
                WCIFX Copy Trade
              </div>
            </div>
          </div>
          </a>
          <a href="<?php echo myPermalink($this, $general['link_investment']) ;?>">          
          <div class="slider-services-item">
            <div class="our-services-box">
              <div class="our-services__icon">
                <i class="icons icons--moneys"></i>
              </div>
              <div class="our-services__label">
                WCIFX Investment
              </div>
            </div>
          </div>
          </a>
          <a href="<?php echo myPermalink($this, $general['link_contest']) ;?>">          
          <div class="slider-services-item">
            <div class="our-services-box">
              <div class="our-services__icon">
                <i class="icons icons--rewards"></i>
              </div>
              <div class="our-services__label">
                WCIFX Contest
              </div>
            </div>
          </div>
          </a>
          <a href="<?php echo myPermalink($this, $general['link_about']) ;?>">          
          <div class="slider-services-item">
            <div class="our-services-box">
              <div class="our-services__icon">
                <i class="icons icons--computers"></i>
              </div>
              <div class="our-services__label">
                WCIFX
              </div>
            </div>
          </div>
          </a>          
        </div>
      </div>
    </div>
  </div>
</section>
