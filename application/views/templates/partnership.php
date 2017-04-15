    <section class="parallax-window parallax-window--partnership">
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
              <li><a href="#">Home</a></li>
              <li class="active">Partnership</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <section class="partnership-benefit">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <ul class="partnership-benefit-list">
              <li class="partnership-benefit__item">
                <span class="partnership-benefit__icons"><i class="icons icons-benefit--partners"></i></span>
                <span class="partnership-benefit__title">Partner's cabinet</span>
              </li>
              <li class="partnership-benefit__item">
                <span class="partnership-benefit__icons"><i class="icons icons-benefit--statistics"></i></span>
                <span class="partnership-benefit__title">Statistics</span>
              </li>
              <li class="partnership-benefit__item">
                <span class="partnership-benefit__icons"><i class="icons icons-benefit--analytics"></i></span>
                <span class="partnership-benefit__title">Analytics</span>
              </li>
              <li class="partnership-benefit__item">
                <span class="partnership-benefit__icons"><i class="icons icons-benefit--materials"></i></span>
                <span class="partnership-benefit__title">Promotional materials</span>
              </li>
              <li class="partnership-benefit__item">
                <span class="partnership-benefit__icons"><i class="icons icons-benefit--contests"></i></span>
                <span class="partnership-benefit__title">Contests</span>
              </li>
            </ul>
          </div>
        </div>
      </div>
      
    </section>

    <section class="partnership-content">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <?php echo translate($this, $content->content) ;?>
            <button type="button" class="btn btn-primary btn-lg">Partner Type</button>
          </div>
          <div class="col-md-6">
            <img src="<?php echo site_url("dist/images/bg-partnership-02.jpg"); ?>" alt="" class="img-responsive">
          </div>
        </div>
      </div>
    </section>

    <section class="partnership-statistics">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h3>Statistics</h3>
          </div>
          <div class="col-md-2">
            <h4>1580 USD</h4>
            <p>Average deposit</p>
          </div>
          <div class="col-md-2">
            <h4>14</h4>
            <p>Average number of clients</p>
          </div>
          <div class="col-md-2">
            <h4>9</h4>
            <p>Average number of transactions per day</p>
          </div>
          <div class="col-md-2">
            <h4>0.65 lots</h4>
            <p>Average volume of transactions per day</p>
          </div>
          <div class="col-md-2">
            <h4>0.07 lots</h4>
            <p>Average size of transaction</p>
          </div>
          <div class="col-md-2">
            <h4>1110 USD</h4>
            <p>Average earnings of partner</p>
          </div>
          <div class="col-md-12">
            <p>The partnership programme is convenient and doesn't require any financial investments. All you have to do is place our advertisement on your homepage, blog, forum, or display it in social media.</p>
          </div>
        </div>
      </div>
    </section>