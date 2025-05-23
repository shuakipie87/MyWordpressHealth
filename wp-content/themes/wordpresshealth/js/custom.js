$('.team-slider').slick({
  infinite: true,
  slidesToShow: 3,
  slidesToScroll: 3,
  arrows:false,
  dots:true,
  responsive:[
    {
      breakpoint:991,
      settings: {
        slidesToShow:2,
        slidesToScroll:2
      }
    },
    {
      breakpoint:768,
      settings:{
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
});

jQuery(document).ready(function($) {
    $('.show-plan').click(function() {
      $(this).closest('.card').find('.plan-popup').addClass('active');
    });
    $('.close-popup').click(function(event) {
        $('.plan-popup').removeClass('active');
    });
});

jQuery(document).ready(function($) {
    $('.inquiry').click(function() {
      $(this).closest('.support-inquiry').find('.form-inquiry').addClass('active');
      $(this).addClass('active');
    });
    $('.feedback').click(function(event) {
        $('.form-inquiry').removeClass('active');
        $('.inquiry').removeClass('active');
    });
});
jQuery(document).ready(function($) {
    $('.feedback').click(function() {
      $(this).closest('.support-inquiry').find('.form-feedback').addClass('active');
      $(this).addClass('active');
    });
    $('.inquiry').click(function(event) {
        $('.form-feedback').removeClass('active');
        $('.feedback').removeClass('active');
    });
});
jQuery(document).ready(function($) {
  $('input[type="number"]').on('input', function() {
      let maxLength = 10;
      let value = $(this).val();

      value = value.replace(/\D/g, '').slice(0, maxLength);
      $(this).val(value);
  });
});

jQuery(document).ready(function($) {
  $(document).on('wpcf7mailsent', function() {
      $('body').addClass('mail-sent-success');

      // Remove class after 5 seconds
      // setTimeout(function() {
      //     $('body').removeClass('mail-sent-success');
      // }, 5000);
  });
});

jQuery(document).ready(function($) {
  let firstRadio = $('.price-box input[type="radio"]').first();
  
  if (firstRadio.is(':checked')) {
      console.log("First radio is selected!");
  } else {
      console.log("First radio is not selected.");
  }
});


jQuery(document).ready(function(){
     $('.select-price').click(function() {
         var textValue = $(this).next('input[name="get_url"]').val(); 
        $(".get_start_url").attr("href", textValue);
    });

    $(".show-plan").click(function() {
        var selectedRadio = $(this).next('.plan-popup').find(".select-price:checked");
        var nextInput = selectedRadio.next('input[name="get_url"]').val(); 
        $(".get_start_url").attr("href", nextInput);   
    });


    

});