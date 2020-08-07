<div class="content-wrapper">
    <div class="container-fluid">
      <!--slider-->
      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="<?=base_url()?>assets/img/suestaffheader.jpg" alt="First slide">
      <div class="carousel-caption d-none d-md-block" >
    <h2 style="float:left;">Contact</h2>


  </div>

    </div>

  </div>
 
</div>
 
 
      <div class="row">
        <div class="col-lg-12">
          <!-- Example DataTables Card--><br><br>
          <center><h2>Contact List</h2></center>
          <br>
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
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Type</th>
      <th scope="col">Message</th>
      <th scope="col">Reply</th>
      <th scope="col">File</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($contact as $contact) { ?>
    <tr>
      <th scope="row"><?=$contact->id?></th>
      <th scope="row"><?=$contact->name?></th>
      <th scope="row"><?=$contact->email?></th>
      <th scope="row"><?php if($contact->type == 1){echo "New Job";}elseif($contact->type == 2){echo "New Event";}elseif($contact->type == 3){echo "Direct Message";}?></th>
      <th scope="row"><?=$contact->message?></th>
      <th scope="row"><?php
          if($contact->user_id > 0) 
            echo "<a href='#' data-toggle='modal' data-target='#exampleModalCenter_".$contact->id."'>Reply</a>";
      ?></th>
      <th scope="row">
        <?php if(strlen($contact->file ) > 5){ ?>
          <a target="_blank" href="<?=base_url()?>assets/uploads/<?=$contact->file?>">View File</a>
        <?php } ?>
      </th>
      <th scope="row"><p data-placement="top" data-toggle="tooltip" title="Delete"><a href="#" class="btn btn-danger btn-xs" data-title="Delete" onclick="delete_contact(<?=$contact->id?>)" ><span class="fa fa-fw fa-trash"></span></a>
      </p></th>
    </tr>

    <!-- Modal -->
<div class="modal fade" id="exampleModalCenter_<?=$contact->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Reply Message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?=base_url()?>admin/addReply/<?=$contact->id?>">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Message:</label>
            <textarea name="message" required="" class="form-control"></textarea>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <input type="submit" value="ADD New Reply" class="btn btn-primary">
      </div>
        </form>
    </div>
  </div>
</div>
    <?php } ?>
  </tbody>
</table>

 
    </div>
 <!-- Example DataTables Card-->
 
    </div>
    </div>
    <script type="text/javascript">
        function delete_contact(x) {
            var r = confirm(" Do You Really Want To Delete This Contact Row !!");
            if (r == true) {
                window.location = "<?=base_url()?>admin/deleteContact/" + x;
            } else {}
        }
    </script>