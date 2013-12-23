// if document has been loaded
$(document).ready(function(){

  // highlights password field if it is left empty
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

      }); //end password focus out

  // highlights password field if it is left empty
      $('#password').focusout(function(){
        
        if($('#password').val().length == 0) {
          $('.password-group .help-block').text('Please enter your current password.');
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

  // highlights password field if it is left empty
      $('#password_confirm').focusout(function(){
        
        if($('#password_confirm').val().length == 0) {
          $('.password-confirm-group .help-block').text('Please confirm your current password.');
          $('.password-confirm-group').attr({
            class: 'has-error col-sm-6 form-group password-confirm-group'
          }); //end attr
        } else {
          $('.password-confirm-group .help-block').text('');
          $('.password-confirm-group').attr({
            class: 'col-sm-6 form-group password-confirm-group'
          }); //end attr
        }

      }); //end password focus out

  // highlights password field if it is left empty
      $('#new_password').focusout(function(){
        
        if($('#new_password').val().length == 0) {
          $('.new-password-group .help-block').text('Please enter a new password.');
          $('.new-password-group').attr({
            class: 'has-error col-sm-6 form-group new-password-group'
          }); //end attr
        } else {
          $('.new-password-group .help-block').text('');
          $('.new-password-group').attr({
            class: 'col-sm-6 form-group new-password'
          }); //end attr
        }

      }); //end password focus out

  // highlights password field if it is left empty
      $('#new_password_confirm').focusout(function(){
        
        if($('#new_password_confirm').val().length == 0) {
          $('.new-password-confirm-group .help-block').text('Please confirm your new password.');
          $('.new-password-confirm-group').attr({
            class: 'has-error col-sm-6 form-group new-password-confirm-group'
          }); //end attr
        } else {
          $('.new-password-confirm-group .help-block').text('');
          $('.new-password-confirm-group').attr({
            class: 'col-sm-6 form-group new-password-confirm'
          }); //end attr
        }

      }); //end password focus out


}); //end ready