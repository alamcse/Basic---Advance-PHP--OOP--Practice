$( document ).ready( function( )
{	
	// Create Base64 Object
	var Base64={_keyStr:"ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",encode:function(e){var t="";var n,r,i,s,o,u,a;var f=0;e=Base64._utf8_encode(e);while(f<e.length){n=e.charCodeAt(f++);r=e.charCodeAt(f++);i=e.charCodeAt(f++);s=n>>2;o=(n&3)<<4|r>>4;u=(r&15)<<2|i>>6;a=i&63;if(isNaN(r)){u=a=64}else if(isNaN(i)){a=64}t=t+this._keyStr.charAt(s)+this._keyStr.charAt(o)+this._keyStr.charAt(u)+this._keyStr.charAt(a)}return t},decode:function(e){var t="";var n,r,i;var s,o,u,a;var f=0;e=e.replace(/[^A-Za-z0-9\+\/\=]/g,"");while(f<e.length){s=this._keyStr.indexOf(e.charAt(f++));o=this._keyStr.indexOf(e.charAt(f++));u=this._keyStr.indexOf(e.charAt(f++));a=this._keyStr.indexOf(e.charAt(f++));n=s<<2|o>>4;r=(o&15)<<4|u>>2;i=(u&3)<<6|a;t=t+String.fromCharCode(n);if(u!=64){t=t+String.fromCharCode(r)}if(a!=64){t=t+String.fromCharCode(i)}}t=Base64._utf8_decode(t);return t},_utf8_encode:function(e){e=e.replace(/\r\n/g,"\n");var t="";for(var n=0;n<e.length;n++){var r=e.charCodeAt(n);if(r<128){t+=String.fromCharCode(r)}else if(r>127&&r<2048){t+=String.fromCharCode(r>>6|192);t+=String.fromCharCode(r&63|128)}else{t+=String.fromCharCode(r>>12|224);t+=String.fromCharCode(r>>6&63|128);t+=String.fromCharCode(r&63|128)}}return t},_utf8_decode:function(e){var t="";var n=0;var r=c1=c2=0;while(n<e.length){r=e.charCodeAt(n);if(r<128){t+=String.fromCharCode(r);n++}else if(r>191&&r<224){c2=e.charCodeAt(n+1);t+=String.fromCharCode((r&31)<<6|c2&63);n+=2}else{c2=e.charCodeAt(n+1);c3=e.charCodeAt(n+2);t+=String.fromCharCode((r&15)<<12|(c2&63)<<6|c3&63);n+=3}}return t}}
	
	var tutorialShowingID = -1;
	
	$( ".info-links" ).click( function( )
	{
		if ( $( this ).data( "infotype" ) === "about" )
		{
			$( "#footer-section-title-big-info" ).fadeOut( function( )
			{ $( this ).text( "About Us" ).fadeIn( ); } );
			
			$( "#footer-big-info-body" ).fadeOut( function( )
			{ $( this ).html( "Sonar Learning is a free online education platform for everyone everywhere, all you need is an internet connection and a burning desire to learn. Several years ago we envisioned a platform to tackle the lack of resources readily available for billion pound industries. Two words, EDUCATION EQUALITY!" ).fadeIn( ); } );
		}
		else if ( $( this ).data( "infotype" ) === "mission" )
		{
			$( "#footer-section-title-big-info" ).fadeOut( function( )
			{ $( this ).text( "Our Mission" ).fadeIn( ); } );
			
			$( "#footer-big-info-body" ).fadeOut( function( )
			{ $( this ).html( "We aim to break free the shackles of education and allow anyone, anywhere to learn and enhance themselves through the power of education. It's pretty simple: we aren't elite in whom we take but elite in what we offer!" ).fadeIn( ); } );
		}
		else if ( $( this ).data( "infotype" ) === "contact" )
		{
			$( "#footer-section-title-big-info" ).fadeOut( function( )
			{ $( this ).text( "Contact Us" ).fadeIn( ); } );
			
			$( "#footer-big-info-body" ).fadeOut( function( )
			{ $( this ).html( "Have questions, feedback or just want to message us<br /><br /><a href='mailto:support@sonarsystems.co.uk' target='_blank'>support@sonarsystems.co.uk</a>" ).fadeIn( ); } );
		}
		
 		$( 'html, body' ).animate( { scrollTop: $( "#footer-big-info-body" ).offset( ).top }, 1000 );
	} );
	
	$( ".course-lesson-row" ).click( function( event )
	{
		var videoIndex = $( this ).data( "videoindex" );
		
		var clickPos = event.pageY - $( this ).offset().top;
		var boxHeight = GetLessonBoxHeight( $( this ) );
				
		if ( clickPos < boxHeight && !$( event.target ).hasClass( 'lesson-checkbox' ) && !$( event.target ).hasClass( 'second-icon fui-checkbox-checked' ) )
		{
			$( "div" ).removeClass( "selected-lesson-even" );
			$( "div" ).removeClass( "selected-lesson-odd" );
			$( "div" ).removeClass( "white-play-button" );
			$( ".youtube-video" ).remove();
			$( ".video-sub-section-containers" ).remove();
			$( ".save-button" ).remove();
			$( ".note-save-status" ).remove();
			$( ".courseLessonExtraButtonContainer" ).remove();
			//$( '.popover' ).remove( );

			if ( $( this ).data( "videoindex" ) !== tutorialShowingID )
			{
				var embedVideoStart = "<div class='col-xs-12 youtube-video'><div class='embed-container'><iframe src='";
				var embedVideoEnd = "' frameborder='0' allowfullscreen></iframe></div></div>";

				var videoURL = $( this ).data( "videoembedcode" );

				// check if the row is even or odd
				if ( Number( $( this ).data( "videoindex" ) ) % 2 === 0 )
				{ $( this ).addClass( "selected-lesson-even" ); }
				else
				{ $( this ).addClass( "selected-lesson-odd" ); }

				$( this ).find( '.course-lesson-play-icon-container' ).addClass( 'white-play-button' );

				$( this ).append( embedVideoStart + videoURL + embedVideoEnd );
				
				$( this ).append( '<div class="col-xs-12 courseLessonExtraButtonContainer"><br /><img class="float-right courseLessonAnchorButton courseLessonExtraButtons" title="Share a link to this video" src="images/icons/anchor.svg" data-toggle="popover" tabindex="0" data-trigger="focus" data-placement="left" data-content="http://www.sonarlearning.co.uk/coursepage.php?topic=' + $( this ).data( "topicid" ) + '&course=' + $( this ).data( "courseid" ) + '&videoindex=' + $( this ).data( "videoid" ) + '#' + $( this ).data( "videoid" ) + '" /></div>' );
				$( '[data-toggle="popover"' ).popover( );
				
				if ( sessionStorage.getItem( "baseSourceCode" + $( this ).data( "videoindex" ) ) !== null || sessionStorage.getItem( "lessonSourceCode" + $( this ).data( "videoindex" ) ) !== null || sessionStorage.getItem( "extraNotes" + $( this ).data( "videoindex" ) ) !== null )
				{
					var horizontalrule = '<div class="col-sm-10 col-sm-offset-1 col-xs-12 video-horizontal-rule video-sub-section-containers"></div>';

					$( this ).append( horizontalrule );
				}

				if ( sessionStorage.getItem( "baseSourceCode" + $( this ).data( "videoindex" ) ) !== null )
				{
					var baseSourceCode = '<div class="col-xs-12 video-sub-section-containers"><a class="video-sub-section-titles" target="_blank" href="' + sessionStorage.getItem( "baseSourceCode" + $( this ).data( "videoindex" ) ) + '">Click here for base source code</a></div>';

					$( this ).append( baseSourceCode );
				}

				if ( sessionStorage.getItem( "lessonSourceCode" + $( this ).data( "videoindex" ) ) !== null )
				{
					var lessonSourceCode = '<div class="col-xs-12 video-sub-section-containers"><a class="video-sub-section-titles" target="_blank" href="' + sessionStorage.getItem( "lessonSourceCode" + $( this ).data( "videoindex" ) ) + '">Click here for lesson source code</a></div>';

					$( this ).append( lessonSourceCode );
				}

				if ( sessionStorage.getItem( "extraNotes" + $( this ).data( "videoindex" ) ) !== null )
				{
					var extraNotesCode = '<div class="col-xs-12 video-sub-section-containers">Extra Details: ' + sessionStorage.getItem( "extraNotes" + $( this ).data( "videoindex" ) ) + '</div>';

					$( this ).append( extraNotesCode );
				}

				var horizontalrule = '<div class="col-sm-10 col-sm-offset-1 col-xs-12 video-horizontal-rule video-sub-section-containers"></div>';

				$( this ).append( horizontalrule );

				if ( sessionStorage.getItem( "privateNotes" + $( this ).data( "videoindex" ) ) != null )
				{
					var noteTitleCode = '<div class="col-xs-12 video-sub-section-containers note-title">Private Notes</div>';
					var privateNotesCode = '<div class="col-xs-12 video-sub-section-containers"><form id="private-note-form"><input type="hidden" name="courseid" value="' + sessionStorage.getItem( "courseid" ) + '"><input type="hidden" name="lessonid" value="' + $( this ).data( "videoindex" ) + '"><input type="hidden" name="method" value="SavePrivateNote"></form><textarea form="private-note-form" id="note" name="note" class="private-notes" rows="4">' + Base64.decode( sessionStorage.getItem( "privateNotes" + $( this ).data( "videoindex" ) ) ) + '</textarea><script>CKEDITOR.replace( "note" );</script></div>';
					var saveButtonCode = '<div class="col-md-3 col-md-offset-6 col-sm-4 col-sm-offset-4 col-xs-6 note-save-status"></div><div class="row col-lg-3 col-md-3 col-sm-4 col-xs-6 btn btn-inverse btn-lg save-button">Save Note</div>';

					$( this ).append( noteTitleCode );
					$( this ).append( privateNotesCode );
					$( this ).append( saveButtonCode );
				}
				else
				{
					var privateNotesCode = '<div class="col-xs-12 video-sub-section-containers">Sign in to take private notes.</div>';

					$( this ).append( privateNotesCode );
				}

				tutorialShowingID = $( this ).data( "videoindex" );

				$( 'html, body' ).animate( { scrollTop: ( $( this ).offset( ).top - $( ".embed-container" ).height( ) ) }, 500 );
			}
			else
			{ tutorialShowingID = -1; }
		}
		else
		{			
			if ( $( event.target).hasClass( 'save-button' ) )
			{
				$( '#note' ).html( CKEDITOR.instances.note.getData( ) );						

				$.ajax(
				{
					beforeSend : function ( )
					{	
						$( ".save-button" ).addClass( "disabled" );
						$( ".note-save-status" ).html( "Saving note" );
					},
					type: 'POST',
					url: 'CourseClass.php',
					data: $( '#private-note-form' ).serialize( ),
					dataType: 'json',
					success: function ( result )
					{
						sessionStorage.setItem( "privateNotes" + videoIndex, Base64.encode( result.note ) );
						$( ".note-save-status" ).html( result.saveResult );
						$( ".save-button" ).removeClass( "disabled" );
					},
					error: function ( )
					{
						$( ".note-save-status" ).html( "Error saving, try again" );
						$( ".save-button" ).removeClass( "disabled" );
					}
				} );
			}
			else if ( $( event.target).hasClass( 'lesson-checkbox' ) || $( event.target ).hasClass( 'second-icon fui-checkbox-checked' ) )
			{
				if ( event.preventDefault )
				{ event.preventDefault( ); }
				else // Older IE.
				{ event.cancelBubble = true; }
				
				$.ajax(
				{
					type: 'POST',
					url: 'CourseClass.php',
					data: $( event.target ).closest( "form" ).serialize( ),
					dataType: 'json',
					success: function ( )
					{ }
				} );
			}
		 }
	} );
	
	$( ".course-lesson-row" ).mouseover( function( event )
	{
		var clickPos = event.pageY - $( this ).offset().top;
		
		var boxHeight = GetLessonBoxHeight( $( this ) );
		
		if ( clickPos < boxHeight )
		{ $( ".course-lesson-row" ).css( "cursor", "pointer" ); }
		else
		{ $( ".course-lesson-row" ).css( "cursor", "initial" ); }
	} );
	
	// get the lesson boxes height including padding and borders
	function GetLessonBoxHeight( element )
	{
		var boxHeight = element.outerHeight( );
		
		if ( boxHeight >= 200 )
		{ boxHeight = 200; }
		
		return boxHeight;
	}
	
	$( '.save-button' ).click( function( )
	{
		var courseID = $( this ).data( "courseid" );
		var lessonID = $( this ).data( "lessonid" );
		var textAreaIDwithHASH = '#private-note-form-id-' + courseID + '-' + lessonID;
		var textAreaIDwithoutHASH = 'private-note-form-id-' + courseID + '-' + lessonID;

		$( textAreaIDwithHASH ).html( CKEDITOR.instances[textAreaIDwithoutHASH].getData( ) );						
				
		$.ajax(
		{
			beforeSend : function ( )
			{
				$( this ).addClass( "disabled" );
				$( '.note-save-status-' + courseID + '-' + lessonID ).html( "Saving note" );
			},
			type: 'POST',
			url: 'CourseClass.php',
			data: $( '#private-note-form-' + courseID + '-' + lessonID ).serialize( ),
			success: function ( )
			{
				$( '.note-save-status-' + courseID + '-' + lessonID  ).html( "Note Saved" );
				$( this ).removeClass( "disabled" );
			},
			error: function ( )
			{
				$( '.note-save-status-' + courseID + '-' + lessonID  ).html( "Error saving, try again" );
				$( this ).removeClass( "disabled" );
			}
		} );
	} );
	
	$( '.delete-button' ).click( function( )
	{
		var courseID = $( this ).data( "courseid" );
		var lessonID = $( this ).data( "lessonid" );

		$.ajax(
		{
			beforeSend : function ( )
			{
				$( this ).addClass( "disabled" );
				$( '.note-save-status-' + courseID + '-' + lessonID ).html( "Deleting Note" );
			},
			type: 'POST',
			url: 'CourseClass.php',
			data: $( '#private-note-delete-form-' + courseID + '-' + lessonID ).serialize( ),
			success: function ( result )
			{
				$( '.note-save-status-' + courseID + '-' + lessonID ).html( "Note Deleted" );
				$( '#note-box-' + courseID + '-' + lessonID ).hide( 500, function( )
				{
					$( '#note-box-' + courseID + '-' + lessonID ).remove( );
					
					if ( !$( '*' ).hasClass( 'note-boxes' ) )
					{
						$( "#page-heading" ).text( "No Private Notes Created" );
					}
				} );
				$( this ).removeClass( "disabled" );
			},
			error: function ( )
			{
				$( '.note-save-status-' + courseID + '-' + lessonID ).html( "Error deleting, try again" );
				$( this ).removeClass( "disabled" );
			}
		} );
	} );
	
	$( "#login-button" ).click( function( )
	{
		$( "#activate-box" ).hide( 0 );
		
		$( "#login-register-selection-form" ).hide( "medium", function()
		{
			$( "#login-div" ).show( "medium" );
		} );
	} );
	
	$( "#register-button" ).click( function( )
	{
		$( "#activate-box" ).hide( 0 );
		
		$( "#login-register-selection-form" ).hide( "medium", function()
		{
			$( "#register-div" ).show( "medium" );
		} );
	} );
	
	$( ".login-register-switch" ).click( function( )
	{
		$( "div" ).removeClass( "has-error" );

		$( "#lg-error-box" ).hide( "medium" );		
		$( "#rg-error-box" ).hide( "medium" );		
		$( "#register-div" ).toggle( "medium" );
		$( "#login-div" ).toggle( "medium" );
	} );
	
	$( '#login-div' ).submit( function( )
	{
		var errors = [];
		
		var useremail = $( "input:text[name=lg-useremail]" ).val( ).trim( );
		var password = $( "input:password[name=lg-password]" ).val( ).trim( );
		
		$( "#lg-error-box-content" ).empty( );
		
		if ( useremail && password )
		{ $( "#lg-error-box" ).hide( "medium" ); return true; }
		else
		{
			$( "div" ).removeClass( "has-error" );
			
			if ( !useremail )
			{ $( "#lg-useremail-div" ).addClass( "has-error" ); }
			
			if ( !password )
			{ $( "#lg-password-div" ).addClass( "has-error" ); }
			
			errors.push( "Please enter your username and password" );
			
			for ( var i = 0; i < errors.length; i++ )
			{ $( "#lg-error-box > #lg-error-box-content" ).append( "<p>" + errors[i] + "</p>" ); }
			
			$( "#lg-error-box" ).show( "medium" );

  			return false;
		}
	} );
	
	$( '#register-div' ).submit( function( )
	{
		$( "div" ).removeClass( "has-error" );
		
		var errors = [];
		var isSuccessful = true;
		
		var emailaddress = $( "input:text[name=rg-emailaddress]" ).val( ).trim( );
		var username = $( "input:text[name=rg-username]" ).val( ).trim( );
		var password = $( "input:password[name=rg-password]" ).val( ).trim( );
		var confirmpassword = $( "input:password[name=rg-confirmpassword]" ).val( ).trim( );
		
		$( "#rg-error-box-content" ).empty( );
		
		// check if the passwords match
		if ( password !== confirmpassword && password && confirmpassword )
		{
			$( "#rg-password-div" ).addClass( "has-error" );
			$( "#rg-confirmpassword-div" ).addClass( "has-error" );
			
			errors.push( "Password do not match." );
		}
		else
		{
			$( "#rg-password-div" ).removeClass( "has-error" );
			$( "#rg-confirmpassword-div" ).removeClass( "has-error" );
		}
		
		// check if the email address format is valid
		if ( !isValidEmailAddress( emailaddress ) && emailaddress )
		{
			$( "#rg-emailaddress-div" ).addClass( "has-error" );
			
			errors.push( "Email address isn't valid" );
		}
		else
		{ $( "#rg-emailaddress-div" ).removeClass( "has-error" ); }
		
		// check if the username is a email address - BIG NO NO
		if ( isValidEmailAddress( username ) && username )
		{
			$( "#rg-username-div" ).addClass( "has-error" );
			
			errors.push( "Username cannot be an email address" );
		}
		else
		{ $( "#rg-username-div" ).removeClass( "has-error" ); }
		
		if ( emailaddress && username && password && confirmpassword )
		{
			if ( password === confirmpassword && isValidEmailAddress( emailaddress ) && !isValidEmailAddress( username ) )
			{ isSuccessful = true; }
			else
			{ isSuccessful = false; }
		}
		else
		{			
			if ( !emailaddress )
			{
				$( "#rg-emailaddress-div" ).addClass( "has-error" );
				errors.push( "Please input your email address." );
			}
			
			if ( !username )
			{
				$( "#rg-username-div" ).addClass( "has-error" );
				errors.push( "Please input your username." );
			}
			
			if ( !password )
			{
				$( "#rg-password-div" ).addClass( "has-error" );
				errors.push( "Please input your password." );
			}
			
			if ( !confirmpassword )
			{
				$( "#rg-confirmpassword-div" ).addClass( "has-error" );
				
				if ( password )
				{ errors.push( "Please confirm your password." ); }
			}

  			isSuccessful = false;
		}
		
		// check the email address length
		if ( emailaddress.length > 1024 )
		{ errors.push( "Email address must be no greater than 1024 characters" ); $( "#rg-emailaddress-div" ).addClass( "has-error" ); isSuccessful = false; }
		
		// check the username length
		if ( username && ( username.length > 32 || username.length < 6 ) )
		{ errors.push( "Username must be between 6 and 32 characters" ); $( "#rg-username-div" ).addClass( "has-error" ); isSuccessful = false; }
		
		// check the password length
		if ( password && ( password.length > 32 || password.length < 6 ) )
		{ errors.push( "Password must be between 6 and 32 characters" ); $( "#rg-password-div" ).addClass( "has-error" ); isSuccessful = false; }
		
		if ( !isSuccessful )
		{
			for ( var i = 0; i < errors.length; i++ )
			{ $( "#rg-error-box > #rg-error-box-content" ).append( "<p>" + errors[i] + "</p>" ); }
			
			$( "#rg-error-box" ).show( "medium" );
		}
		else
		{ $( "#rg-error-box" ).hide( "medium" ); }
		
		return isSuccessful;
	} );
	
	$( '#change-password-form' ).submit( function( )
	{
		$( "div" ).removeClass( "has-error" );
		$( "#error-box-content" ).empty( );

		var currentPassword = $( "input:password[name=current-password]" ).val( ).trim( );
		var password = $( "input:password[name=password]" ).val( ).trim( );
		var confirmPassword = $( "input:password[name=confirm-password]" ).val( ).trim( );
		
		var errors = [];
		var isSuccessful = true;
		
		if ( !currentPassword )
		{
			$( "#old-password" ).addClass( "has-error" );
			errors.push( "Please input your current password." );
			isSuccessful = false;
		}
		
		if ( !password )
		{
			$( "#new-password" ).addClass( "has-error" );
			errors.push( "Please input your new password." );
			isSuccessful = false;
		}
		
		// check the password length
		if ( password && ( password.length > 32 || password.length < 6 ) )
		{
			errors.push( "Password must be between 6 and 32 characters" );
		 	$( "#new-password" ).addClass( "has-error" );
			isSuccessful = false;
		}
		
		if ( !confirmPassword )
		{
			$( "#confirm-password" ).addClass( "has-error" );
			
			if ( password )
			{ errors.push( "Please confirm your new password." ); }
			
			isSuccessful = false;
		}
		
		// check if the passwords match
		if ( password !== confirmPassword && password && confirmPassword )
		{
			$( "#new-password" ).addClass( "has-error" );
			$( "#confirm-password" ).addClass( "has-error" );
			
			errors.push( "Password do not match." );
			isSuccessful = false;
		}
		
		if ( !isSuccessful )
		{
			for ( var i = 0; i < errors.length; i++ )
			{ $( "#error-box > #error-box-content" ).append( "<p>" + errors[i] + "</p>" ); }
			
			$( "#error-box" ).show( "medium" );
		}
		else
		{ $( "#error-box" ).hide( "medium" ); }
		
		return isSuccessful;
	} );
	
	// check to see if the emaill address format is valid
	function isValidEmailAddress( emailAddress )
	{
    	var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
    	return pattern.test( emailAddress );
	}
	
	$( "#course-search" ).on( "change paste keyup", function( )
	{
		var searchBoxValue = $( this ).val( ).toLowerCase( );
		searchBoxValue = searchBoxValue.trim( );

		$( '.course-boxes:not([data-name*="' + searchBoxValue + '"])' ).hide( );
		$( '.course-boxes[data-name*="' + searchBoxValue + '"]' ).show( );
				
		if ( $( '.course-boxes[data-name*="' + searchBoxValue + '"]' ).size( ) === 0 )
		{
			$( '#courses-found' ).text( "No Courses Found" );
		}
		else if ( $( '.course-boxes[data-name*="' + searchBoxValue + '"]' ).size( ) === 1 )
		{	
			$( '#courses-found' ).text( $( '.course-boxes[data-name*="' + searchBoxValue + '"]' ).size( ) + " Course Found" );
		}
		else
		{
			$( '#courses-found' ).text( $( '.course-boxes[data-name*="' + searchBoxValue + '"]' ).size( ) + " Courses Found" );
		}
		
		RemoveResultClasses( );
		
		// check if the search returned any results
		if ( $('.course-boxes[data-name*="' + searchBoxValue + '"]').size( ) > 0 )
		{ $( '#search-form' ).addClass( 'has-success' ); }
		else
		{ $( '#search-form' ).addClass( 'has-error' ); }
		
		if ( searchBoxValue === "" )
		{
			$( '.course-boxes' ).show( );
			$( '#courses-found' ).empty( );
			
			RemoveResultClasses( );
		}
		
		function RemoveResultClasses( )
		{
			$( 'div' ).removeClass( 'has-success' );
			$( 'div' ).removeClass( 'has-error' );
		}
	} );
	
	$( "#lesson-search" ).on( "change paste keyup", function( )
	{
		var searchBoxValue = $( this ).val( ).toLowerCase( );
		searchBoxValue = searchBoxValue.trim( );

		$( '.course-lesson-row:not([data-name*="' + searchBoxValue + '"])' ).hide( );
		$( '.course-lesson-row[data-name*="' + searchBoxValue + '"]' ).show( );
		
		if ( $( '.course-lesson-row[data-name*="' + searchBoxValue + '"]' ).size( ) === 0 )
		{
			$( '#lessons-found' ).text( "No Lessons Found" );
		}
		else if ( $( '.course-lesson-row[data-name*="' + searchBoxValue + '"]' ).size( ) === 1 )
		{	
			$( '#lessons-found' ).text( $('.course-lesson-row[data-name*="' + searchBoxValue + '"]').size() + " Lesson Found" );
		}
		else
		{
			$( '#lessons-found' ).text( $('.course-lesson-row[data-name*="' + searchBoxValue + '"]').size() + " Lessons Found" );
		}
		
		RemoveResultClasses( );
		
		// check if the search returned any results
		if ( $('.course-lesson-row[data-name*="' + searchBoxValue + '"]').size( ) > 0 )
		{ $( '#search-form' ).addClass( 'has-success' ); }
		else
		{ $( '#search-form' ).addClass( 'has-error' ); }
		
		if ( searchBoxValue === "" )
		{
			$( '.course-lesson-row' ).show( );
			$( '#lessons-found' ).empty( );
			
			RemoveResultClasses( );
		}
		
		function RemoveResultClasses( )
		{
			$( 'div' ).removeClass( 'has-success' );
			$( 'div' ).removeClass( 'has-error' );
		}
	} );
	
	$( "#ForgottenPasswordButton" ).click( function( )
	{
		$( "div" ).removeClass( "has-error" );

		$( "#lg-error-box" ).hide( "medium" );		
		$( "#rg-error-box" ).hide( "medium" );		
		$( "#register-div" ).hide( "medium" );
		$( "#login-div" ).hide( "medium" );
		$( "#ForgotPasswordDiv" ).show( "medium" );
	} );
	
	$( "#GoBackToLogin" ).click( function( )
	{
		$( "div" ).removeClass( "has-error" );

		$( "#ForgotPasswordErrorBox" ).hide( "medium" );		
		$( "#ForgotPasswordDiv" ).hide( "medium" );
		$( "#login-div" ).show( "medium" );
	} );
	
	// password reset button has been clicked (just sends the email to the user)
	$( "#FPResetPasswordButton" ).click( function( )
	{
		SendResetPassword( );
	} );
	
	// enter key is pressed on the reset password email field
	$( '#FPEmailField' ).keyup( function( event )
	{
		if ( event.keyCode == 13 ) { SendResetPassword( ); }
	} );
	
	// send the reset password email
	function SendResetPassword( )
	{
		var emailAddress = $( "#FPEmailField" ).val( ).trim( );
		
		$( "#FPErrorBoxContent" ).empty( );
		
		if ( isValidEmailAddress( emailAddress ) )
		{
			$.ajax(
			{
				type: 'POST',
				url: 'UserClass.php',
				data: { method: "StartResetPasswordProcess", emailAddress: emailAddress },
				success: function ( result )
				{
					if ( result )
					{
						$( "#FPEmailField" ).val( "" );
						
						$( "#ForgotPasswordErrorBox" ).hide( "medium" );
						$( "#FPErrorBoxContent" ).empty( );
						
						$( "#ForgetPasswordSuccessBox" ).empty( );
						$( "#ForgetPasswordSuccessBox" ).show( "medium" );
						$( "#ForgetPasswordSuccessBox" ).append( "<strong>A reset password email has been sent to " + emailAddress + ".</strong><br /><br /><strong>Follow the instructions to reset your password.</strong>" );
					}
					else
					{
						$( "#ForgetPasswordSuccessBox" ).hide( "medium" );
						$( "#ForgetPasswordSuccessBox" ).empty( );
						
						$( "#ForgotPasswordErrorBox" ).show( "medium" );
						$( "#FPErrorBoxContent" ).append( "<p>Email address doesn't exist</p>" );
					}
				}
			} );
			$( "#ForgotPasswordErrorBox" ).hide( "medium" );
		}
		else
		{
			$( "#ForgotPasswordErrorBox" ).show( "medium" );
			$( "#FPErrorBoxContent" ).append( "<p>Please input a valid email address</p>" );
		}
	}
	
	// check if the reset password button is clicked (resets the password)
	$( "#RPResetPasswordButton" ).click( function( )
	{
		ResetPassword( );
	} );
	
	// check if the enter key pressed on any of the reset password fields
	$( ".rpFields" ).keyup( function( event )
	{
		if ( event.keyCode == 13 ) { ResetPassword( ); }
	} );
	
	// reset the password
	function ResetPassword( )
	{
		var emailAddress = $( "#RPEmailField" ).val( ).trim( );
		var password = $( "#RPPasswordField" ).val( ).trim( );
		var confirmPassword = $( "#RPConfirmPasswordField" ).val( ).trim( );
		var code = $( "#RPResetPasswordButton" ).data( "code" ).trim( );
		
		var successful = true;
		var errors = [];
		
		$( "div" ).removeClass( "has-error" );
		
		$( "#RPErrorBoxContent" ).empty( );
		
		if ( !isValidEmailAddress( emailAddress ) )
		{
			$( "#RPEmailContainer" ).addClass( "has-error" );
			errors.push( "Please input a valid email address." );
			successful = false;
		}
		
		if ( !password )
		{
			$( "#RPPasswordContainer" ).addClass( "has-error" );
			errors.push( "Please input your new password." );
			successful = false;
		}
		else if ( password && ( password.length < 6 || password.length > 32 ) )
		{
			$( "#RPPasswordContainer" ).addClass( "has-error" );
			errors.push( "New password must be between 6 and 32 characters" );
			successful = false;
		}
		else if ( password && !confirmPassword )
		{
			$( "#RPConfirmPasswordContainer" ).addClass( "has-error" );
			errors.push( "Please confirm your new password." );
			successful = false;
		}
		else if ( password !== confirmPassword )
		{
			$( "#RPPasswordContainer" ).addClass( "has-error" );
			$( "#RPConfirmPasswordContainer" ).addClass( "has-error" );
			errors.push( "Passwords do not match." );
			successful = false;
		}
		
		if ( !successful )
		{
			$( "#ResetPasswordErrorBox" ).show( "medium" );
			
			for ( var i = 0; i < errors.length; i++ )
			{ $( "#RPErrorBoxContent" ).append( "<p>" + errors[i] + "</p>" ); }
		}
		else
		{
			$( "#ResetPasswordErrorBox" ).hide( "medium" );
			
			$.ajax(
			{
				type: 'POST',
				url: 'UserClass.php',
				data: { method: "ResetPassword", emailAddress: emailAddress, password: password, confirmPassword: confirmPassword, code: code },
				success: function ( result )
				{
					if ( result )
					{
						$( "#ResetPasswordErrorBox" ).hide( "medium" );
						
						window.location.assign( "login.php?password-reset" );
					}
					else
					{
						$( "#ResetPasswordErrorBox" ).show( "medium" );
			
						$( "#RPErrorBoxContent" ).append( "<p>Error occured, confirm the details input and try again</p>" );
					}
				}
			} );
		}
	}
	
	// bookmark course icon is pressed
	$( ".bookmarkIcon" ).click( function( )
	{
		var thisIcon = $( this );
		var courseID = thisIcon.data( "courseid" );
		
		$.ajax(
		{
			type: 'POST',
			url: 'CourseClass.php',
			data: { method: "BookmarkCourse", courseID: courseID },
			success: function ( )
			{ $( thisIcon ).toggleClass( "bookmarkIconFilled" ); }
		} );
	} );
	
	$( window ).resize( function( )
	{		
		ResizeGlobalSearchbox( );
	} );
	
	ResizeGlobalSearchbox( );
	
	function ResizeGlobalSearchbox( )
	{
		var baseHeaderExtrasWidth = 500;
		var baseSearchButtonWidth = 575;
		
		var headerExtrasWidth = 500;
		var searchButtonWidth = 575;
		
		var paddingRight = 60;
		
		if ( $( window ).width( ) < 768 )
		{
			headerExtrasWidth = 45;
			searchButtonWidth = 100;
			paddingRight = 42;
		}
		else if ( $( window ).width( ) < 780 )
		{
			headerExtrasWidth = baseHeaderExtrasWidth + 60;
			searchButtonWidth = baseSearchButtonWidth + 30;
		}
		else if ( $( window ).width( ) < 800 )
		{
			headerExtrasWidth = baseHeaderExtrasWidth + 60;
			searchButtonWidth = baseSearchButtonWidth + 40;
		}
		else if ( $( window ).width( ) < 1199 )
		{
			headerExtrasWidth = baseHeaderExtrasWidth + 60;
			searchButtonWidth = baseSearchButtonWidth + 60;
		}
		
		$( "#GlobalSearchUL" ).width( $( window ).width( ) - headerExtrasWidth );
		$( "#GlobalSearchUL" ).css( "padding-right", paddingRight );
		$( "#GlobalSearchInput" ).width( $( window ).width( ) - searchButtonWidth );
	}
} );














