 /* addEventListener("load", function() { 
 	setTimeout(hideURLbar, 0); }, false); 
 	function hideURLbar(){ 
 	window.scrollTo(0,1); }  */

/*========= scroll to top then fixed navbar=========== */

              jQuery(document).ready(function($) {
                $(".scroll").click(function(event){   
                  event.preventDefault();
                  $('html,body').animate({scrollTop:$(this.hash).offset().top},900);
                });
              });

/*========= reply box show hide=========== */

/*========= reply box show hide=========== */

    function setVisibility(id) {
            if(document.getElementById('reply').value=='Cancel'){
            	document.getElementById('reply').value = 'Reply';
            	document.getElementById(id).style.display = 'none';
            }else{
            	document.getElementById('reply').value = 'Cancel';
            	document.getElementById(id).style.display = 'inline';
            }
        }

/*========= reply box show hide=========== */


/*========= discussion page category switching=========== */

$(document).ready(function(){
    $('#allcontents').load('allposts.php');

    //handle menu clicks
    $('a#category').click(function(){
        var page= $(this).attr('href');
        $('#allcontents').load('' + page + '.php');
        return false;

    });
});

/*========= discussion page category switching=========== */


/*========= page loading style=========== */
  // Wait for window load
    $(window).load(function() {
        // Animate loader off screen
        $(".se-pre-con").fadeOut(500);;
    });
/*========= page loading style=========== */



/*========= Regular expression for input field validation=========== */
function CPOnlyAlphaNumeric(t) { 
t.value = t.value.toString().replace(/[^0-9,\.-]*$/g,'');
}

/*========= Regular expression for input field=========== */



/*========= form field clear=========== */
function clear_form_elements(ele) {

    $(ele).find(':input').each(function() {
        switch(this.type) {

            case 'text':
                $(this).val('');
                break;
        }
    });

}
/*========= form field clear=========== */

var nVer = navigator.appVersion;
var nAgt = navigator.userAgent;
var browserName  = navigator.appName;
var fullVersion  = ''+parseFloat(navigator.appVersion); 
var majorVersion = parseInt(navigator.appVersion,10);
var nameOffset,verOffset,ix;

// In Opera 15+, the true version is after "OPR/" 
if ((verOffset=nAgt.indexOf("OPR/"))!=-1) {
 browserName = "Opera";
 fullVersion = nAgt.substring(verOffset+4);
}
// In older Opera, the true version is after "Opera" or after "Version"
else if ((verOffset=nAgt.indexOf("Opera"))!=-1) {
 browserName = "Opera";
 fullVersion = nAgt.substring(verOffset+6);
 if ((verOffset=nAgt.indexOf("Version"))!=-1) 
   fullVersion = nAgt.substring(verOffset+8);
}
// In MSIE, the true version is after "MSIE" in userAgent
else if ((verOffset=nAgt.indexOf("MSIE"))!=-1) {
 browserName = "Microsoft Internet Explorer";
 fullVersion = nAgt.substring(verOffset+5);
}
// In Chrome, the true version is after "Chrome" 
else if ((verOffset=nAgt.indexOf("Chrome"))!=-1) {
 browserName = "Chrome";
 fullVersion = nAgt.substring(verOffset+7);
}
// In Safari, the true version is after "Safari" or after "Version" 
else if ((verOffset=nAgt.indexOf("Safari"))!=-1) {
 browserName = "Safari";
 fullVersion = nAgt.substring(verOffset+7);
 if ((verOffset=nAgt.indexOf("Version"))!=-1) 
   fullVersion = nAgt.substring(verOffset+8);
}
// In Firefox, the true version is after "Firefox" 
else if ((verOffset=nAgt.indexOf("Firefox"))!=-1) {
 browserName = "Firefox";
 fullVersion = nAgt.substring(verOffset+8);
}
// In most other browsers, "name/version" is at the end of userAgent 
else if ( (nameOffset=nAgt.lastIndexOf(' ')+1) < 
          (verOffset=nAgt.lastIndexOf('/')) ) 
{
 browserName = nAgt.substring(nameOffset,verOffset);
 fullVersion = nAgt.substring(verOffset+1);
 if (browserName.toLowerCase()==browserName.toUpperCase()) {
  browserName = navigator.appName;
 }
}
// trim the fullVersion string at semicolon/space if present
if ((ix=fullVersion.indexOf(";"))!=-1)
   fullVersion=fullVersion.substring(0,ix);
if ((ix=fullVersion.indexOf(" "))!=-1)
   fullVersion=fullVersion.substring(0,ix);

majorVersion = parseInt(''+fullVersion,10);
if (isNaN(majorVersion)) {
 fullVersion  = ''+parseFloat(navigator.appVersion); 
 majorVersion = parseInt(navigator.appVersion,10);
}

//document.write('Browser: '+browserName+' '+fullVersion)


//================= News box============================//


    $(function () {
        $(".demo1").bootstrapNews({
            newsPerPage: 5,
            autoplay: true,
            pauseOnHover:true,
            direction: 'up',
            newsTickerInterval: 1500,
            onToDo: function () {
                //console.log(this);
            }
        });
    });

//================= end of News box============================//