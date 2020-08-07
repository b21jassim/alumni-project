<!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">Available
        <small>Jobs</small>
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?=base_url()?>">Home</a>
        </li>
        <li class="breadcrumb-item active">Jobs</li>
      </ol>

      <!-- Image Header -->
      <img class="img-fluid rounded mb-4" style="height: 300px;width: 1200px;" src="<?=base_url()?>assets/img/news3.jpeg" alt="">

      <!-- Marketing Icons Section -->
      <div class="row">
        <?php foreach ($job as $job) { ?>
        <div class="col-lg-4 mb-4">
          <div class="card h-100">
            <h4 class="card-header"><?=$job->title?></h4>
            <div class="card-body">
              <p class="card-text"><?=character_limiter($job->description,100)?></p>
            </div>
            <div class="card-footer">
              <a href="<?=base_url()?>home/jobPage/<?=$job->id?>" class="btn btn-primary">See More</a> - <?=$this->Admin_model->getUser($job->company)?>
            </div>
          </div>
        </div>
        <?php } ?>
      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->