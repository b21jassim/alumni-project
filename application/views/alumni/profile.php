    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">User Profile
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?=base_url()?>">Home</a>
        </li>
        <li class="breadcrumb-item active">User Profile</li>
      </ol>

      <!-- Contact Form -->
      <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
      <div class="row">
        <div class="col-lg-8 mb-4">
          <?php if($this->session->flashdata('true1')){ ?>
          <div class="alert alert-success">
            <strong>Success!</strong> <?=$this->session->flashdata('true1')?>
          </div>
          <?php } ?>
          <?php if($this->session->flashdata('error1')){ ?>
          <div class="alert alert-warning">
            <strong>Warning!</strong> <?=$this->session->flashdata('error1')?>
          </div>
          <?php } ?>
          <h3>Profile Data Here ...</h3>
          <form name="sentMessage" id="contactForm" method="post" action="<?=base_url()?>home/editProfile/<?=$user->id?>">
            <div class="control-group form-group">
              <div class="controls">
                <label>First Name:</label>
                <input type="text" class="form-control" name="first_name" value="<?=$user->first_name?>" required="" id="name">
                <p class="help-block"></p>
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <label for="recipient-name" class="col-form-label">Last Name:</label>
                <input type="text" class="form-control" name="last_name" value="<?=$user->last_name?>" required="" id="name">
                <p class="help-block"></p>
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <label for="recipient-name" class="col-form-label">User Name:</label>
                <input type="text" class="form-control" name="user_name" value="<?=$user->user_name?>" required="" id="name">
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <label for="recipient-name" class="col-form-label">Email:</label>
                <input type="email" class="form-control" name="email" value="<?=$user->email?>" required="" id="email">
                </select>
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <label for="recipient-name" class="col-form-label">Password:</label>
                <input type="password" class="form-control" name="password" id="password">
              </div>
            </div>
            <div id="success"></div>
            <!-- For success/fail messages -->
            <button type="submit" class="btn btn-primary" id="sendMessageButton">Edit</button>
          </form>
        </div>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->