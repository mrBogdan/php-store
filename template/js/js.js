$(document).ready(function(){
      $('.slider').slick({
  dots: true,
  infinite: false,
  speed: 300,
  slidesToShow: 4,
  slidesToScroll: 4,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
  });
       //If amount of item more than 1
      $("#phone").mask("8(999) 999-9999");
      //button for to add an element to cart
      $(".add-to-cart").click(function () {
        var id = $(this).attr("data-id");
        var itemCount = 0;
        if($('#amount').val() > 1) {
          itemCount = +$('#amount').val();
        }
        //alert(itemCount);
        $.post("/cart/addAjax/" + id, {"itemCount": itemCount}, function (data) {
          //alert(data);
          if(data !== 'error') {
            data = JSON.parse(data);
            $("#cart-count").html(data);
          }
          else {
            alert('Error! The items number must be less than 100 and more than 0');
          }
          
        });
        return false;
      });
      //Click del(delete td)
      $(".delete-from-cart").click(function () {
        var id = $(this).attr("data-id");
        var cell = $(this).parent().parent();
        if((confirm('Are you want to delete?')))
        cell.remove();
        $.post("/cart/delete/" + id, {}, function (data){
            data = JSON.parse(data);
            if(data['count'] > 0) {
              $("#cart-count").html(data['count']);
              $("tfoot > tr > td.price").html('$ ' + data['totalPrice']);
            } else {
              $("#cart-count").html('0'); 
              window.location = '/cart';
            }
          });
        });


      
      $('td.amount-items > button').click(function(){
        let next = $(this).next().attr('id');
        let prev = $(this).prev().attr('id');
        let parent = $(this).parent();

        //Click more
        if ( $(this).attr('data-val') === 'more' && $('input#' + next).val() > 0) {
          let id = next;
          $('input#' + next).val( +$('.amount-items > input#' + next).val() + 1 );
          $.post("/cart/addAjax/" + id, 
          {
            "count": (+$('.amount-items > input#' + next).val())
          }, 
          function ( data ) {
            if(data !== 'error') {
              data = JSON.parse(data);
              if ( data['count'] > 0 ) {
                $("#cart-count").html(data['count']);
                parent.next().html('$ ' + data['itemTotalPrice']);
                $("tfoot > tr > td.price").html('$ ' + data['totalPrice']);
              }
            }
            else  
              alert('Error, an amount must be positive number and less than 100');  
          });
        }



        //Click less
        if($(this).attr('data-val') === 'less' && +$('input#' + prev).val() > 0){
          let id = prev;
          $('input#' + prev).val((+$('.amount-items > input#' + prev).val() - 1));
          $.post("/cart/delete/" + id, 
          {
            "count": (+$('input#' + prev).val())
          }, 
          function (data){
            if(data !== 'error') {
              data = JSON.parse(data);
              if(data['count'] > 0) {
                $("#cart-count").html(data['count']);
                parent.next().html('$ ' + data['itemTotalPrice']);
                $("tfoot > tr > td.price").html('$ ' + data['totalPrice']);
              }
            }
            else  
              alert('Error, an amount must be positive number and less than 100');
          });
        }


        //if value equal zero
        if(+$('input#' + prev).val() === 0) {
          if(confirm('Are you want to delete?')) {
            let id = prev;
            var cell = $(this).parent().parent();
            cell.remove();
          }
        }
        
      });

      //event change input field
      $('table > tbody > tr > td > input').change(function(){
        let self = $(this);
        let id = $(this).attr('id');
        if(self.val() === 0) {
          if(confirm('Are you want to delete?')) {
            let cell = self.parent().parent();
            cell.remove();
          }
        }
        $.post("/cart/addAjax/" + id, 
          {
            "count": (+$(this).val())
          }, 
          function ( data ) {
            if(data !== 'error') {
              data = JSON.parse(data);
              if ( data['count'] > 0 ) {
                $("#cart-count").html(data['count']);
                self.parent().next().html('$ ' + data['itemTotalPrice']);
                $("tfoot > tr > td.price").html('$ ' + data['totalPrice']);
              }
            }
            else {
              alert('Error, an amount must be positive number and less than 100');
            }
            
          });
      });
     
           $(function() {
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
});
       
});
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.querySelectorAll('.wrapper_page img');
var modalImg = document.getElementById("img01");
//var captionText = document.getElementById("caption");
for (var i = img.length - 1; i >= 0; i--) {
    img[i].onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    //captionText.innerHTML = this.alt;
}
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x) or outside of modal-content, close the modal
function off() {
  modal.style.display = "none";
}
modal.onclick = off;
span.onclick = off;

var computedStyle = getComputedStyle(modal);
console.log(computedStyle.display);
if( computedStyle.display === "block" ) {
    document.addEventListener("scroll", function(e){
      alert("gg" + e.cancelable);
    }, true);
}
