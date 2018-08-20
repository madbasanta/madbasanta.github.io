<?php require('views/includes/head.php'); ?>
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="/public/images/slider-index/s1.png" alt="First slide">
      <div class="carousel-caption d-none d-md-block">
        <h2>Most elusive cats across the world.</h2>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="/public/images/slider-index/s2.png" alt="Second slide">
      <div class="carousel-caption d-none d-md-block">
        <h2>In the last 15 years the number of leopards has declined by 20%.</h2>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="/public/images/slider-index/s3.png" alt="Third slide">
      <div class="carousel-caption d-none d-md-block">
        <h2>In 2017 it was noted that there are only 70 of these leopards left in the wild.</h2>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<section class="mt-3">
      <div><h3 class="text-center">TOTAL VISITORS : <?= $count ?></h3></div>
</section>
<hr style="background: lightgray">
<section>
  <div class="container">
    <div class="row">
      <div class="col-md-10 offset-md-1">
        <div class="bg-white p-3">
          Save an Amur Leopard (SAL) is a charity that has been set up to specifically save the leopard. This elegant animal is one of the most elusive cats across the world. In the last 15 years the number of leopards has declined by 20% and in 2017 it was noted that there are only 70 of these leopards left in the wild as their habitat is under threat from forest fires and land clearance to develop roads and manufacturing plants.
        </div>
      </div>
    </div>
  </div>
</section>
<section>
  <div class="container">
    <div class="row">
      <div class="col-md-10 offset-md-1">
        <div id="demo" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner donors">
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php require('views/includes/footer.php'); ?>

<script>
  $(function() {
    $.post("sal/web-service/donations", function(data, status) {
      console.log(status);
      if(status == "success")
        $(document).find(".carousel-inner.donors").html(data);
    });
  });
</script>

</body>
</html>