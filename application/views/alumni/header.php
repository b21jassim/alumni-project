<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Alumni</title>

    <!-- Bootstrap core CSS -->
    <link href="<?=base_url()?>assets/alumni/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?=base_url()?>assets/alumni/css/alumni.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="<?=base_url()?>">
        <img style="width: 50px;" src="<?=base_url()?>assets/img/logo.jpeg"> Alumni</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="<?=base_url()?>">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?=base_url()?>home/job">Available Jobs</a>
            </li>
            <?php if (!$this->session->userdata('login')){ ?>
            <li class="nav-item">
              <a class="nav-link" href="<?=base_url()?>home/alumni">Alumni</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?=base_url()?>home/company">Company Login</a>
            </li>
            <?php } ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Club Services
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
                <a class="dropdown-item" href="<?=base_url()?>home/service">All Services</a>
                <a class="dropdown-item" href="<?=base_url()?>home/event">Events & Announcements</a>
                <a class="dropdown-item" href="<?=base_url()?>home/news">All News</a>
                <a class="dropdown-item" href="<?=base_url()?>home/findAlimni">Find Alumni</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?=base_url()?>home/statistics">Statistics</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?=base_url()?>home/about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?=base_url()?>home/contact">Contact Us</a>
            </li>
            <?php if ($this->session->userdata('login')){ ?>
            <li class="nav-item">
              <a class="nav-link" href="<?=base_url()?>home/notifications">Notifications (<?=$this->Admin_model->replys($this->id)?>)</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" class="nav-link" href="<?=base_url()?>home/profile">Profile</a>
            </li>
            <li class="nav-item">
              <a class="btn btn-primary" class="nav-link" href="<?=base_url()?>login/logoutAlumni">Logout</a>
            </li>
            <?php } ?>
          </ul>
        </div>
      </div>
    </nav>

    <header>