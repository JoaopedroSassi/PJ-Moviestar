<div class="col-md-12 review">
   <div class="row">
      <div class="col-md-1">
         <div class="profile-image-container review-image" style="background-image: url('<?= $BASE_URL ?>img/users/user.png')"></div>
      </div>
      <div class="col-md-9 author-details-container">
         <h4 class="author-name">
            <a href="#">Sephiroth tan</a>
         </h4>
         <p><i class="bi bi-star"></i><?php echo $review->rating ?></p>
      </div>
      <div class="col-md-12">
         <p class="comment-title">Comentário:</p>
         <p><?php echo $review->review ?></p>
      </div>
   </div>
</div>