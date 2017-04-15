    <section class="parallax-window parallax-window--investment-02">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <div class="investment-header">
              <h1>Automatic trading on the Forex market</h1>
            </div>
          </div>
          <div class="col-md-4">
            <ol class="breadcrumb">
              <li><a href="#">Home</a></li>
              <li><a href="#">Invesment</a></li>
              <li class="active">Invesment Program #02</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <section class="investment-headline">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h3>CopyFx account - allows you not only to make money on your trades<br>but also on your followers who copy your trades!</h3>
            <div class="seperator seperator--full">
              <i class="icons icons--seperator"></i>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- SELECT DATA FROM Tbl mt4account -->
    <section class="investment-statistic ptl pbl">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h4 class="headline">Statistic <b>Table</b></h4>
            <table class="table-no-border investment-statistic-table">
              <thead class="investment-statistic-table--head">
                <tr class="text-uppercase">
                  <th>Trader</th>
                  <th>Analytics</th>
                  <th>pps</th>
                  <th>Trades</th>
                  <th>ROI<br>Annualized</th>
                  <th>Avg PIPS</th>
                  <th>WIN %</th>
                  <th>MAX DD %</th>
                  <th>MAX DD PIPS</th>
                  <th>MAX<br>OPEN TRADER</th>
                  <th>AVG<br>TRADER TIME</th>
                  <th>WEEK</th>
                  <th>FOLLOWERS</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                for ($i=0; $i <6 ; $i++) { 
                  ?>
                    <tr>
                          <td class="investment-statistic-table__trader">
                            <img src="<?php echo site_url("dist/images/dummy-inv-trader.png"); ?>" alt="">
                            <div class="investment-statistic-table__trader-desc">
                              <b>Lorem Ipsum</b><br>
                              Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                            </div>
                          </td>
                          <td><a href=""><i class="fa fa-line-chart fa-2x"></i></a></td>
                          <td colspan="11" rowspan="" headers="">
                            <table class="table-no-border">
                              <tbody>
                                <tr>
                                  <td><b>46.6k</b></td>
                                  <td>1,186</td>
                                  <td>578%</td>
                                  <td>39</td>
                                  <td><b>92%</b></td>
                                  <td><b class="text-warning">23%</b></td>
                                  <td>10.8k</td>
                                  <td>100</td>
                                  <td>21h</td>
                                  <td>45</td>
                                  <td>949</td>
                                </tr>
                                <tr>
                                  <td colspan="11" class="no-padding">
                                    <table class="table-no-border investment-statistic-table--table-child">
                                      <thead>
                                        <tr>
                                          <th>Amount Following</th>
                                          <th>Live Followers Profit (Last Month)</th>
                                          <th></th>
                                          <th></th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <tr>
                                          <td><b>$647,859</b></td>
                                          <td><b>$68,782</b></td>
                                          <td><a href=""><i class="fa fa-commenting-o fa-2x"></i></a></td>
                                          <td><button class="btn btn-primary">Follow</button></td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </td>
                        </tr>
                  <?php
                }
                 ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>