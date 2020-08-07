<div class="content-wrapper">
    <div class="container-fluid">
      <!--slider-->
      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="<?=base_url()?>assets/img/suestaffheader.jpg" alt="First slide">
      <div class="carousel-caption d-none d-md-block" >
    <h2 style="float:left;">Edit Statistics</h2>


  </div>

    </div>

  </div>
 
</div>

 
 
 
      <div class="row">
        <div class="col-lg-12">
          <!-- Example DataTables Card--><br><br>
          <center><h2>Edit Statistics</h2></center>
          <br>
         
 

         <!-- Button trigger modal -->
 
          <br><br>

 <form method="post" action="<?=base_url()?>admin/doEditStatistics/<?=$statistics->id?>" enctype="multipart/form-data">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Title:</label>
            <input type="text" class="form-control" name="name" value="<?=$statistics->name?>" required="" id="name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Number:</label>
            <textarea name="number" required="" class="form-control"><?=$statistics->number?></textarea>
          </div>

          <div class="modal-footer">
        <input type="submit" value="SAVE" class="btn btn-primary btn-block">
      </div>
        </form>
        <br><br>
<br><br>



 
    </div>
 <!-- Example DataTables Card-->
 
    </div>
    </div>