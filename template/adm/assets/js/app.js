$(document).ready(function() {
  'use strict';

  $(document).on('click', '.btn-form', function(event) {
  	event.preventDefault();

  	$.post( $(this).attr('href'), $(this).data(), 
      function(data, textStatus, xhr) {
    		$('.modal-content').html(data);
    		$('.modal').modal('show');
  	  }
    );
  });

  $('.modal-content').on('submit', 'form[method=POST]', function(event) {
    event.preventDefault();

    var form = $(this);
    var formData = new FormData(form[0]);
    //var $btn = $(document.activeElement); // get the button clicked to submit this form

    //formData.append($btn.attr('name'), 1);

    $.ajax({
      url: $(this).attr('action'), 
      type: 'POST',             
      data: formData,
      contentType: false,       
      cache: false,             
      processData:false,        
      success: function(data) {
        if ( data == 1 ) {
          $('.modal').modal('hide');
        }
        else {
          $('.modal-content').html(data);
        }
      }
    });
  });  

  $(document).on('click', '.btn-delete', function(event) {
    event.preventDefault();

    var title     = $(this).attr('title');
    var callback  = $(this).data('callback');

    if ( title == '' ) {
      title = 'Item deleted';
    }

    $.post( $(this).attr('href'), $(this).data(), 
      function(data, textStatus, xhr) {
        if (data == 1) {
          $.gritter.add({
            title: 'Deleted',
            text: title,
            class_name: 'with-icon check-circle'
          });

          if ( callback != '' ) {
            var fn = window[callback];
            fn();
          }
        }
      }
    );
  });

  $('.delete').click(function(event) {
    return confirm('Please confirm deleting data!!');
  });

  $('.modal').on('hidden.bs.modal', function (e) {
    location.reload();
  });

});