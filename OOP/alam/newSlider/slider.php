﻿	<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="js/jssor.slider.mini.js"></script>
    <!-- use jssor.slider.debug.js instead for debug -->
    <script>
        jQuery(document).ready(function($) {

            var jssor_1_options = {
                $AutoPlay: true,
                $DragOrientation: 2,
                $PlayOrientation: 2,
                $ArrowNavigatorOptions: {
                    $Class: $JssorArrowNavigator$
                }
            };

            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizing
            function ScaleSlider() {
                var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
                if (refSize) {
                    refSize = Math.min(refSize, 600);
                    jssor_1_slider.$ScaleWidth(refSize);
                } else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }
            ScaleSlider();
            $(window).bind("load", ScaleSlider);
            $(window).bind("resize", ScaleSlider);
            $(window).bind("orientationchange", ScaleSlider);
            //responsive code end
        });
    </script>

    <style>
        /* jssor slider arrow navigator skin 08 css */
        /*
        .jssora08l                  (normal)
        .jssora08r                  (normal)
        .jssora08l:hover            (normal mouseover)
        .jssora08r:hover            (normal mouseover)
        .jssora08l.jssora08ldn      (mousedown)
        .jssora08r.jssora08rdn      (mousedown)
        */
        
        .jssora08l,
        .jssora08r {
            display: block;
            position: absolute;
            /* size of arrow element */
            width: 50px;
            height: 50px;
            cursor: pointer;
            background: url('image/a08.png') no-repeat;
            overflow: hidden;
            opacity: .4;
            filter: alpha(opacity=40);
        }
        
        .jssora08l {
            background-position: -5px -35px;
        }
        
        .jssora08r {
            background-position: -65px -35px;
        }
        
        .jssora08l:hover {
            background-position: -5px -35px;
            opacity: .8;
            filter: alpha(opacity=80);
        }
        
        .jssora08r:hover {
            background-position: -65px -35px;
            opacity: .8;
            filter: alpha(opacity=80);
        }
        
        .jssora08l.jssora08ldn {
            background-position: -5px -35px;
            opacity: .3;
            filter: alpha(opacity=30);
        }
        
        .jssora08r.jssora08rdn {
            background-position: -65px -35px;
            opacity: .3;
            filter: alpha(opacity=30);
        }
    </style>

    <div id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 600px; height: 300px; overflow: hidden; visibility: hidden;">
        <!-- Loading Screen -->
        <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
            <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
            <div style="position:absolute;display:block;background:url('image/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
        </div>
        <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 600px; height: 300px; overflow: hidden;">
            <div data-p="112.50" style="display: none;">
                <img data-u="image" src="image/01.jpg" />
            </div>
            <div data-p="112.50" style="display: none;">
                <img data-u="image" src="image/02.jpg" />
            </div>
            <div data-p="112.50" style="display: none;">
                <img data-u="image" src="image/03.jpg" />
            </div>
            <div data-p="112.50" style="display: none;">
                <img data-u="image" src="image/04.jpg" />
            </div>
            <a data-u="ad" href="http://www.jssor.com" style="display:none">Responsive Slider</a>

        </div>
        <!-- Arrow Navigator -->
        <span data-u="arrowleft" class="jssora08l" style="top:8px;left:8px;width:50px;height:50px;" data-autocenter="1"></span>
        <span data-u="arrowright" class="jssora08r" style="bottom:8px;right:8px;width:50px;height:50px;" data-autocenter="1"></span>
    </div>

    <!-- #endregion Jssor Slider End -->
