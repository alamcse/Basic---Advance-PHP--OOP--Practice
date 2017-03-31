<div  class="fullarticle" id="discussion1">

          <?php 
          $blog= new Blogposts();
          foreach ($blog->readBlogPosts() as $key => $value) {
          ?>
        <div class="panel panel-default">
            <div class="panel-heading" id="post"><?php echo $value[1]; ?></div>
            <div class="panel-footer"><?php echo "<a class=full-post href=post_single.php?id=".$value[0];?>>Full post</a>
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspPosted by <?php echo $value[4]; ?>

              <div class="pull-right"><?php 

                    $post_id=$value[0];
                    foreach ($comment->readCommentNumber($post_id) as $key => $value) {
                ?>

                <?php echo $value[0]; ?> comments
              </div>
                <?php } ?>
            </div>
        </div>
<?php } ?></div>