<!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">Stistics
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?=base_url()?>">Home</a>
        </li>
        <li class="breadcrumb-item active">Statistics</li>
      </ol>

      <!-- Image Header -->
      <img class="img-fluid rounded mb-4" style="height: 300px;width: 1200px;" src="<?=base_url()?>assets/img/news1.jpeg" alt="">

      <div class="row">
        <?php
        foreach ($statistics as $statistics) {
        ?>
        <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item">
          <div class="card h-100">
            <div class="card-body">
              <h4 class="card-title">
                <a href="#"><?=$statistics->name?></a>
              </h4>
              <p class="card-text"><?=$statistics->number?></p>
            </div>
          </div>
        </div>
        <?php } ?>
      </div>

    </div>
    <!-- /.container -->