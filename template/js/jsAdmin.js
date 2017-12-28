 $(document).ready(function() {
   $(window).scroll(function() {
          if($(this).scrollTop() > 120) {
              $('#toTop').fadeIn();  
          } else {
           
              $('#toTop').fadeOut();
          }
        });
        $('#toTop').click(function() {
            $('body,html').animate({scrollTop:0},800);
        });
      
         $('#field').load("admin/product");
 });
 window.onload = function () {
    var $preloader = $('#loader');
    $preloader.delay(1000).fadeOut('slow');
 };       
 function openTab(evt, type) {
     var tablinks;
 
     tablinks = document.getElementsByClassName("tablinks");
     for (let i = 0; i < tablinks.length; i++) {
         tablinks[i].className = tablinks[i].className.replace(" active", "");
     }
     
        document.getElementById('field').style.display = "block";
        $('#field').load("admin/" + type);
     
     
     evt.currentTarget.className += " active";
}