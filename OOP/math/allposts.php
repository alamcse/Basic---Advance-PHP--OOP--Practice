<div  class="fullarticle" id="discussion1">

          <?php 

            spl_autoload_register(function($class){
              include "classes/".$class.".php";
            });

          $blog= new Blogposts(); 

          foreach ($blog->readBlogPosts() as $key => $value) {
          ?>
        <div class="panel panel-info">
            <div class="panel-heading" id="post"><?php echo $value[1]; ?></div>
            <div class="panel-footer"><?php echo "<a class=full-post href=post_single.php?id=".$value[0];?>>Full post</a>
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspPosted by <?php echo $value[5]; ?>

            <div class="pull-right">
            <?php 

            $id=0;

            foreach ($blog->readCommentNumber($value[0]) as $key => $value) { 

              $id++;
            }

            if ($id<2) {
              echo $id." comment";
            }
            else{
              echo $id." comments";
            }

            ?>
            </div>
            </div>
        </div>
<?php } ?>
</div>

