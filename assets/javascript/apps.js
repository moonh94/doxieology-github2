
$(window).on("scroll", function () {
    if ($(window).scrollTop()) {
      $("nav").addClass("black");
    } else {
      $("nav").removeClass("black");
    }
  })
  
  $(document).on('click', 'a[href^="#"]', function (e) {
    var id = $(this).attr('href');
  
    var $id = $(id);
    if ($id.length === 0) {
      return;
    }
  
    e.preventDefault();
  
    var pos = $id.offset().top -100;
  
    $('body, html').animate({ scrollTop: pos }, 950);
  });
  
  
  $(document).ready(function() {
    resize_all_parallax();
  });
  
  $(window).on('resize', function(){
    resize_all_parallax();
  });
  
  $('.card').click(function(){
    $(this).toggleClass('flipped');
  });
  
  
  function   navSearch() {
    $(".nav-item").on("click", function () {
      $(this).toggleClass("active");
  
    });
  }
  
  function smallNavSearch() {
    $(".nav-item-small").on("click", function () {
      $(this).toggleClass("active");
  
    });
  }
  function carousel () {
    $('.carousel').carousel({
      interval: 300
    })
  };
  
  function resize_all_parallax() {
    var div_class = 'parallaxBody'; /* the ID of the div that you're resizing */
    var img_w = 1000; /* the width of your image, in pixels */
    var img_h = 864; /* the height of your image, in pixels */
    resize_parallax(div_class,img_w,img_h);
  }
  function resize_parallax(div_id,img_w,img_h) {
    var div = $('#' + div_id);
    var divwidth = div.width();
    if (divwidth < 769) { var pct = (img_h/img_w) * 105; } /* show full image, plus a little padding, if on static mobile view */
    else { var pct = 60; } /* this is the HEIGHT as percentage of the current div WIDTH. you can change it to show more (or less) of your image */
    var newheight = Math.round(divwidth * (pct/100));
    newheight = newheight  + 'px';
    div.height(newheight);
  }

  function openNav() {
    document.getElementById("mySidepanel").style.width = "100%";
    document.getElementById("mySidepanel").style.display = "block";
  
  
  }
  
  function closeNav() {
    document.getElementById("mySidepanel").style.width = "0";
    document.getElementById("mySidepanel").style.display = "none";
  }


// working code with honeypot before recaptcha
function sendEmail(){
    var name = $("#name");
    var email = $("#email");
    var subject = $("#subject");
    var body = $("#body");
    var honeypot = $("#sweetnerPot");
    
    if(isNotEmpty(name) && isNotEmpty(email) && isNotEmpty(subject) && isNotEmpty(body) && isHoneypotEmpty(honeypot)) {
      $.ajax({ 
        url: 'sendEmail.php',
        method: 'POST',
        dataType: 'json',
        data:{
          name: name.val(),
          email: email.val(),
          subject: subject.val(),
          body: body.val(),

        }, 
        success: function(response){
          $('#contactFormEmail')[0].reset();
          $('.sent-notification').text("Message sent successfully.");
        },
        error: function(xhr, status, error) {
          console.error(xhr.responseText);
      }
    });

    }
  }
  
  function isHoneypotEmpty(honeypot) {
    if (honeypot.val()!== "") {
        // alert("Bot detected!"); // Display an alert or take appropriate action
        return false;
    } else {
        return true;
    }
  }

  function isNotEmpty(caller){
     if(caller.val()==""){
       caller.css('border', '1px solid red');
       return false;

     }
     else {
       caller.css('border', '');
       return true;
     }
   }

  //  function sendEmail(){
  //   var name = $("#name");
  //   var email = $("#email");
  //   var subject = $("#subject");
  //   var body = $("#body");
  //   var honeypot = $("#sweetnerPot");
  //   var response = grecaptcha.getResponse();
    
  //   if (response.length == 0) {
  //     alert("Please complete the reCAPTCHA!");
  //     return false;
  // }

  //   if(isNotEmpty(name) && isNotEmpty(email) && isNotEmpty(subject) && isNotEmpty(body) && isHoneypotEmpty(honeypot)) {
  //     $.ajax({ 
  //       url: 'sendEmail.php',
  //       method: 'POST',
  //       dataType: 'json',
  //       data:{
  //         name: name.val(),
  //         email: email.val(),
  //         subject: subject.val(),
  //         body: body.val(),

  //       }, 
  //       success: function(response){
  //         $('#contactFormEmail')[0].reset();
  //         $('.sent-notification').text("Message sent successfully.");
  //       },
  //       error: function(xhr, status, error) {
  //         console.error(xhr.responseText);
  //     }
  //   });

  //   }
  // }
  
  // function isHoneypotEmpty(honeypot) {
  //   if (honeypot.val()!== "") {
  //       // alert("Bot detected!"); // Display an alert or take appropriate action
  //       return false;
  //   } else {
  //       return true;
  //   }
  // }

  // function isNotEmpty(caller){
  //    if(caller.val()==""){
  //      caller.css('border', '1px solid red');
  //      return false;

  //    }
  //    else {
  //      caller.css('border', '');
  //      return true;
  //    }
  //  }

  // code with recaptcha and honeypot aka sweetnerPot
