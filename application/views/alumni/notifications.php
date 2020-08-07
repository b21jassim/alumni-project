<!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">Notifications
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?=base_url()?>">Home</a>
        </li>
        <li class="breadcrumb-item active">Notification</li>
      </ol>

<div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8">
          
          <?php 
          foreach ($contact as $contact) {
            $total = $this->db->query(" SELECT count(*) AS total FROM `contact_reply` WHERE contact_id = '$contact->id' ")->row();
            if($total->total > 0){
              $notification = $this->db->get_where('contact_reply',array('contact_id'=>$contact->id))->result();
              $this->db->query(" UPDATE `contact_reply` SET `seen`= '1' WHERE contact_id = '$contact->id' ");
          ?>
          <!-- Comment with nested comments -->
          <div class="media mb-4">
            <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
            <div class="media-body">
              <h5 class="mt-0"><?=$contact->name?></h5>
              <?=$contact->message?>

              <?php foreach ($notification as $notification) { ?>
              <div class="media mt-4">
                <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                <div class="media-body">
                  <h5 class="mt-0">Admin</h5>
                  <?=$notification->message?>
                </div>
              </div>
              <?php } ?>
            </div>
          </div>
          <hr>
          <?php }} ?>
        </div>


      </div>
      <!-- /.row