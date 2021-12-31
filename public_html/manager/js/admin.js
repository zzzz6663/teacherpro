/**
 * @package     Joomla.Site
 * @subpackage  Templates.protostar
 * @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @since       3.2
 */

(function ($) {
    $(document).ready(function () {

        if($('#smenu').length ){
            $('#smenu li').each(function(){
                if($(this).children('ul').length){
                    $(this).append('<i class="icon-down"></i>')
                }
            })
        }

        $('#smenu > ul > li i').click(function(){
            if($(this).hasClass('active')){
                $(this).removeClass('active');
                $(this).parent().find('ul').slideUp();
                $(this).parent().find('i').removeClass('active');
            }else{
                $(this).addClass('active');
                $(this).siblings('ul').slideDown();

            }
        })



        $('#scat > span').click(function(){
            if($(this).hasClass('active')){
                $(this).removeClass('active');
                $(this).siblings('ul').slideUp();
            }else{
                $(this).addClass('active');
                $(this).siblings('ul').slideDown();

            }
        })

        $('#topleft #mabnav span').click(function(){
            $('body').addClass('out');
        })
        $('#sidemenu > div span.close').click(function(){
            $('body').removeClass('out');
        })



        $('.mmen').click(function(){
            if($('#header').hasClass('active')){
                $('#header').removeClass('active');
            }else{
                $('#header').addClass('active');

            }
        })



        // Start Price Range
        if($( "#slider-range" ).length){

          $( function() {
            $( "#slider-range" ).slider({
              range: true,
              min: 0,
              max: 500,
              values: [ 75, 300 ],
              slide: function( event, ui ) {
                $( "#amount1" ).val( ui.values[ 0 ] + " هزار تومان"  );
                $( "#amount2" ).val( ui.values[ 1 ] + " هزار تومان"   );
              }
            });
            $( "#amount1" ).val(  $( "#slider-range" ).slider( "values", 0 ) + " هزار تومان"  );
            $( "#amount2" ).val(  $( "#slider-range" ).slider( "values", 1 ) + " هزار تومان"  );
          } );

        }





    $('.tab-nav li').click(function(){
    var a= $(this).index();
    var b= $(this).parent().siblings('.tab-container');
        $(this).addClass('active').siblings().removeClass('active');
        b.children('li').eq(a).addClass('active').siblings().removeClass('active');
    })

        if($( ".js-player" ).length){
const players = Array.from(document.querySelectorAll('.js-player')).map(p => new Plyr(p));

        }

    $('#sidefilter .filter-wdiget .ftitle i').click(function(){
        var a= $(this).parent().siblings('.f-content');
        if($(this).hasClass('active')){
            $(this).removeClass('active');
            a.slideDown();
        }else{
            $(this).addClass('active');
            a.slideUp();

        }
    })



    if($( ".comment-list ul" ).length){

        $('.comment-list ul').owlCarousel({
            loop:true,
            margin:28,
            rtl: true,
            nav:true,
            center: true,
            autoplay:true,
            autoplaySpeed:1400,
            autoplayTimeout:4000,
            autoplayHoverPause:true,
            navText : ["<i class='icon-arrow-right-line'></i>","<i class='icon-arrow-right-line'></i>"],
            responsive:{
                0:{
                    items:1
                },
                1000:{
                    center: false,
                    items:2
                },
                1500:{
                    items:3
                }
            }
        })

    }

    if($( ".blog-list ul" ).length){

        $('.blog-list ul').owlCarousel({
            loop:true,
            margin:28,
            rtl: true,
            nav:true,
            // center: true,
            autoplay:true,
            autoplaySpeed:1400,
            autoplayTimeout:4000,
            autoplayHoverPause:true,
            navText : ["<i class='icon-arrow-right-line'></i>","<i class='icon-arrow-right-line'></i>"],
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:1
                },
                1000:{
                    items:2
                }
            }
        })

    }
    if($( ".teacher-course-list ul" ).length){

        $('.teacher-course-list ul').owlCarousel({
            loop:true,
            margin:28,
            rtl: true,
            nav:true,
            // center: true,
            autoplay:true,
            autoplaySpeed:1400,
            autoplayTimeout:4000,
            autoplayHoverPause:true,
            navText : ["<i class='icon-arrow-right-line'></i>","<i class='icon-arrow-right-line'></i>"],
            responsive:{
                0:{
                    items:1
                },
                800:{
                    items:2
                },
                1300:{
                    items:3
                },
                1500:{
                    items:4
                }
            }
        })

    }

    if($( "#teacher-clander .con ul" ).length){

        $('#teacher-clander .con ul').owlCarousel({
            loop:false,
            margin:10,
            rtl: true,
            nav:true,
            touchDrag  : false,
            mouseDrag  : false,
            // center: true,
            autoplay:false,
            navText : ["هفته قبل<i class='icon-rarrow'></i>","هفته بعد<i class='icon-larrow'></i>"],
            responsive:{
                0:{
                   items:1,
                    slideBy: 1
                },
                600:{
                    items:3,
                    slideBy: 3
                },
                1000:{
                    items:5,
                    slideBy: 5
                },
                1500:{
                    items:7,
                    slideBy: 7
                }
            }
        })

    }

    if($( ".stulist" ).length){

        $('.stulist').owlCarousel({
            loop:false,
            margin:0,
            rtl: true,
            nav:true,
            // center: true,
            autoplay:false,
            navText : ["<i class='icon-arrow-right-line'></i>","<i class='icon-arrow-right-line'></i>"],
            responsive:{
                0:{
                   items:1
                },
                600:{
                    items:3
                },
                1000:{
                    items:5
                },
                1500:{
                    items:5
                }
            }
        })

    }


    // Start Calnedar
    $('#teacher-clander').mouseleave(function(){
        $('#teacher-clander .resbox').remove();
        $('#teacher-clander .con ul li .buto').remove();
        $('#teacher-clander .con ul li .act').removeClass('act');

    })
    $('#teacher-clander .con ul li .hour').mouseenter(function(){
        $('#teacher-clander  .resbox').remove();
        $('#teacher-clander .con ul li .buto').remove();
        $('#teacher-clander .con ul li .act').removeClass('act');

   })
    $('#teacher-clander .con ul li .hour.open').mouseenter(function(){
        var a= $(this).next();
        var b= $(this).prev();
        var c= $(this).data('time');
        var w= $(this).width();
        var ml= -(274-w)/2;
        var parent= $(this).parents('#teacher-clander');
        var totop= $(this).offset().top-parent.offset().top-310;
        var toleft= $(this).offset().left-parent.offset().left;
        var day= $(this).parent('li').data('date');
        var img= parent.data('pic');
        var name= parent.data('name');
        var job= parent.data('job');
        if(a.hasClass('open')){
            var ftime= $(this).data('time');
            var ltime= a.next().data('time');

        }else if(b.hasClass('open')){
            var ftime= b.data('time');
            var ltime= a.data('time');
        }
        var d='<div class="resbox" style="top:'+totop+'px; margin-left:'+ml+'px; left:'+toleft+'px;">'+
                '<div class="ma">'+
                    '<div class="top">'+
                        '<div class="rightl">'+
                            '<img src="'+img+'" alt="">'+
                        '</div>'+
                        '<div class="leftl">'+
                            '<span class="title">'+name+'</span>'+
                            '<span class="bot">'+job+'</span>'+
                        '</div>'+
                    '</div>'+
                    '<div class="date">'+
                        '<ul>'+
                            '<li><span>تاریخ :</span><span class="vla">'+day+'</span></li>'+
                            '<li><span> زمان :</span><span class="vla">'+ftime+ '</span><span class="vla">-</span><span class="vla">' + ltime+'</span></li>'+
                        '</ul>'+
                    '</div>'+
                    '<div class="but">'+
                       ' <span>رزرو جلسه </span>'+
                    '</div>'+
               '</div>'+

            '</div>';
            var e= '<div class="buto">'+
                    '<span>'+ftime+'</span>'+
                    '</div>';

        if(a.hasClass('open')){
            parent.append(d);
            $(this).append(e).addClass('act');
        }else if(b.hasClass('open')){
            parent.append(d);
            b.append(e).addClass('act');

        }

    })
    // End Calnedar


    // Start Teacher nav
    if($( ".teacher-nav" ).length){
        $(window).bind('scroll', function () {
            var a = $('.teacher-nav').offset().top;
            var w = $('#teacher-details').width();
            if ($(window).scrollTop() > a) {
                $('.teacher-nav').addClass('fixed').children().css('width',w);
            } else {
                $('.teacher-nav').removeClass('fixed').children().removeAttr('style');
            }
        });
    }


    if($( ".teacher-inform" ).length){
        $(window).bind('scroll', function () {
            var b= $( ".teacher-inform" ).height();
            var c= $( ".teacher-inform" ).width();
            var d= ($(window).height()-b)/2+(37);
            var a = $('.teacher-inform').offset().top-d;
            console.log(b);
            // console.log($(window).height());
            if ($(window).scrollTop() > a) {

                $('.teacher-inform').addClass('fixed').css('height',b);
                $('.teacher-inform > div').css({'width':c,'top':d
            });
            } else {
                $('.teacher-inform').removeClass('fixed').removeAttr('style');
                $('.teacher-inform > div').removeClass('fixed').removeAttr('style');
            }
        });
    }

function btop(a){
    var d= a.attr('id');
    var v = a.offset().top;
        // console.log($('#'+d));
    if ($(window).scrollTop()+90 < v && v < $(window).scrollTop()+130 ) {
        $("a[href$='"+d+"']").addClass('active').parent().siblings().children().removeClass('active');
    }
}

$(window).scroll(function(){
    $('.tnav').each(function(){
        btop($(this));
    })
})
    // End Teacher nav

$('.teacher-nav a[href*="#"]')
  // Remove links that don't actually link to anything
  .not('[href="#"]')
  .not('[href="#0"]')
  .click(function(event) {
    // On-page links
    if (
      location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
      &&
      location.hostname == this.hostname
    ) {
      // Figure out element to scroll to
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      // Does a scroll target exist?
      if (target.length) {
        // Only prevent default if animation is actually gonna happen
        event.preventDefault();
        $('html, body').animate({
          scrollTop: target.offset().top -100
        }, 1000, function() {
          // Callback after animation
          // Must change focus!
          var $target = $(target);
          $target.focus();
          if ($target.is(":focus")) { // Checking if the target was focused
            return false;
          } else {
            $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
            $target.focus(); // Set focus again
          };
        });
      }
    }
  });




  $('.about-more > div').click(function(){
    $(this).parent().remove();
    var a= $('.about-text > div').height()+100;
    var a= $('.about-text').css('max-height',a);
  })




if($("#countdown").length){
$("#countdown").each(function(){
    var a = $(this).data('time');
    $(this).countdowntimer({
        dateAndTime : a,
        size : "lg",
        displayFormat: 'DHMS',
        labelsFormat: true
    });
})

}




$(".backtop").click(function () {
   //1 second of animation time
   //html works for FFX but not Chrome
   //body works for Chrome but not FFX
   //This strange selector seems to work universally
   $("html, body").animate({scrollTop: 0}, 1000);
});




    // Start Faq
    $('.faq .question').click(function(){
      if($(this).parent().hasClass('active')){
        $(this).parent().removeClass('active');
        $(this).siblings().slideUp();
      }else{
        $(this).parent().addClass('active');
        $(this).siblings().slideDown();

        $(this).parent().siblings().removeClass('active').children('.answer').slideUp();
      }
    })




    $('.profile-setting .add-language .add').click(function(){
        var a='<div class="input-container fill">'+' <input type="text" >'+'</div>';
        $( a ).insertBefore( $(this) );
    })



    $('.expert-form .expert-section .form .addt').click(function(){
        var a= $(this).siblings().val();
        var c= $(this).parent().siblings('.result');
        var b= '<span>'+a+'<i class="icon-close"></i></span>';
        if (a){
            c.append(b);
        }
    })

    $('body').on('click', '.expert-form .expert-section div.result span i', function() {
        $(this).parent().remove();
    })




    $('#article-from .add-tag .form .addt').click(function(){
        var a= $(this).siblings().val();
        var c= $(this).parent().siblings('.result');
        var b= '<span>'+a+'<i class="icon-close"></i></span>';
        if (a){
            c.append(b);
        }
    })

    $('body').on('click', '#article-from .add-tag div.result span i', function() {
        $(this).parent().remove();
    })






    if($( "#mytextarea" ).length){

      tinymce.init({
        selector: '#mytextarea',
        theme : "silver",
        language : "fa_IR",
        branding: false
      });

  }


    if($("input[type='number']").length){

     $("input[type='number']").inputSpinner()
    }





    if($("#teacher-sidebatr").length){
        $('.teacher-inform, #teacher-details').theiaStickySidebar({
      // Settings
      additionalMarginTop: 30
    });
    }




    if($( "#teacher-clander .cond ul" ).length){



$( document ).drag("start",function( ev, dd ){
            return $('<div class="selectiong" />')
                .css('opacity', .65 )
                .appendTo( document.body );
        })
        .drag(function( ev, dd ){
            $( dd.proxy ).css({
                top: Math.min( ev.pageY, dd.startY ),
                left: Math.min( ev.pageX, dd.startX ),
                height: Math.abs( ev.pageY - dd.startY ),
                width: Math.abs( ev.pageX - dd.startX )
            });
        })
        .drag("end",function( ev, dd ){
            $( dd.proxy ).remove();
        });
    $('.hour')
        .drop("start",function(){
            $( this ).addClass("reservedd");
        })
        .drop(function( ev, dd ){
            $( this ).toggleClass("open");
        })
        .drop("end",function(){
            $( this ).removeClass("reservedd");
        });
    $.drop({ multi: true });


    $('#teacher-clander .cond ul li .hour').click(function(){
        if($(this).hasClass('open')){
            console.log('a')
            $(this).removeClass('open');
        }else{
            $(this).addClass('open');
            console.log('b')

        }
    })


    }



    if($( ".lang-listc" ).length){


$('.lang-listc input').click(function(){
        $('.lang-listc .lang-list').fadeIn();
    // if($('.lang-listc').hasClass('active')){
    //     $('.lang-listc').removeClass('active');
    //     $('.lang-listc .lang-list').fadeOut();
    // }else{
    //     $('.lang-listc').addClass('active');
    // }
})

$('.lang-listc .lang-list li').click(function(){
    var a= $(this).find('.top').text();
    $('.lang-listc input').val(a);
    $('.lang-listc .lang-list').fadeOut();

})

$('body').click(function(){
    $('.lang-listc .lang-list').fadeOut();

})
$('.lang-listc').click(function(event){
  event.stopPropagation();

})
    }








    })
})(jQuery);
