<?php
  if(isset($dataWidget['footer'])){
    foreach ($dataWidget['footer'] as $itemWidget) {
      echo $itemWidget;
    }
  }
?>
<footer class="footer">
    <div class="container">
      <div class="footer-partner">
  <img src="<?php echo site_url("dist/images/icon-payment.png"); ?>" class="img-responsive" alt="partner">
</div>
      <hr>
      <div class="row footer-top-link">
  <div class="col-md-7 col-sm-6">
    <ul class="list-unstyled row">
      <li class="col-md-3"><a href="">Open account</a></li>
      <li class="col-md-4"><a href="">Download terminal</a></li>
      <li class="col-md-5"><a href="">Get bonus</a></li>
      <li class="col-md-3"><a href="">Deposit account</a></li>
      <li class="col-md-4"><a href="">Open account</a></li>
      <li class="col-md-5"><a href="">Participate in competitions</a></li>
    </ul>
  </div>
  <div class="col-md-5 col-sm-6">
    <ul class="row list-unstyled">
      <li class="col-md-6"><a href="">Subscribe to signals</a></li>
      <li class="col-md-6"><a href="">Invest</a></li>
      <li class="col-md-6"><a href="">Become signal provider</a></li>
      <li class="col-md-6"><a href="">Become partner</a></li>
    </ul>
  </div>
</div>
      <hr>
      <div class="row footer-social">
  <div class="col-md-5 clearfix col-sm-12">
    <h4 class="footer-social__title">Get MFXtrader on</h4>
    <a href="<?php echo $general['link_gplay'] ;?>" class="google-store"></a>
    <a href="<?php echo $general['link_appsstore'] ;?>" class="apple-store"></a>
  </div>
  <div class="col-md-7 clearfix col-sm-12">
    <h4 class="footer-social__title">Follow us</h4>
    <ul class="social-link list-unstyled list-inline pull-left">
      <li><a href="<?php echo $general['link_facebook'] ;?>" class="social-link__item facebook"><i class="fa fa-facebook"></i></a></li>
      <li><a href="<?php echo $general['link_twitter'] ;?>" class="social-link__item twitter"><i class="fa fa-twitter"></i></a></li>
      <li><a href="<?php echo $general['link_youtube'] ;?>" class="social-link__item youtube"><i class="fa fa-youtube"></i></a></li>
      <li><a href="<?php echo $general['link_instagram'] ;?>" class="social-link__item instagram"><i class="fa fa-instagram"></i></a></li>
      <li><a href="<?php echo $general['link_pinterest'] ;?>" class="social-link__item pinterest"><i class="fa fa-pinterest"></i></a></li>
      <li><a href="<?php echo $general['link_linkedin'] ;?>" class="social-link__item linkedin"><i class="fa fa-linkedin"></i></a></li>
      <li><a href="<?php echo $general['link_gplus'] ;?>" class="social-link__item google-plus"><i class="fa fa-google-plus"></i></a></li>
      <li><a href="<?php echo $general['link_wp'] ;?>" class="social-link__item wordpress"><i class="fa fa-wordpress"></i></a></li>
    </ul>
    <button class="social-btn-found btn btn-success pull-right"><i class="fa fa-bullhorn"></i><span>Found a mistake?</span></button>
  </div>
</div>
      <hr>
<div class="footer-company-link">
  <div class="company-link">
    <h4 class="company-link__title">Trade with us</h4>
    <ul class="company-link__list list-unstyled">
      <li><a href="#">Bonuses and promotions</a></li>
      <li><a href="#">Depositing/withdrawing</a></li>
      <li><a href="#">Trading platforms</a></li>
      <li><a href="#">Types of accounts</a></li>
    </ul>
  </div>
  <div class="company-link">
    <h4 class="company-link__title">Copy signals</h4>
    <ul class="company-link__list list-unstyled">
      <li><a href="#">What is MFX Copy?</a></li>
      <li><a href="#">Advantages of service</a></li>
      <li><a href="#">Rating of providers</a></li>
      <li></li>
    </ul>
  </div>
  <div class="company-link">  
    <h4 class="company-link__title">Invest</h4>
    <ul class="company-link__list list-unstyled">
      <li><a href="#">MFX Capital investments</a></li>
      <li><a href="#">Advantages of the program</a></li>
      <li><a href="#">Reports and presentations</a></li>
      <li><a href="#">PAMM-accounts</a></li>
    </ul>
  </div>
  <div class="company-link company-link--large">
    <h4 class="company-link__title">Participate in tournaments</h4>
    <ul class="company-link__list list-unstyled">
      <li><a href="#">Competitions timetable</a></li>
      <li><a href="#">Regular competitions</a></li>
      <li><a href="#">Freeroll competitions</a></li>
      <li><a href="#">Sit&Go competitions</a></li>
    </ul>
  </div>
  <div class="company-link">
    <h4 class="company-link__title">Become partner</h4>
    <ul class="company-link__list list-unstyled">
      <li><a href="#">Standard program</a></li>
      <li><a href="#">Multilevel program</a></li>
      <li><a href="#">CPA program</a></li>
      <li><a href="#">Materials for engagement</a></li>
    </ul>
  </div>
  <div class="company-link company-link--small">
    <h4 class="company-link__title">About company</h4>
    <ul class="company-link__list list-unstyled">
      <li><a href="#">Company history</a></li>
      <li><a href="#">MFX Broker awards</a></li>
      <li><a href="#">Social broker</a></li>
      <li><a href="#">Company licenses</a></li>
    </ul>
  </div>
</div>
      <hr>
      <div class="footer-copyright row">
  <div class="col-md-3">
    <b>&copy; 2006-2016 MFX Broken</b>
  </div>
  <div class="col-md-9">
    <p>Information posted on the website is of general nature and is provided for information only.</p>
  </div>
</div>
    </div>
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModal">
    </div>

    <div class="modal fade" id="regModal" tabindex="-2" role="dialog" aria-labelledby="regModal">
    </div>
    
  </footer>
    <script src="/dist/scripts/jquery.js" type="text/javascript"></script>
    <script src="/dist/scripts/main.js" type="text/javascript" ></script>
    <script src="/dist/bootstrap.min.js" type="text/javascript"></script>
    <script src="/dist/core.js" type="text/javascript"></script>
    <script src="/dist/zain.js" type="text/javascript"></script>
    <script src="/dist/parallax.min.js" type="text/javascript"></script>
    <?php echo $JSFile; ?>
    <script type="text/javascript" >
    $(function(){
      $.each($(".parallax-window") , function(){
        $(this).parallax({imageSrc : $(this).data('image')});
      });
    });
  </script>

  </body>
</html> 
