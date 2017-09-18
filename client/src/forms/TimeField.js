/* Time Field
===================================================================================================================== */

import $ from 'jquery';
import 'flatpickr';

$(function() {
  
  $('input[type=time]').each(function() {
    
    // Obtain Self:
    
    var $self = $(this);
    
    // Define Config:
    
    var config = {
      altInput: true,
      enableTime: true,
      noCalendar: true
    };
    
    // Initialise Flatpickr:
    
    if ($self.data('calendar-enabled')) {
      $self.flatpickr($.extend(config, $self.data('calendar-config')));
    }
    
  });
  
});