//   function sendEmail() {
//     var name = $("#name");
//     var email = $("#email");
//     var subject = $("#subject");
//     var body = $("#body");
//     var honeypot = $("#sweetnerPot");
//     var response = grecaptcha.getResponse();
    
//     if (response.length == 0) {
//         alert("Please complete the reCAPTCHA!");
//         return false;
//     }
    
//     if (isNotEmpty(name) && isNotEmpty(email) && isNotEmpty(subject) && isNotEmpty(body) && isHoneypotEmpty(honeypot)) {
//         $.ajax({
//             url: 'sendEmail.php',
//             method: 'POST',
//             dataType: 'json',
//             data: {
//                 name: name.val(),
//                 email: email.val(), 
//                 subject: subject.val(),
//                 body: body.val(),
//                 recaptchaResponse: response // Include reCAPTCHA response in the data sent to sendEmail.php
//             },
//             success: function(response) {
//                 $('#contactFormEmail')[0].reset();
//                 $('.sent-notification').text("Message sent successfully.");
//             },
//             error: function(xhr, status, error) {
//                 console.error(xhr.responseText);
//             }
//         });
//     }
// }

// function isHoneypotEmpty(honeypot) {
//     if (honeypot.val() !== "") {
//         // Bot detected, handle accordingly
//         return false;
//     } else {
//         return true;
//     }
// }

// function isNotEmpty(caller) {
//     if (caller.val() == "") {
//         caller.css('border', '1px solid red');
//         return false;
//     } else {
//         caller.css('border', '');
//         return true;
//     }
// }


  // working code for sending email before recaptcha and honeypot
  // function sendEmail(){
  //   var name = $("#name");
  //   var email = $("#email");
  //   var subject = $("#subject");
  //   var body = $("#body");

  //   if(isNotEmpty(name) && isNotEmpty(email) && isNotEmpty(subject) && isNotEmpty(body)) {
  //     $.ajax({
  //       url: 'sendEmail.php',
  //       method: 'POST',
  //       dataType: 'json',
  //       data:{
  //         name: name.val(),
  //         email: email.val(),
  //         subject: subject.val(),
  //         body: body.val(),

  //       }, success: function(response){
  //         $('#contactFormEmail')[0].reset();
  //         $('.sent-notification').text("Message sent successfully.");
  //       }
        
  //     });

  //   }
  //  function isNotEmpty(caller){
  //    if(caller.val()==""){
  //      caller.css('border', '1px solid red');
  //      return false;

  //    }
  //    else {
  //      caller.css('border', '');
  //      return true;
  //    }
  //  }
  // }

