/* Datetime Field
===================================================================================================================== */

import $ from 'jquery';
import 'flatpickr';

$.entwine('silverware.datetimefield', function($) {
  
  // Handle Date Fields:
  
  $('input[type=datetime-local]').entwine({
    
    onmatch: function() {
      
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
      
      // Trigger Next Method:
      
      this._super();
      
    }
    
  });
  
});
