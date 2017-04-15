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
        <h3 class="news-headline">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</h3>
        <div class="news-meta"><time class="news-meta__time">Mar 22, 2016</time> <spam class="news-meta__author">By : <a href="#">Admin TradeBankFX</a></spam></div>

        <div class="news_headline__image">
          <img src="<?php echo site_url("dist/images/bg-diary-01.jpg");?>" class="img-responsive" alt="">
        </div>

        <div class="news__content--full">
          <p class="text-justify">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>

          <p class="text-justify">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>

          <p class="text-justify">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable.</p>
        </div>
      </div>
    </div>
  </div>