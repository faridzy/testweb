  <div class="parallax-window parallax-window--news">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h3 class="parallax__title">About The Company</h3>
          <p class="parallax__desc">Lorem ipsum dolor sit amet et sapien sed elementum egestas dolore condimentum. Fusce blandit ultrices sapien, in accumsan orci rhoncus eu.</p>
        </div>
        <div class="col-md-6">
          <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="#">News</a></li>
            <li class="active">Alooha</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <div class="container news-container">
    <div class="row">
      <div class="col-md-4 news-content news-content--left">
        <?php
          foreach ($dataWidget['sidebar'] as $itemWidget) {
            echo $itemWidget;
          }
        ?>
      </div>
      <div class="col-md-8 news-content news-content--right">
        <h2 class="news__title news__title--primary">NEWS LIST PAGES</h2>
        <div class="news-headline__image">
          <img src="<?php echo site_url("dist/images/bg-diary-01.jpg"); ?>" class="img-responsive" alt="">
        </div>
        <h3 class="news-headline">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</h3>
        <div class="news-meta">
          <time class="news-meta__time">Mar 22, 2016</time>
          <spam class="news-meta__author">By : <a href="#">Admin TradeBankFX</a></spam>
        </div>
        <div class="news__content--headline">
          <p class="text-justify">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
        </div>
        <div class="news-headline-action">
          <button type="button" class="btn btn-primary">Show more</button>
        </div>
        <hr class="news-seperator">
        <section class="news-list-container">
          <?php
            foreach ($news as $val) {
              $content = translate($this, $val->content);
          ?>
              <article class="news-article">
                <div class="row">
                  <div class="col-md-4">
                    <div class="news-article__picture">
                      <img src="<?php echo getImage($val->meta['news_thumbnail'], 'medium', 'post');?>" class="img-responsive" alt="<?php echo translate($this, $val->title) ;?>">
                    </div>   
                  </div>
                  <div class="col-md-8">
                  <a href="<?php echo myPermalink($this, $val->post_id) ;?>">
                  <h3 class="news-article__headline"><?php echo translate($this, $val->title) ;?></h3>
                  </a>
                    <div class="news-meta">
                      <time class="news-meta__time"><?php echo date('M d, Y', strtotime($val->date_created)) ;?></time>
                      <spam class="news-meta__author">By : <a href="#"><?php echo $val->author ;?></a></spam>
                    </div>
                    <div class="news__content--article">
                      <p class="text-justify"><?php echo (strlen($content) > 300)? substr($content, 0, 300).'...' : $content ;?></p>
                    </div>
                  </div>
                </div>
              </article>
          <?php   
            }
          ?>
          <?php
          for ($i=0; $i < 5; $i++) { 
            ?>
            <article class="news-article">
              <div class="row">
                <div class="col-md-4">
                  <div class="news-article__picture">
                    <img src="<?php echo site_url("dist/images/bg-news-article-01.jpg"); ?>" class="img-responsive" alt="">
                  </div>   
                </div>
                <div class="col-md-8">
                  <h3 class="news-article__headline">Free VPS for trading with experts</h3>
                  <div class="news-meta">
                    <time class="news-meta__time">Mar 22, 2016</time>
                    <spam class="news-meta__author">By : <a href="#">Admin TradeBankFX</a></spam>
                  </div>
                  <div class="news__content--article">
                    <p class="text-justify">Dear Clients and Partners, We are pleased to inform you that Adamant Finance launched cooperation with Perfect Money. We constantly increase the number of payment methods in order to make your cooperation with us more comfortable.</p>
                  </div>
                </div>
              </div>
            </article>
            <?php
          }
          ?>
        </section>
        
        <nav aria-label="Page navigation" class="text-center">
          <ul class="pagination">
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li><a href="#">6</a></li>
            <li><a href="#">7</a></li>
          </ul>
        </nav>
      </div>
    </div>
  </div>