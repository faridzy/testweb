    <section class="parallax-window parallax-window--investment-01" data-image-src="<?php echo getImage($content->meta['parallax_image'], 'large', 'post') ;?>">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <div class="investment-header">
            <h1>
              <?php echo translate($this, $content->meta['parallax_title']) ;?>
            </h1>
              <?php echo translate($this, $content->meta['parallax_description']) ;?>
              <button class="btn btn-primary btn-sm">Open Account</button>
            </div>
          </div>
          <div class="col-md-4">
            <ol class="breadcrumb">
              <li><a href="#">Home</a></li>
              <li><a href="#">Invesment</a></li>
              <li class="active">Invesment Program #01</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <section class="investment-headline">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h3>Transparency and stability ensure that your resources and earnings last!</h3>
            <div class="seperator seperator--full">
              <i class="icons icons--seperator"></i>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="investment-benefit">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h4 class="headline">Invesment <b>Program</b> <i class="icons icons--seperator icons--seperator--small"></i></h4>
            <div class="col-md-8">
              <button type="button" class="btn btn-block btn-primary btn-lg mbs">Become MT4 Signal Provider</button>
              <button type="button" class="btn btn-block btn-primary btn-lg">Become MT4 Signal Copier</button>
            </div>
          </div>
          <div class="col-md-6">
            <h4 class="headline">Benefits <i class="icons icons--seperator icons--seperator--small"></i></h4>
            <ul class="checklist">
              <?php
                $benefits = myExplode(translate($this, $themeOptions['benefits_investment']));
                foreach ($benefits as $val) {
                  echo '<li><i class="circle fa fa-angle-right"></i>'.$val.'</li>';
                }
              ?>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <!-- <> -->
    <section class="investment-trader">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <div class="investment-trader-box">
              <h4 class="investment-trader__title">Meta Trader 4 Top 5 Signals</h4>
              <table class="table investment-trader-table">
                <tbody>
                  <tr class="text-center">
                    <td>
                      <i class="fa fa-bar-chart fa-2x"></i>
                      <h5>BORO</h5>
                    </td>
                    <td>
                      <dl>
                        <dt>1339%</dt>
                        <dd>Growth</dd>
                      </dl>
                    </td>
                    <td>
                      <dl>
                        <dt>31</dt>
                        <dd>Subscribers</dd>
                      </dl>
                    </td>
                    <td>
                      <dl>
                        <dt>45</dt>
                        <dd>Weeks</dd>
                      </dl>
                    </td>
                    <td>
                      <dl>
                        <dt>125</dt>
                        <dd>Traders</dd>
                      </dl>
                    </td>
                    <td>
                      <dl>
                        <dt>57%</dt>
                        <dd>Win</dd>
                      </dl>
                    </td>
                    <td>
                      <dl>
                        <dt>3.41</dt>
                        <dd>Profil Factor</dd>
                      </dl>
                    </td>
                    <td>
                      <dl>
                        <dt>14</dt>
                        <dd>Maxx DD</dd>
                      </dl>
                    </td>
                  </tr>
                  <tr class="text-center">
                    <td>
                      <i class="fa fa-bar-chart fa-2x"></i>
                      <h5>BORO</h5>
                    </td>
                    <td>
                      <dl>
                        <dt>1339%</dt>
                        <dd>Growth</dd>
                      </dl>
                    </td>
                    <td>
                      <dl>
                        <dt>31</dt>
                        <dd>Subscribers</dd>
                      </dl>
                    </td>
                    <td>
                      <dl>
                        <dt>45</dt>
                        <dd>Weeks</dd>
                      </dl>
                    </td>
                    <td>
                      <dl>
                        <dt>125</dt>
                        <dd>Traders</dd>
                      </dl>
                    </td>
                    <td>
                      <dl>
                        <dt>57%</dt>
                        <dd>Win</dd>
                      </dl>
                    </td>
                    <td>
                      <dl>
                        <dt>3.41</dt>
                        <dd>Profil Factor</dd>
                      </dl>
                    </td>
                    <td>
                      <dl>
                        <dt>14</dt>
                        <dd>Maxx DD</dd>
                      </dl>
                    </td>
                  </tr>
                  <tr class="text-center">
                    <td>
                      <i class="fa fa-bar-chart fa-2x"></i>
                      <h5>BORO</h5>
                    </td>
                    <td>
                      <dl>
                        <dt>1339%</dt>
                        <dd>Growth</dd>
                      </dl>
                    </td>
                    <td>
                      <dl>
                        <dt>31</dt>
                        <dd>Subscribers</dd>
                      </dl>
                    </td>
                    <td>
                      <dl>
                        <dt>45</dt>
                        <dd>Weeks</dd>
                      </dl>
                    </td>
                    <td>
                      <dl>
                        <dt>125</dt>
                        <dd>Traders</dd>
                      </dl>
                    </td>
                    <td>
                      <dl>
                        <dt>57%</dt>
                        <dd>Win</dd>
                      </dl>
                    </td>
                    <td>
                      <dl>
                        <dt>3.41</dt>
                        <dd>Profil Factor</dd>
                      </dl>
                    </td>
                    <td>
                      <dl>
                        <dt>14</dt>
                        <dd>Maxx DD</dd>
                      </dl>
                    </td>
                  </tr>
                  <tr class="text-center">
                    <td>
                      <i class="fa fa-bar-chart fa-2x"></i>
                      <h5>BORO</h5>
                    </td>
                    <td>
                      <dl>
                        <dt>1339%</dt>
                        <dd>Growth</dd>
                      </dl>
                    </td>
                    <td>
                      <dl>
                        <dt>31</dt>
                        <dd>Subscribers</dd>
                      </dl>
                    </td>
                    <td>
                      <dl>
                        <dt>45</dt>
                        <dd>Weeks</dd>
                      </dl>
                    </td>
                    <td>
                      <dl>
                        <dt>125</dt>
                        <dd>Traders</dd>
                      </dl>
                    </td>
                    <td>
                      <dl>
                        <dt>57%</dt>
                        <dd>Win</dd>
                      </dl>
                    </td>
                    <td>
                      <dl>
                        <dt>3.41</dt>
                        <dd>Profil Factor</dd>
                      </dl>
                    </td>
                    <td>
                      <dl>
                        <dt>14</dt>
                        <dd>Maxx DD</dd>
                      </dl>
                    </td>
                  </tr>
                </tbody>
                <tfoot>
                  <tr>
                    <td colspan="8" class="text-right"><button class="btn btn-default">View More</button></td>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
          <div class="col-md-4">
            <p class="investment-trader__copy">Copy the transactions of professional traders and start earning today!</p>
            <button class="investment-trader__btn btn btn-primary btn-lg">All Rating</button>
          </div>
        </div>
      </div>
    </section>