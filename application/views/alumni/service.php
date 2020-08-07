<!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">Services</h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?=base_url()?>">Home</a>
        </li>
        <li class="breadcrumb-item active">Services</li>
      </ol>

      <!-- Image Header -->
      <img class="img-fluid rounded mb-4" style="height: 300px;width: 1200px;" src="<?=base_url()?>assets/img/news1.jpeg" alt="">

      <!-- Marketing Icons Section -->
      <div class="row">
        <?php foreach ($service as $service) { ?>
        <div class="col-lg-4 mb-4">
          <div class="card h-100">
            <h4 class="card-header"><?=$service->title?></h4>
            <div class="card-body">
              <p class="card-text"><?=$service->description?></p>
            </div>
          </div>
          <div class="card-footer text-muted">
          <a target="_blank" href="<?=base_url()?>assets/uploads/<?=$service->file?>">Download File</a> - <?=$service->date?>
        </div>
        </div>
        <?php } ?>
      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->
    <div style="height: 60px;">
      
    </div>