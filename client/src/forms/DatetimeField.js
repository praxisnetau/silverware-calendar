/* Datetime Field
===================================================================================================================== */

import $ from 'jquery';
import 'flatpickr';

$(function() {
  
  $('input[type=datetime-local]').each(function() {
    
    // Obtain Self:
    
    var $self = $(this);
    
    // Define Config:
    
    var config = {
      altInput: true,
      enableTime: true
    };
    
    // Initialise Flatpickr:
    
    if ($self.data('calendar-enabled')) {
      $self.flatpickr($.extend(config, $self.data('calendar-config')));
    }
    
  });
  
});
