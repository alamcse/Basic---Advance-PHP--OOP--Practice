<?php include'config.php'?>
<?php include 'includes/head.php'; ?>

<body>
    
  <div class="container-fluid" style="background-color: #BAE6DC;">

    <?php include 'includes/menu.php'; ?>

            <div class="row">
        <header>
            <img style="width: 100%; max-height: 200px; margin-top: 48px;" src="img/header.png" alt="header">
        </header> <!-- header -->
    </div>
    <br>

		    <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3">
                <div class="panel" style="max-height: 600px; min-height: 300px;">
                    <div class="panel-body">
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                        </p>
                    </div>  
                </div>
            </div>

			<div class="col-xs-12 col-sm-12 col-md-4 col-lg-6">
                
                <h4 style="text-align:center; margin:0;">E-Book Gellary</h4>
                <hr>
                    <?php
                      $statement=$db->prepare("select * from ebook ");
                      $statement->execute(array());
                      $result=$statement->fetchAll(PDO::FETCH_ASSOC);
                      foreach ($result as $row)
                      {
                      
                      ?>
                   <div class="media">
                        <div class="pull-left"><img src="img/pdf.png" width="48" height="48"></div>
                        <div class="media-body"><strong><?php echo $row['books']; ?> <span class="label label-default"> <?php echo $row['book_size']; ?> KB</span></strong>
                            <div><strong><a href="book/<?php echo $row['books']; ?>" target="_blank">View / Download</a></strong></div>
                        </div>
                    </div>
                    <?php
                    echo"<br>";
                        }
                    ?>
                </div>

			<div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-4 col-lg-3 col-lg-offset-0">
        <div class="panel panel-default">
                    <div class="panel-heading text-center"><h4>Social Link</h4></div>
                    <div class="panel-body text-center">

                        <div class="social-link">
                            <div class="box" id="facebook"><a href="#">&#62220;</a></div>
                            <div class="box" id="twitter"><a href="#">&#62217;</a></div>
                            <div class="box" id="google"><a href="#">&#62223;</a></div>
                            <div class="box" id="linkedin"><a href="#">&#62232;</a></div>
                        </div> <!--  social-link  -->

                    </div>                      
                </div>
                <div class="panel">
                    <div class="panel-body">

                <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="active">
                                <a data-toggle="tab" href="#latest" role="tab">Latest</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#MostViewed" role="tab">Most Viewed</a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="latest" role="tabpanel">
                                <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</li>
                                <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</li>
                                <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</li>
                                <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</li>
                                <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</li>
                            </div>
                            <div class="tab-pane fade" id="MostViewed" role="tabpanel">
                                <li>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                                <li>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                                <li>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                                <li>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                                <li>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                            </div>
                        </div>  
                    </div>

                </div>
        
      </div>
            </div>
	
            <?php include 'includes/footer.php'; ?>