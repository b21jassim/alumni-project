<div class="content-wrapper">
    <div class="container-fluid">
      <!--slider-->
      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="<?=base_url()?>assets/img/suestaffheader.jpg" alt="First slide">
      <div class="carousel-caption d-none d-md-block" >
    <h2 style="float:left;">SEU User</h2>


  </div>

    </div>

  </div>
 
</div>

 
 
 
      <div class="row">
        <div class="col-lg-12">
          <!-- Example DataTables Card--><br><br>
          <center><h2>Edit SEU User</h2></center>
          <br>
         <!-- Button trigger modal -->
 
          <br><br>
<form method="post" action="<?=base_url()?>admin/doEditUser/<?=$user->id?>">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">First Name:</label>
            <input type="text" class="form-control" name="first_name" value="<?=$user->first_name?>" required="" id="name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Last Name:</label>
            <input type="text" class="form-control" name="last_name" value="<?=$user->last_name?>" required="" id="name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">User Name:</label>
            <input type="text" class="form-control" name="user_name" value="<?=$user->user_name?>" required="" id="name">
          </div>
           <div class="form-group">
            <label for="recipient-name" class="col-form-label">Email:</label>
            <input type="email" class="form-control" name="email" value="<?=$user->email?>" required="" id="email">
          </div>
            <div class="form-group">
            <label for="recipient-name" class="col-form-label">Password:</label>
            <input type="password" class="form-control" name="password" id="password">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Description :</label>
            <textarea name="description" class="form-control"><?=$user->description?></textarea>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Address:</label>
            <input type="text" class="form-control" name="address" value="<?=$user->address?>" id="name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Phone:</label>
            <input type="text" class="form-control" name="phone" value="<?=$user->phone?>" id="name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Role:</label>
            <select name="role" required="" class="form-control"> 
               <option></option>
               <?=$this->Admin_model->getRole($user->role)?>
            </select>
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