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

});