<!-- Page Content -->
<div class="container">

  <!-- Page Heading/Breadcrumbs -->
  <h1 class="mt-4 mb-3">News
  </h1>

  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="<?=base_url()?>">Home</a>
    </li>
    <li class="breadcrumb-item active">News</li>
  </ol>

  <div class="row">

    <!-- Blog Entries Column -->
    <?php foreach ($news as $news) { ?>
    <div class="col-md-6">
      <!-- Blog Post -->
      <div class="card mb-4">
      <img class="card-img-top" style="height: 150px;" src="<?=base_url()?>assets/uploads/<?=$news->image?>" alt="">
        <div class="card-body">
          <h2 class="card-title"><?=$news->title?></h2>
          <p class="card-text"><?=$news->description?></p>
          <!-- <a href="#" class="btn btn-primary">Read More →</a> -->
        </div>
        <div class="card-footer text-muted">
          <?=$news->date?>
        </div>
      </div>
    </div>
    <?php } ?>


    <!-- Sidebar Widgets Column -->
    

  </div>
  <!-- /.row -->

</div>
<!-- /.container