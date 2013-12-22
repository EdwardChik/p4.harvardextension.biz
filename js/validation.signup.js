// if document has been loaded
$(document).ready(function(){

  // highlights first name field if it is left empty
  		$('#first_name').focusout(function(){

  			if($('#first_name').val().length == 0) {
  				$('.first-name-group .help-block').text('Please enter your first name.');
  				$('.first-name-group').attr({
  					class: 'has-error col-sm-6 form-group first-name-group'
  				}); //end attr
  			} else {
  				$('.first-name-group .help-block').text('');
  				$('.first-name-group').attr({
  					class: 'col-sm-6 form-group first-name-group'
  				}); //end attr
  			}

  		}); //end first name focus out


  // highlights last name field if it is left empty
        $('#last_name').focusout(function(){

          if($('#last_name').val().length == 0) {
            $('.last-name-group .help-block').text('Please enter your last name.');
            $('.last-name-group').attr({
              class: 'has-error col-sm-6 form-group last-name-group'
            }); //end attr
          } else {
            $('.last-name-group .help-block').text('');
            $('.last-name-group').attr({
              class: 'col-sm-6 form-group last-name-group'
            }); //end attr
          }

        }); //end last name focus out


  // highlights e-mail address field if it is left empty
  		$('#email').focusout(function(){

  			if($('#email').val().length == 0) {
  				$('.email-group .help-block').text('Please enter your e-mail address.');
  				$('.email-group').attr({
  					class: 'has-error col-sm-6 form-group email-group'
  				}); //end attr
  			} else {
  				$('.email-group .help-block').text('');
  				$('.email-group').attr({
  					class: 'col-sm-6 form-group email-group'
  				}); //end attr
  			}

  		}); //end e-mail focus out


  // highlights location field if it is left empty
      $('#location').focusout(function(){
        
        if($('#location').val().length == 0) {
          $('.location-group .help-block').text('Please enter your location.');
          $('.location-group').attr({
            class: 'has-error col-sm-6 form-group location-group'
          }); //end attr
        } else {
          $('.location-group .help-block').text('');
          $('.location-group').attr({
            class: 'col-sm-6 form-group location-group'
          }); //end attr
        }

      }); //end location focus out


  // highlights biography field if it is left empty
      $('#biography').focusout(function(){
        
        if($('#biography').val().length == 0) {
          $('.biography-group .help-block').text('Please enter your biography.');
          $('.biography-group').attr({
            class: 'has-error col-sm-6 form-group biography-group'
          }); //end attr
        } else {
          $('.biography-group .help-block').text('');
          $('.biography-group').attr({
            class: 'col-sm-6 form-group biography-group'
          }); //end attr
        }

      }); //end biography focus out


  // highlights password field if it is left empty
      $('#password').focusout(function(){
        
        if($('#password').val().length == 0) {
          $('.password-group .help-block').text('Please enter your password.');
          $('.password-group').attr({
            class: 'has-error col-sm-6 form-group password-group'
          }); //end attr
        } else {
          $('.password-group .help-block').text('');
          $('.password-group').attr({
            class: 'col-sm-6 form-group password-group'
          }); //end attr
        }

      }); //end password focus out

}); //end ready