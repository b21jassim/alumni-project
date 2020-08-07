<div class="content-wrapper">
    <div class="container-fluid">
      <!--slider-->
      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="<?=base_url()?>assets/img/suestaffheader.jpg" alt="First slide">
      <div class="carousel-caption d-none d-md-block" >
    <h2 style="float:left;">Alumni Users</h2>


  </div>

    </div>

  </div>
 
</div>

 
 
 
      <div class="row">
        <div class="col-lg-12">
          <!-- Example DataTables Card--><br><br>
          <center><h2>Alumni Users List</h2></center>
          <br>
         
     <form method="post" action="<?=base_url()?>admin/users" class="form-inline my-2 my-lg-0 mr-lg-2">
            <div class="input-group">

            <input class="form-control" type="text" name="name" placeholder="Searching for Name...">
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
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  Add New Member
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add New Member</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" onsubmit="return validatePassword()" action="<?=base_url()?>admin/addUser">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">First Name:</label>
            <input type="text" class="form-control" name="first_name" required="" id="name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Last Name:</label>
            <input type="text" class="form-control" name="last_name" required="" id="name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">User Name:</label>
            <input type="text" class="form-control" name="user_name" required="" id="name">
          </div>
           <div class="form-group">
            <label for="recipient-name" class="col-form-label">Email:</label>
            <input type="email" class="form-control" name="email" required="" id="email">
          </div>
            <div class="form-group">
            <label for="recipient-name" class="col-form-label">Password:</label>
            <input type="password" class="form-control" name="password" required="" id="password">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Description :</label>
            <textarea name="description" class="form-control"></textarea>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Address:</label>
            <input type="text" class="form-control" name="address" id="name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Phone:</label>
            <input type="text" class="form-control" name="phone" id="name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Role:</label>
            <select name="role" required="" class="form-control"> 
               <option></option>
               <?=$this->Admin_model->getRole()?>
            </select>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <input type="submit" value="ADD New Member" class="btn btn-primary">
      </div>
        </form>
    </div>
  </div>
</div>
          <br><br>


<table class="table"  style="margin-bottom:220px;" >
  <thead class="thead-light">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">User Name</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">email</th>
      <th scope="col">Password</th>
      <th scope="col">Description</th>
      <th scope="col">Phone</th>
      <th scope="col">Address</th>
      <th scope="col">Role</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($user as $user) { ?>
    <tr>
      <th scope="row"><?=$user->id?></th>
      <th scope="row"><?=$user->user_name?></th>
      <th scope="row"><?=$user->first_name?></th>
      <th scope="row"><?=$user->last_name?></th>
      <th scope="row"><?=$user->email?></th>
      <td>********</td>
      <th scope="row"><?=$user->description?></th>
      <th scope="row"><?=$user->phone?></th>
      <th scope="row"><?=$user->address?></th>
      <th scope="row"><?=$this->Admin_model->getRoleName($user->role)?></th>
      <td><p data-placement="top" data-toggle="tooltip" title="Edit"><a href="<?=base_url()?>admin/editUser/<?=$user->id?>" class="btn btn-primary btn-xs" data-title="Edit" data-toggle  ><span class="fa fa-fw fa-pencil"></span></a></p></td>
      <td><p data-placement="top" data-toggle="tooltip" title="Delete"><a href="#" class="btn btn-danger btn-xs" data-title="Delete" onclick="delete_user(<?=$user->id?>)" data-target="#delete" ><span class="fa fa-fw fa-trash"></span>
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
    function delete_user(x) {
        var r = confirm(" Do You Really Want To Delete This User !!");
        if (r == true) {
            window.location = "<?=base_url()?>admin/deleteUser/" + x;
        } else {}
    }
    function validatePassword(){
      var password = $("#password").val();
      var Exp = /((^[0-9]+[a-z]+)|(^[a-z]+[0-9]+))+[0-9a-z]+$/i;

      if(!(password.match(Exp) && password.length >= 6)){
        alert("Please input alphanumeric characters only at least 6 characters ...");
        return false;
      }else{
        return true;
      }
    }
</script>