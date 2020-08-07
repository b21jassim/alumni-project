<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Alumni</title>
  <!-- Bootstrap core CSS-->
  <link href="<?=base_url()?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="<?=base_url()?>assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="<?=base_url()?>assets/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="<?=base_url()?>assets/css/sb-admin.css" rel="stylesheet">
    
  <link href="<?=base_url()?>assets/css/dt_picker.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav" style="background-color: #164e8a!important;">
    <a class="navbar-brand" href="index.html"><img style="width: 50px;" src="<?=base_url()?>assets/img/logo.jpeg"></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="<?=base_url()?>/admin">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Home</span>
          </a>
        </li>

       
 
         
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-sitemap"></i>
            <span class="nav-link-text">Users</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseMulti">
            <li>
              <a href="<?=base_url()?>admin/users">All Users</a>
            </li>
          </ul>
        </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti2" data-parent="#exampleAccordion2">
            <i class="fa fa-fw fa-sitemap"></i>
            <span class="nav-link-text">Events & Announcement </span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseMulti2">
            <li>
              <a href="<?=base_url()?>admin/addEvent">Add Event</a>
            </li>
            <li>
              <a href="<?=base_url()?>admin/events">View All</a>
            </li>
          </ul>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti3" data-parent="#exampleAccordion2">
            <i class="fa fa-fw fa-sitemap"></i>
            <span class="nav-link-text">News</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseMulti3">
            <li>
              <a href="<?=base_url()?>admin/addNews">Add News</a>
            </li>
            <li>
              <a href="<?=base_url()?>admin/news">View All</a>
            </li>
          </ul>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti6" data-parent="#exampleAccordion2">
            <i class="fa fa-fw fa-sitemap"></i>
            <span class="nav-link-text">Job</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseMulti6">
            <li>
              <a href="<?=base_url()?>admin/addJob">Add Job</a>
            </li>
            <li>
              <a href="<?=base_url()?>admin/job">View All</a>
            </li>
          </ul>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti4" data-parent="#exampleAccordion2">
            <i class="fa fa-fw fa-sitemap"></i>
            <span class="nav-link-text">Service</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseMulti4">
            <li>
              <a href="<?=base_url()?>admin/addService">Add Service</a>
            </li>
            <li>
              <a href="<?=base_url()?>admin/Service">View All</a>
            </li>
          </ul>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti5" data-parent="#exampleAccordion2">
            <i class="fa fa-fw fa-sitemap"></i>
            <span class="nav-link-text">About</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseMulti5">
            <li>
              <a href="<?=base_url()?>admin/addAbout">Add About</a>
            </li>
            <li>
              <a href="<?=base_url()?>admin/About">View All</a>
            </li>
          </ul>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti10" data-parent="#exampleAccordion2">
            <i class="fa fa-fw fa-sitemap"></i>
            <span class="nav-link-text">Statistics</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseMulti10">
            <li>
              <a href="<?=base_url()?>admin/addStatistics">Add New</a>
            </li>
            <li>
              <a href="<?=base_url()?>admin/Statistics">View All</a>
            </li>
          </ul>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti7" data-parent="#exampleAccordion2">
            <i class="fa fa-fw fa-sitemap"></i>
            <span class="nav-link-text">Contact Form</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseMulti7">
            <li>
              <a href="<?=base_url()?>admin/contact">View All</a>
            </li>
          </ul>
        </li>

      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
    
         
        <li class="nav-item">
          <form class="form-inline my-2 my-lg-0 mr-lg-2">
            <div class="input-group">
              <!-- <input class="form-control" type="text" placeholder="Search for...">
              <span class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fa fa-search"></i>
                </button>
              </span> -->
            </div>
          </form>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>