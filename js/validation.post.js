// if document has been loaded
$(document).ready(function(){

  // highlights new post field if it is left empty
  		$('#content').focusout(function(){

  			if($('#content').val().length == 0) {
  				$('.new-post-group .help-block').text('Please enter content to post.');
  				$('.new-post-group').attr({
  					class: 'has-error col-sm-6 form-group new-post-group'
  				}); //end attr
  			} else {
  				$('.new-post-group .help-block').text('');
  				$('.new-post-group').attr({
  					class: 'col-sm-6 form-group new-post-group'
  				}); //end attr
  			}

  		}); //end new post focus out


}); //end ready