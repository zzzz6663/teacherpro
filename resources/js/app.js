require('./bootstrap');
require('sweetalert');


window.onscroll = function() {myFunction()};

var elementExists = document.getElementById("site-content");
if (elementExists){
var header = document.getElementById("header");
var sticky = header.offsetTop;
}

function myFunction() {
    var elementExists = document.getElementById("site-content");
    // console.log(elementExists)
    if (elementExists){
        if (window.pageYOffset > sticky) {
            header.classList.add("sticky");
        } else {
            header.classList.remove("sticky");
        }
    }

}



if ($('.select2').length){
    $('.select2').select2();

}
$(document).on("wheel", "input[type=number]", function (e) {
    $(this).blur();
});

$('#forwallet').on('change', function (e) {
    var val=   $('input[name="bank"]:checked').val();
    console.log(val)
    if (val=='wallet'){
        $('#forwallet').prop('checked', false);
    }
});
$('input[name="bank"]').on('change', function (e) {
    var ele =$(this)
    console.log(ele.val())
   if ($("#checkwallet").length && ele.val()=='wallet'){
       $("#checkwallet").hide(400)
       $('#forwallet').prop('checked', false); // Unchecks it

   }else {
       $("#checkwallet").show(400)
   }
});

$('.status_change').on('change', function (e) {
   var element= $(this)
    element.closest('.form').submit();
});

var sum;
$("input[type='radio'][name='class_type']").click(function() {
    var value = $(this).val();

    var count = $(this).data('count');
    $('#count_meet').val(count)
     sum = $(this).data('sum');
    // $('#fst').val(sum)
    // sum=addCommas(sum)
    // $('.sum').text(sum)
});
$('#forwallety').on('change', function() {
    var val = $(this).val()
    var cash=$(this).data('cash')
    cash=Number(cash)

    if($(this).is(':checked') && sum>cash){
            $('.sum').text( addCommas(sum-cash))
        }else {
            $('.sum').text( addCommas(sum))
        }

    console.log(val)
    console.log(cash)
    console.log(sum)
    // $('#show').html(val);
});

if ($('.persian2').length){
    $(".persian2").persianDatepicker({
        initialValue: true,
        format: 'YYYY-MM-DD',
        autoClose: true,
        initialValueType:'persian'

    });
}
$('#child').on('change', function (e) {
 if ($(this).is(":checked")){
     $('#pare').show(400)
 }else {
     $('#pare').hide(400)
 }
});


$('body').on('keyup', '.money', function(event){
    var element=$(this)
    var val=element.val()

    var tx = element.siblings('.tx')

    tx.text(addCommas(val) + ' تومان')
})


if($( ".js-player" ).length){
    const players = Array.from(document.querySelectorAll('.js-player')).map(p => new Plyr(p));

}

if ($('.count').length){
    $('.count').each(function () {
        console.log(12)

        $(this).prop('Counter',0).animate({
            Counter: $(this).text()
        }, {
            duration: 4000,
            easing: 'swing',
            step: function (now) {
                $(this).text(Math.ceil(now));
            }
        });
    });
}
if ($('#e_section').length){
    console.log('eerror')
    var $container = $("html,body");
    var $scrollTo = $('#e_section');

    $container.animate({scrollTop: $scrollTo.offset().top - $container.offset().top + $container.scrollTop()-200, scrollLeft: 0},300);

}



