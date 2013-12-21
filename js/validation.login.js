// if document has been loaded
$(document).ready(function(){

  // highlights login e-mail if it is left empty
  		$('login_email').focusout(function(){

  			if($('#login_email').val().length == 0) {
  				$('.login-email-group .help-block').text('Please enter your e-mail address.');
  				$('.login-email-group').attr({
  					class: 'has-error col-sm-4 form-group login-email-group'
  				}); //end attr
  			} else {
  				$('.login-email-group .help-block').text('');
  				$('.login-email-group').attr({
  					class: 'col-sm-4 form-group login-email-group'
  				}); //end attr
  			}

  		}); //end login e-mail focus out


  // highlights login password if it is left empty
      $('login_password').focusout(function(){

        if($('#login_password').val().length == 0) {
          $('.login-password-group .help-block').text('Please enter your password.');
          $('.login-password-group').attr({
            class: 'has-error col-sm-4 form-group login-password-group'
          }); //end attr
        } else {
          $('.login-password-group .help-block').text('');
          $('.login-password-group').attr({
            class: 'col-sm-4 form-group login-password-group'
          }); //end attr
        }

      }); //end login password focus out


}); //end ready