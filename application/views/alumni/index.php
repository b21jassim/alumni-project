<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
          <!-- Slide One - Set the background image for this slide in the line below -->
          <div class="carousel-item active" style="background-image: url('http://localhost/alumni/assets/img/mainbg.jpeg')">
            <div class="carousel-caption d-none d-md-block">
              <h3>Title</h3>
              <p>description</p>
            </div>
          </div>
          <!-- Slide Two - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url('http://localhost/alumni/assets/img/news2.jpeg')">
            <div class="carousel-caption d-none d-md-block">
              <h3>Second Slide</h3>
              <p>This is a description for the second slide.</p>
            </div>
          </div>
          <!-- Slide Three - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url('http://localhost/alumni/assets/img/1900x1080.png')">
            <div class="carousel-caption d-none d-md-block">
              <h3>Third Slide</h3>
              <p>This is a description for the third slide.</p>
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


      
    </header>

    <!-- Page Content -->
    <div class="container">

      <h1 class="my-4">Available Jobs</h1>

      <!-- Job Section -->
      <div class="row">
        <?php
          foreach ($job as $job) {
        ?>
        <div class="col-lg-4 mb-4">
          <div class="card h-100">
            <h4 class="card-header"><?=$job->title?></h4>
            <div class="card-body">
              <p class="card-text"><?=character_limiter($job->description,100)?></p>
            </div>
            <div class="card-footer">
              <a href="<?=base_url()?>home/jobPage/<?=$job->id?>" class="btn btn-primary">See More</a>
            </div>
          </div>
        </div>
        <?php } ?>
      </div>

      <!-- /.row -->

      <!-- Portfolio Section -->
      <h2>Latest News</h2>
      <hr>

      <!-- Features Section -->
      <div class="row news">
        <?php
        foreach ($news as $news) {
        ?>
        <div class="col-lg-6">
          <img style="width: 200px;height: 100px;" src="<?=base_url()?>assets/uploads/<?=$news->image?>">
        </div>
        <div class="col-lg-6">
          <h2><?=$news->title?> / <?=$news->date?></h2>
          <p><?=$news->description?></p>
        </div>
        <div class="div-hr"></div>
        <?php } ?>
        <div class="col-lg-12">
        <center>
          <a href="<?=base_url()?>home/news" style="margin-top: 10px;margin-bottom: 10px;"  class="btn btn-primary">All News</a>  
        </center>
        </div>
      </div>
      <hr>
      <!-- /.row -->

    </div>
    <!-- /.container -->