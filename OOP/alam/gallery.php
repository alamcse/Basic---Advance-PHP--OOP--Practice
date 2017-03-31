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

                
    <style type="text/css">
        .fancybox-custom .fancybox-skin {
            box-shadow: 0 0 50px #222;
        }
    </style>

    
<script type="text/javascript">
        $(document).ready(function() {
        
            /*
             *  Button helper. Disable animations, hide close button, change title type and content
             */

            $('.fancybox-buttons').fancybox({
                openEffect  : 'none',
                closeEffect : 'none',

                prevEffect : 'none',
                nextEffect : 'none',

                closeBtn  : false,

                helpers : {
                    title : {
                        type : 'inside'
                    },
                    buttons : {}
                },

                afterLoad : function() {
                    this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
                }
            });
        });
    </script>

    <h3>Photos Gellary</h3>

     <?php 
            for($i=1; $i<=14; $i++)
            {
            ?>
                <a class="fancybox-buttons" data-fancybox-group="button" href="fancybox/images/<?php echo $i?>.jpg"><img src="fancybox/images/<?php echo $i?>.jpg" alt="" width="150"height="120" style="vertical-align: baseline;"/></a>
            
            <?php
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