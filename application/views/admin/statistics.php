<div class="content-wrapper">
    <div class="container-fluid">
      <!--slider-->
      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="<?=base_url()?>assets/img/suestaffheader.jpg" alt="First slide">
      <div class="carousel-caption d-none d-md-block" >
    <h2 style="float:left;">Statistics</h2>


  </div>

    </div>

  </div>
 
</div>
 
 
      <div class="row">
        <div class="col-lg-12">
          <!-- Example DataTables Card--><br><br>
          <center><h2>Statistics List</h2></center>
          <br>
         
     <form method="post" action="<?=base_url()?>admin/statistics" class="form-inline my-2 my-lg-0 mr-lg-2">
            <div class="input-group">

            <input class="form-control" type="text" name="title" placeholder="Searching for Title...">
            <span class="input-group-append">
              <button class="btn btn-primary" type="submit" name="search" type="button">
                <i class="fa fa-search"></i>
              </button>
            </span>
        </div>
      </form>
      <br><br>
    <?php if($this->session->flashdata('true')){ ?>
    <div class="alert alert-success">
      <strong>Success!</strong> <?=$this->session->flashdata('true')?>
    </div>
    <?php } ?>
    <?php if($this->session->flashdata('error')){ ?>
    <div class="alert alert-warning">
      <strong>Warning!</strong> <?=$this->session->flashdata('error')?>
    </div>
    <?php } ?>

         <!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  Add New Member
</button> -->
          <br><br>


<table class="table"  style="margin-bottom:220px;" >
  <thead class="thead-light">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Title</th>
      <th scope="col">Number</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($statistics as $statistics) { ?>
    <tr>
      <th scope="row"><?=$statistics->id?></th>
      <th scope="row"><?=$statistics->name?></th>
      <th scope="row"><?=$statistics->number?></th>
      <td><p data-placement="top" data-toggle="tooltip" title="Edit"><a href="<?=base_url()?>admin/editStatistics/<?=$statistics->id?>" class="btn btn-primary btn-xs" data-title="Edit" data-toggle  ><span class="fa fa-fw fa-pencil"></span></a></p></td>
      <td><p data-placement="top" data-toggle="tooltip" title="Delete"><a href="#" onclick="deleteStatistics(<?=$statistics->id?>)" class="btn btn-danger btn-xs" data-title="Delete" onclick="deleteStatistics(<?=$statistics->id?>)" data-target="#deletejob" ><span class="fa fa-fw fa-trash"></span></a>
      </p></td>
    </tr>
    <?php } ?>
  </tbody>
</table>

 
    </div>
 <!-- Example DataTables Card-->
 
    </div>
    </div>
<script type="text/javascript">
    function deleteStatistics(x) {
        var r = confirm(" Do You Really Want To Delete This Row !!");
        if (r == true) {
            window.location = "<?=base_url()?>admin/deleteStatistics/" + x;
        } else {}
    }
</script>