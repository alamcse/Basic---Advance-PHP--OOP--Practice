<section>
<div class="col-md-2" id="topics">
        <a class="btn btn-primary btn-block" id="nolink"><strong>Topics</strong></a>
        <div class="panel panel-primary" style="border-radius:20px 0px 0px 0px">
            <div class="panel-body">
                <ul  style="word-wrap:break-word;list-style-type:none;">
                    <?php 
                        foreach ($blog->readBlogCategories() as $key => $value) {
                        ?>
                        <li><?php echo $value['category']; ?></li><?php } ?>
                </ul>
            </div>
        </div>
</div>
</section>