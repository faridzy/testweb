    <section class="parallax-window parallax-window--trading-instrument" data-image-src="<?php echo getImage($content->meta['parallax_image'], 'large', 'post');?>">
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
              <li><a href="#">Trading</a></li>
              <li class="active">Instrument</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <div class="trading container ptl pbl">
      <div class="row">
        <div class="col-md-7">
          <?php echo translate($this, $content->content);?>
        </div>
        <div class="col-md-5">
          <h4 class="headtitle">Open <b>account!</b></h4>
          <div class="button-wrapper-2">
            <a href="<?php echo myPermalink($this, $themeOptions['demo_account'])?>" class="btn btn-primary">Open Demo Account</a>
            <a href="<?php echo myPermalink($this, $themeOptions['real_account'])?>" class="btn btn-primary">Open Real Account</a>
          </div>
        </div>
      </div>
    </div>

    <section class="trading trading-step">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <ul class="trading-step--list">
              <li class="trading-step__item">
                <span class="trading-step__icons"><i class="icons icons-trading--opening"></i></span>
                <span class="trading-step__label">Account opening</span>
              </li>
              <li class="trading-step__item">
                <span class="trading-step__icons"><i class="icons icons-trading--deposit"></i></span>
                <span class="trading-step__label">Funds deposit</span>
              </li>
              <li class="trading-step__item">
                <span class="trading-step__icons"><i class="icons icons-trading--trading-open"></i></span>
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
            <h4 class="headtitle">prediction</h4>
            <div class="seperator seperator--full mbl"><i class="icons icons--seperator"></i></div>
            <div class="trading-table-choose">
                               
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active">
      <a href="#classic" aria-controls="classic" role="tab" data-toggle="tab">Classic</a>
    </li>
    <li role="presentation">
      <a href="#marketpro" aria-controls="marketpro" role="tab" data-toggle="tab">MarketPro</a>
    </li>
    <li role="presentation">
      <a href="#marketprime" aria-controls="marketprime" role="tab" data-toggle="tab">MarketPrime</a>
    </li>
    <li role="presentation">
      <a href="#copyfx" aria-controls="copyfx" role="tab" data-toggle="tab">CopyFx</a>
    </li>
    <li role="presentation">
      <a href="#signalfx" aria-controls="signalfx" role="tab" data-toggle="tab">SignalFx</a>
    </li>
    <li role="presentation">
      <a href="#bonus50" aria-controls="bonus50" role="tab" data-toggle="tab">Bonus50</a>
    </li>
  </ul>

  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="classic">
      <table class="table">
        <tbody>
          <tr>
            <td>Forex</td>
            <td>
              <label class="trading-table-choose-control">
                <input type="checkbox" class="trading-control-input">
                <span class="trading-control-indicator"></span>
                <span class="trading-control-description">All</span>
              </label>
              <label class="trading-table-choose-control">
                <input type="checkbox" class="trading-control-input">
                <span class="trading-control-indicator"></span>
                <span class="trading-control-description">AUD/***5</span>
              </label>
              <label class="trading-table-choose-control">
                <input type="checkbox" class="trading-control-input">
                <span class="trading-control-indicator"></span>
                <span class="trading-control-description">CAD/***2</span>
              </label>
              <label class="trading-table-choose-control">
                <input type="checkbox" class="trading-control-input">
                <span class="trading-control-indicator"></span>
                <span class="trading-control-description">CHF/***1</span>
              </label>
              <label class="trading-table-choose-control">
                <input type="checkbox" class="trading-control-input">
                <span class="trading-control-indicator"></span>
                <span class="trading-control-description">EUR/***7</span>
              </label>
              <label class="trading-table-choose-control">
                <input type="checkbox" class="trading-control-input">
                <span class="trading-control-indicator"></span>
                <span class="trading-control-description">GBP/***6</span>
              </label>
              <label class="trading-table-choose-control">
                <input type="checkbox" class="trading-control-input">
                <span class="trading-control-indicator"></span>
                <span class="trading-control-description">NZD/***4</span>
              </label>
              <label class="trading-table-choose-control">
                <input type="checkbox" class="trading-control-input">
                <span class="trading-control-indicator"></span>
                <span class="trading-control-description">USD/***3</span>
              </label>
            </td>
          </tr>
          <tr>
            <td>Metals</td>
            <td>
              <label class="trading-table-choose-control">
                <input type="checkbox" class="trading-control-input">
                <span class="trading-control-indicator"></span>
                <span class="trading-control-description">All</span>
              </label>
              <label class="trading-table-choose-control">
                <input type="checkbox" class="trading-control-input">
                <span class="trading-control-indicator"></span>
                <span class="trading-control-description">XPDUSD.c</span>
              </label>
              <label class="trading-table-choose-control">
                <input type="checkbox" class="trading-control-input">
                <span class="trading-control-indicator"></span>
                <span class="trading-control-description">XAUUSD.c</span>
              </label>
              <label class="trading-table-choose-control">
                <input type="checkbox" class="trading-control-input">
                <span class="trading-control-indicator"></span>
                <span class="trading-control-description">XPTUSD.c</span>
              </label>
              <label class="trading-table-choose-control">
                <input type="checkbox" class="trading-control-input">
                <span class="trading-control-indicator"></span>
                <span class="trading-control-description">XAGUSD.c</span>
              </label>
            </td>
          </tr>
        </tbody>
      </table>
      
    </div>
    <div role="tabpanel" class="tab-pane" id="marketpro">
      
    </div>
    <div role="tabpanel" class="tab-pane" id="marketprime">
      
    </div>
    <div role="tabpanel" class="tab-pane" id="copyfx">
      
    </div>
    <div role="tabpanel" class="tab-pane" id="signalfx">
      
    </div>
    <div role="tabpanel" class="tab-pane" id="bonus50">
      
    </div>
  </div>
</div>
            <div class="trading-table-list">
  <div class="trading-table-list--country">
    <i class="flag flag-gb"></i>
  </div>
  <table class="table trading-table-list--table">
    <thead>
      <tr>
        <th>Symbol</th>
        <th>Headline</th>
        <th>Spread</th>
        <th>Swap/Long</th>
        <th>Swap/Short</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>AUDCAD.c</td>
        <td>Australian Dollar vs Canadian Dollar</td>
        <td>25.5</td>
        <td>0.6</td>
        <td>-8.6</td>
      </tr>
      <tr>
        <td>AUDCHF.c</td>
        <td>Australian Dollar vs Swiss Franc</td>
        <td>73.5</td>
        <td>-2.8</td>
        <td>-9.4</td>
      </tr>
      <tr>
        <td>AUDJPY.c</td>
        <td>Australian Dollar vs Japanese Yen</td>
        <td>54.3</td>
        <td>0.02</td>
        <td>-9.2</td>
      </tr>
      <tr>
        <td>AUDNZD.c</td>
        <td>Australian Dollar vs New Zealand Dollar</td>
        <td>81.9</td>
        <td>2.1</td>
        <td>-3.6</td>
      </tr>
        <td>AUDUSD.c</td>
        <td>Australian Dollar vs US Dollar</td>
        <td>44.8</td>
        <td>0.15</td>
        <td>-6.1</td>
      </tr>
    </tbody>
  </table>
</div>
            <div class="trading-table-list">
  <div class="trading-table-list--country">
    <i class="flag flag-gb"></i>
  </div>
  <table class="table trading-table-list--table">
    <thead>
      <tr>
        <th>Symbol</th>
        <th>Headline</th>
        <th>Spread</th>
        <th>Swap/Long</th>
        <th>Swap/Short</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>AUDCAD.c</td>
        <td>Australian Dollar vs Canadian Dollar</td>
        <td>25.5</td>
        <td>0.6</td>
        <td>-8.6</td>
      </tr>
      <tr>
        <td>AUDCHF.c</td>
        <td>Australian Dollar vs Swiss Franc</td>
        <td>73.5</td>
        <td>-2.8</td>
        <td>-9.4</td>
      </tr>
      <tr>
        <td>AUDJPY.c</td>
        <td>Australian Dollar vs Japanese Yen</td>
        <td>54.3</td>
        <td>0.02</td>
        <td>-9.2</td>
      </tr>
      <tr>
        <td>AUDNZD.c</td>
        <td>Australian Dollar vs New Zealand Dollar</td>
        <td>81.9</td>
        <td>2.1</td>
        <td>-3.6</td>
      </tr>
        <td>AUDUSD.c</td>
        <td>Australian Dollar vs US Dollar</td>
        <td>44.8</td>
        <td>0.15</td>
        <td>-6.1</td>
      </tr>
    </tbody>
  </table>
</div>
            <div class="trading-table-list">
  <div class="trading-table-list--country">
    <i class="flag flag-gb"></i>
  </div>
  <table class="table trading-table-list--table">
    <thead>
      <tr>
        <th>Symbol</th>
        <th>Headline</th>
        <th>Spread</th>
        <th>Swap/Long</th>
        <th>Swap/Short</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>AUDCAD.c</td>
        <td>Australian Dollar vs Canadian Dollar</td>
        <td>25.5</td>
        <td>0.6</td>
        <td>-8.6</td>
      </tr>
      <tr>
        <td>AUDCHF.c</td>
        <td>Australian Dollar vs Swiss Franc</td>
        <td>73.5</td>
        <td>-2.8</td>
        <td>-9.4</td>
      </tr>
      <tr>
        <td>AUDJPY.c</td>
        <td>Australian Dollar vs Japanese Yen</td>
        <td>54.3</td>
        <td>0.02</td>
        <td>-9.2</td>
      </tr>
      <tr>
        <td>AUDNZD.c</td>
        <td>Australian Dollar vs New Zealand Dollar</td>
        <td>81.9</td>
        <td>2.1</td>
        <td>-3.6</td>
      </tr>
        <td>AUDUSD.c</td>
        <td>Australian Dollar vs US Dollar</td>
        <td>44.8</td>
        <td>0.15</td>
        <td>-6.1</td>
      </tr>
    </tbody>
  </table>
</div>
            <div class="trading-table-list">
  <div class="trading-table-list--country">
    <i class="flag flag-gb"></i>
  </div>
  <table class="table trading-table-list--table">
    <thead>
      <tr>
        <th>Symbol</th>
        <th>Headline</th>
        <th>Spread</th>
        <th>Swap/Long</th>
        <th>Swap/Short</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>AUDCAD.c</td>
        <td>Australian Dollar vs Canadian Dollar</td>
        <td>25.5</td>
        <td>0.6</td>
        <td>-8.6</td>
      </tr>
      <tr>
        <td>AUDCHF.c</td>
        <td>Australian Dollar vs Swiss Franc</td>
        <td>73.5</td>
        <td>-2.8</td>
        <td>-9.4</td>
      </tr>
      <tr>
        <td>AUDJPY.c</td>
        <td>Australian Dollar vs Japanese Yen</td>
        <td>54.3</td>
        <td>0.02</td>
        <td>-9.2</td>
      </tr>
      <tr>
        <td>AUDNZD.c</td>
        <td>Australian Dollar vs New Zealand Dollar</td>
        <td>81.9</td>
        <td>2.1</td>
        <td>-3.6</td>
      </tr>
        <td>AUDUSD.c</td>
        <td>Australian Dollar vs US Dollar</td>
        <td>44.8</td>
        <td>0.15</td>
        <td>-6.1</td>
      </tr>
    </tbody>
  </table>
</div>
          </div>
        </div>
      </div>
    </section>
      
    <script src="scripts/jquery.js" type="text/javascript" charset="utf-8" async defer></script>
<script src="scripts/main.js" type="text/javascript" charset="utf-8" async defer></script>
