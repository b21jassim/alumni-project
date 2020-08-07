<!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">Find Alumni</h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?=base_url()?>">Home</a>
        </li>
        <li class="breadcrumb-item active">Find Alumni</li>
      </ol>

      <div class="row col-lg-12 mb-4">
        <form action="<?=base_url()?>home/findAlimni" method="post">
        <div class="control-group form-group">
          <div class="controls">
            <label>Full Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
            <p class="help-block"></p>
          </div><input type="submit" name="search" value="Search" class="btn btn-primary">
        </div>
        </form>
      </div>

      <!-- Marketing Icons Section -->
      <div class="row">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">User Name</th>
              <th scope="col">First Name</th>
              <th scope="col">Last Name</th>
              <th scope="col">email</th>
              <th scope="col">Description</th>
              <th scope="col">Phone</th>
              <th scope="col">Address</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($user as $user) { ?>
            <tr>
              <th scope="row"><?=$user->user_name?></th>
              <th scope="row"><?=$user->first_name?></th>
              <th scope="row"><?=$user->last_name?></th>
              <th scope="row"><?=$user->email?></th>
              <th scope="row"><?=$user->description?></th>
              <th scope="row"><?=$user->phone?></th>
              <th scope="row"><?=$user->address?></th>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->
    <div style="height: 60px;">
      
    </div>