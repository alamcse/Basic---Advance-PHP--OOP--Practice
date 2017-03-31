<?php 
$pageName = "Discussion";
include "include/header.php"; 

$post_id=$_GET['id'];
$blog= new Blogposts();
$blog->setPostId($post_id);

?>



<?php 

$comment= new CommentOfPosts();




?>

<!-- =========================topics starts=======================-->

<?php include "topic.php"; ?>

<!--====================== topic ends ==============-->


<!--====================== all questions starts ==============-->

<section>
<div class="col-md-7" id="all-questions">
        <?php
            foreach ($blog->readOnePost() as $key => $value) {
        ?>

        <a class="btn btn-success btn-block" id="nolink">Posted by <?php echo $value[4]; ?></a>
        <div class="panel panel-primary" style="border-radius:20px 0px 0px 0px">         
            <div class="panel-body" style="word-wrap:break-word">

                <div class="panel panel-info">
                    <div class="panel-heading"><?php echo $value[0]; ?></div>
                    <div class="panel-body"><?php echo $value[2]; ?></div>
                    <div class="panel-footer"><input class="btn btn-info" type="button" id="reply" value="Reply" onclick="setVisibility('reply-box');"> 
                    </div>
                </div>

                <?php  } 

                ?>

                <p>
                <?php 
                $comment->setPostId($post_id);
                $comm_num=0;
                foreach ($comment->readBlogAns() as $key => $value) {
                $comm_num++;} 
                if ($comm_num<2) {
                   echo $comm_num." comment";
                }
                else{
                    echo $comm_num." comments";
                }
                ?>
                </p>
 

                <form action="post_single.php?id=<?php echo $post_id; ?>" method="post" id="reply-box">
                    <textarea name="ans_of_post" id="text" placeholder="Write here..."></textarea>
                    <script>
                        CKEDITOR.replace( 'text' );
                    </script> 
                    <input type="submit" value="Reply" name="ans_of_post_submit" id="ck-reply">
                </form><br><br>


    <?php     
            if(isset($_POST['ans_of_post_submit'])){

                $ans_of_post=$_POST['ans_of_post'];

                if (empty($ans_of_post)) {
                    
                        echo "<div class=\"alert alert-danger\">
                                <a href=# class=close data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
                                <strong>OOppss!</strong> You have not written anything.</div>";

                }

                else{

                        $comment->setAnsOfPost($ans_of_post,$post_id);
                
                        if ($comment->insertAns()) {
                            echo "<div class=\"alert alert-success\">
                                <a href=# class=close data-dismiss=\"alert\" aria-label=\"close\">&times;</a>Your post has been submitted and is pending approval by an admin.</div>";
                        }

                        else{
                            echo "<div class=\"alert alert-danger\">
                                <a href=# class=close data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
                                <strong>OOppss!</strong>Failed to post.</div>";
                        }

                }


            }
        ?>

        <?php 
                foreach ($comment->readBlogAns() as $key => $value) {
            ?>

                <div class="panel panel-info">
                    <div class="panel-heading" id="ans_by"><?php echo $value[2]; ?></div>
                    <div class="panel-body" id="ans_post"><?php echo $value[1]; ?></div>
                </div>

        <?php } 
         ?>

            </div>
        </div>
</div>
</section>



  <!--end of main content-->

<?php 

include "include/sidebar.php";  

?>
  <!--end of sidebars-->

 <!--start of footer-->

<?php 

include "include/footer.php"; 

?>

  </body>

</html>
