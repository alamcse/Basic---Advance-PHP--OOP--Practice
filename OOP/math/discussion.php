<?php 
$pageName = "Discussion";
include "include/header.php"; 

$comment= new CommentOfPosts();
$blog= new Blogposts();


?>


<!-- =========================topics starts=======================-->

<?php include "topic.php"; 


?>

<!--====================== topic ends ==============-->


<!--====================== all post starts ==============-->
<section>
<div class="col-md-7">
                  <div class="btn-group btn-group-justified" id="menus">
                    
                  <a href="allposts" class="btn btn-success" id="category" style="border-radius:20px 0px 20px 0px">Discussion</a>
                  <a href="posturblog" class="btn btn-primary" id="category" style="border-radius:20px 0px 20px 0px">Post</a>
                  <a href="yourallposts" class="btn btn-info" id="category" style="border-radius:20px 0px 20px 0px">Your all posts</a>
                  <a href="uncommented" class="btn btn-danger" id="category" style="border-radius:20px 0px 20px 0px">Uncommented</a>
                </div>
          <div class="panel panel-primary" style="border-radius:20px 0px 0px 0px"  id="all-posts">


<?php     
            if(isset($_POST['urpost_submit'])){

                $post_title=$_POST['post_title'];
                $ur_post=$_POST['ur_post'];

                if (empty($ur_post)){
                    
                        echo "<br><div class=\"alert alert-danger\">
                                <a href=# class=close data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
                                <h4><strong>OOppss! Failed to post.</strong>  You post description is empty.</h4></div>";
   
    }

                else{

                        $blog->setYourPost($ans_of_post);
                
                        if ($blog->insertPost()) {
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



            <div class="panel-body" id="allcontents">

<!--=====================show all post========================-->



 <!--=====================show all post========================-->
        

    

<!--=====================Post your post========================-->



<!--=====================Post your post========================-->



<!--=====================Post your post========================-->



<!--=====================Post your post========================-->


<!--=====================Uncommented========================-->

<!--=====================Uncommented========================-->



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
