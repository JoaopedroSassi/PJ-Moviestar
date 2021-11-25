<?php

   require_once('models/user.php');

   $userModel = new User();
   $fullname = $userModel->getFullName($review->user);

   if($review->user->image == ""){
      $review->user->image = "user.jpg";
   }

?>
<div class="col-md-12 review">
   <div class="row">
      <div class="col-md-1">
         <div class="profile-image-container review-image" style="background-image: url('<?= $BASE_URL ?>img/users/<?php echo $review->user->image ?>')"></div>
      </div>
      <div class="col-md-9 author-details-container">
         <h4 class="author-name">
            <a href="#"><?php echo $fullname ?></a>
         </h4>
         <p><i class="bi bi-star"></i><?php echo $review->rating ?></p>
      </div>
      <div class="col-md-12">
         <p class="comment-title">Comentário:</p>
         <p><?php echo $review->review ?></p>
      </div>
   </div>
</div>