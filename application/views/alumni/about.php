    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">About
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?=base_url()?>">Home</a>
        </li>
        <li class="breadcrumb-item active">About</li>
      </ol>

      <div class="row">
        <?php foreach ($about as $about) { ?>
        <div class="col-lg-6 portfolio-item">
          <div class="card h-100">
            <img style="height: 307.65px;width: 538.4px;" class="card-img-top" src="<?=base_url()?>assets/uploads/<?=$about->image?>" alt="">
            <div class="card-body">
              <h4 class="card-title">
                <?=$about->title?>
              </h4>
              <p class="card-text"><?=$about->description?></p>
            </div>
            <div class="card-footer text-muted">
              <?=$about->date?>
            </div>
          </div>
        </div>
        <?php } ?>
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container -->
