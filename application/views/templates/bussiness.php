     <div class="parallax-window parallax-window--businnes" data-image-src="<?php echo getImage($content->meta['parallax_image'], 'large', 'post') ;?>">
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
              <li class="active">Businnes</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <section class="businnes bg-graffic">
      <div class="container businnes-container">
        <div class="row">
          <div class="col-md-4">
            <section class="businnes-content businnes-content--left">
              <h4 class="subheadline"><b>TRADING</b> <i class="icons icons--seperator icons--seperator--small"></i></h4>
              <ul class="businnes-gotolink">
                <li><a href="<?php echo myPermalink($this, $themeOptions['real_account']) ;?>">real account</a></li>
                <li><a href="<?php echo myPermalink($this, $themeOptions['demo_account']) ;?>">demo account</a></li>
                <li><a href="<?php echo myPermalink($this, $themeOptions['trading_instrument']) ;?>">trading  instrument</a></li>
                <li><a href="<?php echo myPermalink($this, $themeOptions['payment_method']) ;?>">payment method</a></li>
              </ul>
              <h4 class="subheadline"><b>invesment</b> <i class="icons icons--seperator icons--seperator--small"></i></h4>
              <ul class="businnes-gotolink">
                <li><a href="<?php echo myPermalink($this, $themeOptions['investment_program_1']) ;?>">invesment program 1</a></li>
                <li><a href="<?php echo myPermalink($this, $themeOptions['investment_program_2']) ;?>">invesment program 2</a></li>
              </ul>
            </section>
          </div>

          <div class="col-md-8">
            <div class="businnes-content businnes-content--right">
              <h4 class="subheadline"><?php echo translate($this, $content->title) ;?> <i class="icons icons--seperator icons--seperator--small"></i></h4>
                <?php echo translate($this, $content->content) ;?>
              <hr>

              <h4 class="subheadline"><?php echo translate($this, $themeOptions['title_participants_forex']) ;?><i class="icons icons--seperator icons--seperator--small"></i></h4>
              
              <ul class="businnes-participants row mbl">
                <?php
                  $participants = myExplode(translate($this, $themeOptions['participants_forex']));
                  foreach ($participants as $val) {
                    echo '<li class="col-md-6"><i class="glyphicon glyphicon-ok-circle"></i>'.$val.'</li>';
                  }
                ?>
              </ul>

              <h4 class="subheadline"><?php echo translate($this, $themeOptions['title_how_do_transactions']) ;?> <i class="icons icons--seperator icons--seperator--small"></i></h4>
              <p><?php echo translate($this, $themeOptions['how_do_transactions']) ;?></p>

              <a href="<?php echo myPermalink($this, $themeOptions['demo_account']) ;?>" class="btn btn-primary btn-lg">Open Demo Account</a>

              <hr>

              <h4 class="subheadline">Company Revenue <b>/ Profit Report</b> <i class="icons icons--seperator icons--seperator--small"></i></h4>

              <p>The turnover of the Forex market is growing every year!</p>

              <ul class="chart-info">
                <li><i class="fa fa-square icons--orange"></i> Revenue ($M)</li>
                <li><i class="fa fa-square icons--gray"></i> Profit ($M)</li>
              </ul>

              <div class="ct-chart ct-square"></div>

              <p>The turnover of the Forex market is growing every year. By now it is more than 4,5 trillion dollars. The currency exchange market has the highest liquidity of all financial markets and the profitability rises every year. The fast development of the internet has also developed trading possibilities on the Forex market. More and more investors are trading on the Forex market every year!</p>
            </div>
          </div>
        </div>
      </div>
    </section>