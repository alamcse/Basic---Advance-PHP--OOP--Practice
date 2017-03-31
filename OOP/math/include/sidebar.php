<section>


<?php
       $news= new News(); 


          ?>

			<div class="col-md-3">
				<a class="btn btn-primary btn-block" id="nolink"><strong>Science News</strong></a>
				<div class="panel panel-primary" style="border-radius:20px 0px 20px 0px">
					<div class="panel-body">
						<div class="row">
							<div class="col-xs-12">
								<ul class="demo1">

									<?php 
									     foreach ($news->readAllNews() as $key => $value) { ?>

									<li class="news-item">
										<table cellpadding="4">
											<tr height="50px">
												<td><?php echo $value[1] ?><a href="#">Read more...</a></td>
											</tr>
										</table>
									</li>

									<?php } ?>
									
								</ul>
							</div>
						</div>
					</div>
					<div class="panel-footer" style="padding:0px;">
					</div>
				</div>
			</div>
</section>
</div> <!-- end of content-->



