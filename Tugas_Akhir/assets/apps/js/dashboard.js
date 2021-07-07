// counter number
$(document).ready(function() {
    $('.count').each(function() {
        var $this = $(this);
        $(this).prop('Counter', 0).animate({
           
           Counter: $this.text()
        }, {
           
           duration: 3000,
           easing: 'swing',
           step: function(now) {
              
              $(this).text(Math.ceil(now).toLocaleString('en'));
           }
        });
       
     });
});