   <div class="parallax-window parallax-window--diary"></div>

    <!--- diary-list-->
    <div class="container news-container">
      <div class="row">
        <div class="col-md-4 news-content news-content--left">
          
          <!--- search article -->
          <!--- popular-post-diary -->
          <!--- category-tag-diary -->

        <?php
          foreach ($dataWidget['sidebar'] as $itemWidget) {
            echo $itemWidget;
          }
        ?>


        </div>

        <div class="col-md-8 news-content news-content--right">
          <h2 class="news__title news__title--primary">NEWS Diary</h2>
          <section class="diary-news" data-masonry='{ "itemSelector": ".news--items", "columnWidth": 300 }'>
            
            <!--- diary-news -->
            <?php 

            for ($i=0; $i <5 ; $i++) { 
                ?>
                    <article class="news-box news--items">
                    <header>
                      <img src="<?php echo site_url("dist/images/bg-news-01.jpg");?>" class="img-responsive" alt="News">
                    </header>
                    <main>
                      <h4 class="news-headtitle">Creative Branding Mockup</h4>
                      <div class="news-post-data">
                        <span class="post-time">
                          <time>March 16, 2013</time>
                        </span>
                        <span class="post-author">
                          By: <a href="#">Admin TradeBank FX</a>
                        </span>
                      </div>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                      consequat.</p>
                    </main>
                    <footer>
                      <ul class="news-conversation">
                        <li class="conversation-comment">
                          <span class="conversation-label">Comment:</span>
                          <span class="conversation-icon"><i class="fa fa-comment"></i></span>
                          <span class="conversation-value">1</span>
                        </li>
                        <li class="conversation-share">
                          <span class="conversation-label">Share:</span>
                          <span class="conversation-icon"><i class="fa fa-share-alt"></i></span>
                          <span class="conversation-value">1</span>
                        </li>
                        <li class="conversation-like">
                          <span class="conversation-label">Like:</span>
                          <span class="conversation-icon"><i class="fa fa-heart"></i></span>
                          <span class="conversation-value">1</span>
                        </li>
                      </ul>
                      <button class="btn btn-primary btn-read-more">Read More</button>
                    </footer>
                  </article>
                <?php
              }

            ?>
            
            <!--- diary-news-slider -->
            <article class="news-box news--items">
              <header>
                <div class="news-video">
                  <video width="300" controls>
                    <source src="demo.mp4" type="video/mp4">
                    <source src="demo.ogg" type="video/ogg">
                    Your browser does not support HTML5 video.
                  </video>
                </div>
              </header>
              <main>
                <h4 class="news-headtitle">Creative Branding Mockup</h4>
                <div class="news-post-data">
                  <span class="post-time">
                    <time>March 16, 2013</time>
                  </span>
                  <span class="post-author">
                    By: <a href="#">Admin TradeBank FX</a>
                  </span>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat.</p>
              </main>
              <footer>
                <ul class="news-conversation">
                  <li class="conversation-comment">
                    <span class="conversation-label">Comment:</span>
                    <span class="conversation-icon"><i class="fa fa-comment"></i></span>
                    <span class="conversation-value">1</span>
                  </li>
                  <li class="conversation-share">
                    <span class="conversation-label">Share:</span>
                    <span class="conversation-icon"><i class="fa fa-share-alt"></i></span>
                    <span class="conversation-value">1</span>
                  </li>
                  <li class="conversation-like">
                    <span class="conversation-label">Like:</span>
                    <span class="conversation-icon"><i class="fa fa-heart"></i></span>
                    <span class="conversation-value">1</span>
                  </li>
                </ul>
                <button class="btn btn-primary btn-read-more">Read More</button>
              </footer>
            </article>

          </section>

          <!--- spinner -->
          <div class="spinner active">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
            <span class="spinner-text">
              <b>Loading More</b>
            </span>
          </div>

        </div>
      </div>
    </div>

    <!--- scripts -->
    <script src="scripts/jquery.js" type="text/javascript" charset="utf-8" async defer></script>
    <script src="scripts/main.js" type="text/javascript" charset="utf-8" async defer></script>

