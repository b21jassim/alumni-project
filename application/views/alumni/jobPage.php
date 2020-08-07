<!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">Sidebar Page
        <small>Subheading</small>
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?=base_url()?>">Home</a>
        </li>
        <li class="breadcrumb-item">
          <a href="<?=base_url()?>home/job">Available Jobs</a>
        </li>
        <li class="breadcrumb-item active">Job Page</li>
      </ol>

      <!-- Content Row -->
      <div class="row" style="height: 430px;">
        <!-- Content Column -->
        <div class="col-lg-9 mb-4">
          <h2><?=$job->title?></h2>
          <p><?=$job->description?></p>
          <hr>
          <?php
          $userData = $this->Admin_model->getUserData($job->company); 
          ?>
          Company Name : <?=$userData->first_name?> 
          <br>
          Address : <?=$userData->address?>
          <br>
          Phone : <?=$userData->phone?>
        </div>
      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->