<div class="fullarticle" id="discussion2">
    <form action="discussion.php" method="post" id="post-box">
    	<label>Post title:</label>
          <input name="post_title" type="text" class="form-control input-lg" style="border-color:blue;" required><br>
		<label>Post description:</label>
          <textarea name="ur_post" id="text"></textarea>
                    <script>
                        CKEDITOR.replace( 'text' );
                    </script> 
          <button type="submit" class="btn btn-info" name="urpost_submit" id="ck-reply">Reply</button>
    </form>
      



</div>