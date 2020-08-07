    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">Contact
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?=base_url()?>">Home</a>
        </li>
        <li class="breadcrumb-item active">Contact</li>
      </ol>

      <!-- Contact Form -->
      <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
      <div class="row">
        <div class="col-lg-8 mb-4">
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
          <h3>Send us a Message</h3>
          <form name="sentMessage" id="contactForm" method="post" action="<?=base_url()?>home/doAddContact" enctype="multipart/form-data">
            <?php
            if (!$this->session->userdata('login')){
            ?>
            <div class="control-group form-group">
              <div class="controls">
                <label>Full Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
                <p class="help-block"></p>
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <label>Email Address:</label>
                <input type="email" class="form-control" id="email" name="email" required="">
              </div>
            </div>
            <?php }else{
            $check = $this->session->userdata('login');
            $id = $check['id'];
            $user_data = $this->db->get_where('users',array('id'=>$id))->row(); 
            ?>
            <input type="text" class="form-control" id="name" name="name" value="<?=$user_data->user_name?>" required hidden="">
            <input type="email" class="form-control" id="email" name="email" value="<?=$user_data->email?>" required="" hidden="">
            <?php } ?>
            <div class="control-group form-group">
              <div class="controls">
                <label>Message Type:</label>
                <select name="type" required="" name="type" class="form-control">
                  <option selected="" disabled="">-- Select Message Type --</option>
                  <option value="1">New Job</option>
                  <option value="2">New Event</option>
                  <option value="3">Direct Message</option>
                </select>
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <label>Attachment:</label>
                <input type="file" class="form-control" name="file">
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <label>Message:</label>
                <textarea rows="10" cols="100" class="form-control" id="message" name="message" required maxlength="999" style="resize:none"></textarea>
              </div>
            </div>
            <div id="success"></div>
            <!-- For success/fail messages -->
            <button type="submit" class="btn btn-primary" id="sendMessageButton">Send Message</button>
          </form>
        </div>

         <!-- Contact Details Column -->
        <div class="col-lg-4 mb-4">
          <h3>Contact Details</h3>
          <p>
            3481 Melrose Place
            <br>Beverly Hills, CA 90210
            <br>
          </p>
          <p>
            <abbr title="Phone">P</abbr>: (123) 456-7890
          </p>
          <p>
            <abbr title="Email">E</abbr>:
            <a href="mailto:name@example.com">name@example.com
            </a>
          </p>
          <p>
            <abbr title="Hours">H</abbr>: Monday - Friday: 9:00 AM to 5:00 PM
          </p>
        </div>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->