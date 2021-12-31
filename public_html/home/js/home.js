/**
 * @package     Joomla.Site
 * @subpackage  Templates.protostar
 * @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @since       3.2
 */

/***************************************************************************************************
 LoadingOverlay - A flexible loading overlay jQuery plugin
 Author          : Gaspare Sganga
 Version         : 2.1.7
 License         : MIT
 Documentation   : https://gasparesganga.com/labs/jquery-loading-overlay/
 ***************************************************************************************************/
! function(e) { "function" == typeof define && define.amd ? define(["jquery"], e) : "object" == typeof module && module.exports ? e(require("jquery")) : e(jQuery) }(function(g, a) {
    "use strict";
    var t = { background: "rgba(255, 255, 255, 0.8)", backgroundClass: "", image: "<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1000 1000'><circle r='80' cx='500' cy='90'/><circle r='80' cx='500' cy='910'/><circle r='80' cx='90' cy='500'/><circle r='80' cx='910' cy='500'/><circle r='80' cx='212' cy='212'/><circle r='80' cx='788' cy='212'/><circle r='80' cx='212' cy='788'/><circle r='80' cx='788' cy='788'/></svg>", imageAnimation: "2000ms rotate_right", imageAutoResize: !0, imageResizeFactor: 1, imageColor: "#202020", imageClass: "", imageOrder: 1, fontawesome: "", fontawesomeAnimation: "", fontawesomeAutoResize: !0, fontawesomeResizeFactor: 1, fontawesomeColor: "#202020", fontawesomeOrder: 2, custom: "", customAnimation: "", customAutoResize: !0, customResizeFactor: 1, customOrder: 3, text: "", textAnimation: "", textAutoResize: !0, textResizeFactor: .5, textColor: "#202020", textClass: "", textOrder: 4, progress: !1, progressAutoResize: !0, progressResizeFactor: .25, progressColor: "#a0a0a0", progressClass: "", progressOrder: 5, progressFixedPosition: "", progressSpeed: 200, progressMin: 0, progressMax: 100, size: 50, maxSize: 120, minSize: 20, direction: "column", fade: !0, resizeInterval: 50, zIndex: 2147483647 },
        c = { overlay: { "box-sizing": "border-box", position: "relative", display: "flex", "flex-wrap": "nowrap", "align-items": "center", "justify-content": "space-around" }, element: { "box-sizing": "border-box", overflow: "visible", flex: "0 0 auto", display: "flex", "justify-content": "center", "align-items": "center" }, element_svg: { width: "100%", height: "100%" }, progress_fixed: { position: "absolute", left: "0", width: "100%" }, progress_wrapper: { position: "absolute", top: "0", left: "0", width: "100%", height: "100%" }, progress_bar: { position: "absolute", left: "0" } },
        n = { count: 0, container: a, settings: a, wholePage: a, resizeIntervalId: a, text: a, progress: a },
        s = { animations: ["rotate_right", "rotate_left", "fadein", "pulse"], progressPosition: ["top", "bottom"] },
        d = { animations: { name: "rotate_right", time: "2000ms" }, fade: [400, 200] };

    function o(e, s) {
        e = g(e), s.size = w(s.size), s.maxSize = parseInt(s.maxSize, 10) || 0, s.minSize = parseInt(s.minSize, 10) || 0, s.resizeInterval = parseInt(s.resizeInterval, 10) || 0;
        var t = p(e),
            a = u(e);
        if (!1 === a) {
            if ((a = g.extend({}, n)).container = e, a.wholePage = e.is("body"), t = g("<div>", { class: "loadingoverlay" }).css(c.overlay).css("flex-direction", "row" === s.direction.toLowerCase() ? "row" : "column"), s.backgroundClass ? t.addClass(s.backgroundClass) : t.css("background", s.background), a.wholePage && t.css({ position: "fixed", top: 0, left: 0, width: "100%", height: "100%" }), void 0 !== s.zIndex && t.css("z-index", s.zIndex), s.image) { g.isArray(s.imageColor) ? 0 === s.imageColor.length ? s.imageColor = !1 : 1 === s.imageColor.length ? s.imageColor = { fill: s.imageColor[0] } : s.imageColor = { fill: s.imageColor[0], stroke: s.imageColor[1] } : s.imageColor && (s.imageColor = { fill: s.imageColor }); var o = v(t, s.imageOrder, s.imageAutoResize, s.imageResizeFactor, s.imageAnimation); "<svg" === s.image.slice(0, 4).toLowerCase() && "</svg>" === s.image.slice(-6).toLowerCase() ? (o.append(s.image), o.children().css(c.element_svg), !s.imageClass && s.imageColor && o.find("*").css(s.imageColor)) : ".svg" === s.image.slice(-4).toLowerCase() || "data:image/svg" === s.image.slice(0, 14).toLowerCase() ? g.ajax({ url: s.image, type: "GET", dataType: "html", global: !1 }).done(function(e) { o.html(e), o.children().css(c.element_svg), !s.imageClass && s.imageColor && o.find("*").css(s.imageColor) }) : o.css({ "background-image": "url(" + s.image + ")", "background-position": "center", "background-repeat": "no-repeat", "background-size": "cover" }), s.imageClass && o.addClass(s.imageClass) }
            if (s.fontawesome) {
                o = v(t, s.fontawesomeOrder, s.fontawesomeAutoResize, s.fontawesomeResizeFactor, s.fontawesomeAnimation).addClass("loadingoverlay_fa");
                g("<div>", { class: s.fontawesome }).appendTo(o), s.fontawesomeColor && o.css("color", s.fontawesomeColor)
            }
            if (s.custom) o = v(t, s.customOrder, s.customAutoResize, s.customResizeFactor, s.customAnimation).append(s.custom);
            if (s.text && (a.text = v(t, s.textOrder, s.textAutoResize, s.textResizeFactor, s.textAnimation).addClass("loadingoverlay_text").text(s.text), s.textClass ? a.text.addClass(s.textClass) : s.textColor && a.text.css("color", s.textColor)), s.progress) {
                o = v(t, s.progressOrder, s.progressAutoResize, s.progressResizeFactor, !1).addClass("loadingoverlay_progress");
                var r = g("<div>").css(c.progress_wrapper).appendTo(o);
                a.progress = { bar: g("<div>").css(c.progress_bar).appendTo(r), fixed: !1, margin: 0, min: parseFloat(s.progressMin), max: parseFloat(s.progressMax), speed: parseInt(s.progressSpeed, 10) };
                var i = (s.progressFixedPosition + "").replace(/\s\s+/g, " ").toLowerCase().split(" ");
                2 === i.length && y(i[0]) ? (a.progress.fixed = i[0], a.progress.margin = w(i[1])) : 2 === i.length && y(i[1]) ? (a.progress.fixed = i[1], a.progress.margin = w(i[0])) : 1 === i.length && y(i[0]) && (a.progress.fixed = i[0], a.progress.margin = 0), "top" === a.progress.fixed ? o.css(c.progress_fixed).css("top", a.progress.margin ? a.progress.margin.value + (a.progress.margin.fixed ? a.progress.margin.units : "%") : 0) : "bottom" === a.progress.fixed && o.css(c.progress_fixed).css("top", "auto"), s.progressClass ? a.progress.bar.addClass(s.progressClass) : s.progressColor && a.progress.bar.css("background", s.progressColor)
            }
            s.fade ? !0 === s.fade ? s.fade = d.fade : "string" == typeof s.fade || "number" == typeof s.fade ? s.fade = [s.fade, s.fade] : g.isArray(s.fade) && s.fade.length < 2 && (s.fade = [s.fade[0], s.fade[0]]) : s.fade = [0, 0], s.fade = [parseInt(s.fade[0], 10), parseInt(s.fade[1], 10)], a.settings = s, t.data("loadingoverlay_data", a), e.data("loadingoverlay", t), t.fadeTo(0, .01).appendTo("body"), f(e, !0), 0 < s.resizeInterval && (a.resizeIntervalId = setInterval(function() { f(e, !1) }, s.resizeInterval)), t.fadeTo(s.fade[0], 1)
        }
        a.count++
    }

    function r(e, s) {
        var t = p(e = g(e)),
            a = u(e);
        !1 !== a && (a.count--, (s || a.count <= 0) && t.animate({ opacity: 0 }, a.settings.fade[1], function() { a.resizeIntervalId && clearInterval(a.resizeIntervalId), g(this).remove(), e.removeData("loadingoverlay") }))
    }

    function i(e) { f(g(e), !0) }

    function l(e, s) { var t = u(e = g(e));!1 !== t && t.text && (!1 === s ? t.text.hide() : t.text.show().text(s)) }

    function m(e, s) {
        var t = u(e = g(e));
        if (!1 !== t && t.progress)
            if (!1 === s) t.progress.bar.hide();
            else {
                var a = 100 * ((parseFloat(s) || 0) - t.progress.min) / (t.progress.max - t.progress.min);
                a < 0 && (a = 0), 100 < a && (a = 100), t.progress.bar.show().animate({ width: a + "%" }, t.progress.speed)
            }
    }

    function f(e, t) {
        var s = p(e),
            a = u(e);
        if (!1 !== a) {
            if (!a.wholePage) {
                var o = "fixed" === e.css("position"),
                    r = o ? e[0].getBoundingClientRect() : e.offset();
                s.css({ position: o ? "fixed" : "absolute", top: r.top + parseInt(e.css("border-top-width"), 10), left: r.left + parseInt(e.css("border-left-width"), 10), width: e.innerWidth(), height: e.innerHeight() })
            }
            if (a.settings.size) {
                var i = a.wholePage ? g(window) : e,
                    n = a.settings.size.value;
                a.settings.size.fixed || (n = Math.min(i.innerWidth(), i.innerHeight()) * n / 100, a.settings.maxSize && n > a.settings.maxSize && (n = a.settings.maxSize), a.settings.minSize && n < a.settings.minSize && (n = a.settings.minSize)), s.children(".loadingoverlay_element").each(function() {
                    var e = g(this);
                    if (t || e.data("loadingoverlay_autoresize")) {
                        var s = e.data("loadingoverlay_resizefactor");
                        e.hasClass("loadingoverlay_fa") || e.hasClass("loadingoverlay_text") ? e.css("font-size", n * s + a.settings.size.units) : e.hasClass("loadingoverlay_progress") ? (a.progress.bar.css("height", n * s + a.settings.size.units), a.progress.fixed ? "bottom" === a.progress.fixed && e.css("bottom", a.progress.margin ? a.progress.margin.value + (a.progress.margin.fixed ? a.progress.margin.units : "%") : 0).css("bottom", "+=" + n * s + a.settings.size.units) : a.progress.bar.css("top", e.position().top).css("top", "-=" + n * s * .5 + a.settings.size.units)) : e.css({ width: n * s + a.settings.size.units, height: n * s + a.settings.size.units })
                    }
                })
            }
        }
    }

    function p(e) { return e.data("loadingoverlay") }

    function u(e) {
        var s = p(e),
            t = void 0 === s ? a : s.data("loadingoverlay_data");
        return void 0 === t ? (g(".loadingoverlay").each(function() {
            var e = g(this),
                s = e.data("loadingoverlay_data");
            document.body.contains(s.container[0]) || (s.resizeIntervalId && clearInterval(s.resizeIntervalId), e.remove())
        }), !1) : (s.toggle(e.is(":visible")), t)
    }

    function v(e, s, t, a, o) {
        var r = g("<div>", { class: "loadingoverlay_element", css: { order: s } }).css(c.element).data({ loadingoverlay_autoresize: t, loadingoverlay_resizefactor: a }).appendTo(e);
        if (!0 === o && (o = d.animations.time + " " + d.animations.name), "string" == typeof o) {
            var i, n, l = o.replace(/\s\s+/g, " ").toLowerCase().split(" ");
            2 === l.length && x(l[0]) && h(l[1]) ? (i = l[1], n = l[0]) : 2 === l.length && x(l[1]) && h(l[0]) ? (i = l[0], n = l[1]) : 1 === l.length && x(l[0]) ? (i = d.animations.name, n = l[0]) : 1 === l.length && h(l[0]) && (i = l[0], n = d.animations.time), r.css({ "animation-name": "loadingoverlay_animation__" + i, "animation-duration": n, "animation-timing-function": "linear", "animation-iteration-count": "infinite" })
        }
        return r
    }

    function x(e) { return !isNaN(parseFloat(e)) && ("s" === e.slice(-1) || "ms" === e.slice(-2)) }

    function h(e) { return -1 < s.animations.indexOf(e) }

    function y(e) { return -1 < s.progressPosition.indexOf(e) }

    function w(e) { return !(!e || e < 0) && ("string" == typeof e && -1 < ["vmin", "vmax"].indexOf(e.slice(-4)) ? { fixed: !0, units: e.slice(-4), value: e.slice(0, -4) } : "string" == typeof e && -1 < ["rem"].indexOf(e.slice(-3)) ? { fixed: !0, units: e.slice(-3), value: e.slice(0, -3) } : "string" == typeof e && -1 < ["px", "em", "cm", "mm", "in", "pt", "pc", "vh", "vw"].indexOf(e.slice(-2)) ? { fixed: !0, units: e.slice(-2), value: e.slice(0, -2) } : { fixed: !1, units: "px", value: parseFloat(e) }) }
    g.LoadingOverlaySetup = function(e) { g.extend(!0, t, e) }, g.LoadingOverlay = function(e, s) {
        switch (e.toLowerCase()) {
            case "show":
                o("body", g.extend(!0, {}, t, s));
                break;
            case "hide":
                r("body", s);
                break;
            case "resize":
                i("body");
                break;
            case "text":
                l("body", s);
                break;
            case "progress":
                m("body", s)
        }
    }, g.fn.LoadingOverlay = function(e, s) {
        switch (e.toLowerCase()) {
            case "show":
                return this.each(function() { o(this, g.extend(!0, {}, t, s)) });
            case "hide":
                return this.each(function() { r(this, s) });
            case "resize":
                return this.each(function() { i(this) });
            case "text":
                return this.each(function() { l(this, s) });
            case "progress":
                return this.each(function() { m(this, s) })
        }
    }, g(function() { g("head").append(["<style>", "@-webkit-keyframes loadingoverlay_animation__rotate_right {", "to {", "-webkit-transform : rotate(360deg);", "transform : rotate(360deg);", "}", "}", "@keyframes loadingoverlay_animation__rotate_right {", "to {", "-webkit-transform : rotate(360deg);", "transform : rotate(360deg);", "}", "}", "@-webkit-keyframes loadingoverlay_animation__rotate_left {", "to {", "-webkit-transform : rotate(-360deg);", "transform : rotate(-360deg);", "}", "}", "@keyframes loadingoverlay_animation__rotate_left {", "to {", "-webkit-transform : rotate(-360deg);", "transform : rotate(-360deg);", "}", "}", "@-webkit-keyframes loadingoverlay_animation__fadein {", "0% {", "opacity   : 0;", "-webkit-transform : scale(0.1, 0.1);", "transform : scale(0.1, 0.1);", "}", "50% {", "opacity   : 1;", "}", "100% {", "opacity   : 0;", "-webkit-transform : scale(1, 1);", "transform : scale(1, 1);", "}", "}", "@keyframes loadingoverlay_animation__fadein {", "0% {", "opacity   : 0;", "-webkit-transform : scale(0.1, 0.1);", "transform : scale(0.1, 0.1);", "}", "50% {", "opacity   : 1;", "}", "100% {", "opacity   : 0;", "-webkit-transform : scale(1, 1);", "transform : scale(1, 1);", "}", "}", "@-webkit-keyframes loadingoverlay_animation__pulse {", "0% {", "-webkit-transform : scale(0, 0);", "transform : scale(0, 0);", "}", "50% {", "-webkit-transform : scale(1, 1);", "transform : scale(1, 1);", "}", "100% {", "-webkit-transform : scale(0, 0);", "transform : scale(0, 0);", "}", "}", "@keyframes loadingoverlay_animation__pulse {", "0% {", "-webkit-transform : scale(0, 0);", "transform : scale(0, 0);", "}", "50% {", "-webkit-transform : scale(1, 1);", "transform : scale(1, 1);", "}", "100% {", "-webkit-transform : scale(0, 0);", "transform : scale(0, 0);", "}", "}", "</style>"].join(" ")) })
});

function timer() {
    $('#resend_sms').hide(400)
    $('#cdown').show(400)
    var timer2 = "1:29";
    var sec = 90
    var interval = setInterval(function() {
        var timer = timer2.split(':');
        //by parsing integer, I avoid all extra string processing
        var minutes = parseInt(timer[0], 10);
        var seconds = parseInt(timer[1], 10);

        --seconds;
        --sec;
        minutes = (seconds < 0) ? --minutes : minutes;
        if (minutes < 0) clearInterval(interval);
        seconds = (seconds < 0) ? 59 : seconds;
        seconds = (seconds < 10) ? '0' + seconds : seconds;
        //minutes = (minutes < 10) ?  minutes : minutes;
        $('#cdown').html(' ارسال مجدد کد تا   ' + minutes + ':' + seconds);
        timer2 = minutes + ':' + seconds;
        if (sec == 0) {
            $('#cdown').hide(400)
            $('#resend_sms').show(400)
            clearInterval(interval);

        }
    }, 1000);
}

function copyToClipboard(element) {
    var $temp = $("<input>");
    $("body").append($temp);
    $temp.val($(element).text()).select();
    document.execCommand("copy");
    $temp.remove();
}

function copyToClipboard2(txt) {
    var $temp = $("<input>");
    $("body").append($temp);
    $temp.val(txt).select();
    document.execCommand("copy");
    $temp.remove();
}

(function($) {
    $(document).ready(function() {
        $("body").LoadingOverlay("hide");
        $(document).on('submit', 'form', function() {
            var el = $(this)
            if (!el.hasClass('bl')) {
                // // $('body').LoadingOverlay("show"  )
                setTimeout(
                    function() {
                        //do something special
                    }, 5000);

            }
            // $(window).on('hashchange', function(e){
            //     $("body").LoadingOverlay("hide");
            //
            // });

        });



        $("body").LoadingOverlay("hide");
        var  width=$('body').width()
        var  height=width*0.3
        console.log(width-((width*40)/100))
        var resize = $('#upload-demo').croppie({
            enableExif: true,
            enableOrientation: true,
            viewport: { // Default { width: 100, height: 100, type: 'square' }
                width: 300,
                height: 300,
                type: 'square' //square
            },
            boundary: {
                width: 400,
                height: 400,
            },
        });

        $('.cover-file').on('change', function () {
            $('.upload_avatar').show(400)
            var reader = new FileReader();
            reader.onload = function (e) {
                resize.croppie('bind',{
                    url: e.target.result
                }).then(function(){
                    console.log('jQuery bind complete');
                });
            }
            reader.readAsDataURL(this.files[0]);
        });


        $('.btn-upload-image').on('click', function (ev) {
            var element=$(this)

            $("body").LoadingOverlay("show");
            resize.croppie('result', {
                type: 'canvas',
                size: 'viewport'
            }).then(function (img) {
                $.ajaxSetup({
                    'headers':{
                        'X-CSRF-TOKEN':document.head.querySelector('meta[name="csrf-token"]').content
                    }
                })
                var url=element.data('url')
                console.log(url)
                console.log(4444444444444444444444444)
                // console.log(img)
                $.ajax({
                    url: url,
                    type: "POST",
                    data: {"avatar":img},
                    success: function (data) {
                        console.log(898989899898888888888888)
                        console.log(data)
                        $("#avatar_img").attr("src",data.url);
                        $(".imgcov").css("background",data.url);
                        $('.upload_avatar').hide(400)
                        $("body").LoadingOverlay("hide");
                        noty('تصویر با موفقیت به روز شد','green','')
                        setTimeout(
                            function()
                            {
                                location.reload();

                            }, 500);
                    },
                    error: function (request, status, error) {
                       console.log(error)
                       console.log(request)
                       console.log(status)
                        $("body").LoadingOverlay("hide");
                       noty('خطایی در سرور رخ داده است ')
                    }
                });
            });
        });





























        $('input[type=radio][name=login_type]').change(function() {
            var val = $(this).val()
            if (val == 'register') {
                $('#login_t_sec').show(400)
                $('#register_type').val(1)
                $('#registerbt').text('ثبت نام')
            } else {
                $('#login_t_sec').hide(400)
                $('#register_type').val(0)
                $('#registerbt').text('ورود')
            }
        });
        $('body').on('click', '#check_sms', function(event) {
            var element = $(this)
            var url = element.data('url')
            var str = {
                'code': $('#code').val(),
            }
            var res = lara_str_ajax(url, str)
            console.log(res)

            if (res.status == 'ok') {
                noty('ورود با موفقیت', 'green', '')
                setTimeout(
                    function() {
                        window.location.href = res.url
                    }, 200);

            }
            if (res.status == 'notok') {
                noty('کد وارد شده صحیح نمی باشد')
            }

        })
        $('body').on('click', '#resend_sms', function(event) {
            timer()
            var element = $(this)
            var url = element.data('url')
            var str = {
                'mobile': $('#mobile').val(),
                'level': $('input[name="level"]:checked').val()
            }
            console.log(str)
            var res = lara_str_ajax(url, str)
            console.log(res)
            if (res.status == 'ok') {
                $('#mobile_section').hide(400)
                $('#code_section').show(400)


            }

        })
        $('body').on('submit', '#register_form', function(event) {
            event.preventDefault();
            var element = $(this)
            var url = element.data('url')
            var mobile = $('#mobile').val();
            console.log(mobile)

            // if ($('input[name="name_of_your_radiobutton"]:checked').val())
            if ($('input[name="level"]:checked').val() == undefined && $('input[name="login_type"]:checked').val() == 'register') {
                noty('لطفا  نوع سطح خود را مشخص کنید')
                return
            }
            var res = lara_ajax(url, new FormData(this), '', '', false)
            if (res.new == '0') {
                noty('لطفا  ابتدا ثبت نام کنید')
                return;
            }
            if (res.status == 'ok') {
                timer()
                $('#mobile_section').hide(400)
                $('#code_section').show(400)
                $('#registerbt_p').hide(400)
                $('#check_sms_p').show(400)
            }
            $('#nmobile').text('شماره موبایل وارد شده :' + mobile);

        })
        $(document).on('click', 'a', function() {
            var el = $(this)
            if (!el.hasClass('bl')) {
                // $('body').LoadingOverlay("show"  )

            }
        });

        if ($(".eerror").length) {

            $('html, body').animate({
                scrollTop: $(".eerror").offset().top - 200
            });
        }
        var min = $('#min').data('min')
        min = Number(min)
        $('body').on('change', '#s1', function(e) {
            var el = $(this)
            var max = el.val()
            console.log(min)
            var diff = max - min
            var content = `
            <option value=""></option>
            `
            for (i = 0; i <= (diff) / 5000; i++) {
                content += `
            <option value="${Number(max)-(i*5000)}">${Number(max)-(i*5000)} تومان</option>
            `
            }
            $('#s2').html(content)

        })
        $('body').on('change', '#s2', function(e) {
            var el = $(this)
            var max = el.val()
            var diff = max - min
            var content = `
            <option value=""></option>
            `
            for (i = 0; i <= diff / 5000; i++) {
                content += `
            <option value="${Number(max)-(i*5000)}">${Number(max)-(i*5000)} تومان</option>
            `
            }
            $('#s3').html(content)

        })

        $('body').on('click', '.f_form', function(e) {
            var el = $(this)
            var id = el.data('id')
            $('#f_form_' + id).submit()
        })
        $('body').on('click', '.copy-link', function(e) {
            var el = $(this)
            copyToClipboard2(el.data('link'))
            noty('لینک با موفقیت کپی شد ', 'green', 'پیام')
        })
        $('body').on('click', '.perisan', function(e) {
            var el = $(this)
            console.log('11')
            var p = new persianDate();
            var ss = el.persianDatepicker({
                startDate: "today",
                endDate: "1495/5/5",
                inline: true,
                observer: true,

            });
            pd.show();
        })
        if ($(".perisan").length) {
            var p = new persianDate();
            $(".perisan").persianDatepicker({
                startDate: "today",
                endDate: "1495/5/5",
                inline: true,
            });
        }
        if ($("#jtab").length) {
            var index = $.cookie('taby');

            $('body').on('click', '.taby', function(e) {
                var element = $(this)
                index = element.index()
                $.cookie('taby', index);
            })
            if (index == undefined) {
                index = 0
            }
            $('.taby').removeClass('active')
            $('.tabv').removeClass('active')
            setTimeout(
                function() {
                    $('.taby').eq(index).addClass('active')
                    var ff = Number(index) + 1
                    $('.tabv').eq(ff).addClass('active')
                }, 200);


        }


        $('body').on('click', '.add_comment', function(e) {
            var element = $(this)
            let id = element.data('id')

            $([document.documentElement, document.body]).animate({
                scrollTop: $("#reply-title").offset().top
            }, 1000);
            $('#paretn').val(id)
        })
        $('body').on('click', '.reply', function(e) {
            var element = $(this)
            let id = element.data('id')

            $('#comment').val(id)
            $('#comm').show(400)

            $('body').on('click', '#sub_com', function(e) {
                $('#t_com').submit()
            })
        })

        $('body').on('change', '#year', function(e) {
            $('#year_form').submit()
        })
        $('body').on('change', '#count_class', function(e) {
            var element = $(this)
            console.log(element.val())
        })
        $('body').on('change', '#activeprofile', function(e) {
            $('#activeprofile_form').submit()
        })
        $('body').on('change', '#time', function(e) {
            var element = $(this)
            $('#sort').submit()
        })
        $('body').on('change', '#status', function(e) {
            var element = $(this)
            $('#sta').submit()
        })
        $('body').on('change', '#featured-pic', function(e) {
            var element = $(this)
            var filename = element.val().split('\\').pop();
            $('#img_name').text(filename)
        })
        if ($(".draggable").length) {
            // $('.draggable').draggable()
        }

        $('body').on('change', '#featured-video', function(e) {
            var element = $(this)
            var filename = element.val().split('\\').pop();
            $('#vid_name').text(filename)
        })



        $('body').on('change', '.avat', function(e) {
            var element = $(this)
            var par = element.closest('form')
            par.submit();
        })

        $('body').on('change', '.avat2', function(e) {
            console.log(2222222)
            var element = $(this)
            var par = element.closest('form')
            par.submit();
        })

        $('body').on('click', '.popup-container span.close , .close_popup', function(e) {
            $('.popupc').hide(500)
            $("body").removeAttr("style");
        })
        $('body').on('click', '#usermenu,#show_login,.show_login', function(e) {
            // $('body').css('overflow' , 'hidden')
            window.location = '/register'

        })

        $('body').on('click', '#s1_b', function(e) {
            $('#s1').submit()
        })
        $('body').on('click', '#show_video', function(e) {
            $('#video_tut').show(400)

        })
        $('body').on('click', '#force_login', function(e) {
            $('.popupc').hide(400)
            noty('لطفا ابتدا وارد حساب کابری خود شوید ')
            $('#login_popup').show(400)
            $("body").removeAttr("style");
        })
        $('body').on('click', '#checkout', function(e) {
            $('#checkout_popup').show(400)
        })
        $('body').on('click', '#wallet', function(e) {
            $('#wallet_popup').show(400)
        })
        $('body').on('keyup', '#amount', function(e) {
            var element = $(this)
            $("input[type=radio][name=pricech]").prop("checked", false);
            var dd = addCommas(element.val())
            $('.amount').text(dd + ' تومان ')

        })

        $('input[type=radio][name=pricech]').change(function() {
            var element = $(this)
            console.log(element.val())
            $('#amount').val(0)
            $('.amount').text(0 + ' تومان ')
        });
        $('.tabnav li').click(function() {

            var a = $(this).index();
            var b = $(this).parent().siblings('.tabcontainer');
            $(this).addClass('active').siblings().removeClass('active');
            var par = $(this).closest('.taby')
            var tabcont = par.find('.tabcontainer li')
            tabcont.removeClass('active')
            $('.tabcontainer li').eq(a).addClass('active')
                // b.children('li').eq(a).addClass('active').siblings().removeClass('active');
        })


        // $('body').on('submit', '#info', function(event){
        //     if ($( ".lang" ).length==0){
        //         noty('لطفا زبان های خود را اضافه کنید ')
        //         return
        //     }
        //     $( ".lang" ).each(function( index ) {
        //        var el=$(this)
        //         if (str.trim(el).len)
        //     });
        //     event.preventDefault();
        //     var element=$(this)
        // })

        $('body').on('submit', '#login_form', function(event) {
            event.preventDefault();
            var element = $(this)
            var url = element.data('url')
            var res = lara_ajax(url, new FormData(this), '', '', false)
            console.log(res)
            if (res.status == '0') {
                noty('اطلاعات وارد شده صحیح نمی باشید')
                $("body").LoadingOverlay("hide");

            }
            if (res.status == '1') {

                noty('ورود با موفقیت', 'green', '')
                $("body").LoadingOverlay("hide");

                setTimeout(
                    function() {
                        window.location.href = res.url
                    }, 1000);

            }
        })
        $('body').on('click', '.dele_com', function(event) {
            var ele = $(this)
            var par = ele.closest('.par_com')
            par.hide(400)
        })
        $('body').on('click', '.answer_com', function(event) {
            var ele = $(this)
            var par = ele.closest('.left')
            par.find('.par_com').show(400)
        })
        $('body').on('click', '.sub_com', function(event) {
            var ele = $(this)
            event.preventDefault();
            var id = ele.data('id')
            var par = ele.closest('.par_for')

            var res = valid_form('par_' + id, '/', '', '', false)
            console.log('#' + 'par_' + id)
            $('#' + 'par_' + id).submit()
        })
        $('body').on('submit', '#submit_form', function(event) {
            event.preventDefault();
            var element = $(this)
            var url = element.data('url')
            var res = lara_ajax(url, new FormData(this), '', '', false)
            console.log(res)
            if (res.status == '1') {
                noty('ورود با موفقیت', 'green', '')
                setTimeout(
                    function() {
                        window.location.href = res.url
                    }, 1000);

            }
        })






        $('input[type=radio][name=freeclass]').change(function() {
            if (this.value == 'nofree') {
                $('.clas_sec').show(400)
            } else {
                $('.clas_sec').hide(400)
            }
        });
        $('.ts').change(function() {
            $('#s1').submit()
        });
        $('#s1form').click(function() {
            $('#s2').submit()
        });



























        var a;
        var b;
        var el;

        $('#teacher-clander .con ul li .hour.open').mouseenter(function() {
            if ($(this).data('level') != 'student') {
                return
            }
            el = $(this)
            var btid = 'start_reserve';
            if ($('#res_student').length) {
                btid = 'student_reserve'
            }
            a = $(this).next();
            b = $(this).prev();
            console.log(a.length)
            console.log(b.length)

            var c = $(this).data('time');
            var id = $(this).data('id');
            var date = $(this).data('da');
            var time = $(this).data('time');
            var class_id = $(this).data('cid')
            var w = $(this).width();
            var ml = -(274 - w) / 2;
            var parent = $(this).parents('#teacher-clander');
            var totop = $(this).offset().top - parent.offset().top - 310;
            var toleft = $(this).offset().left - parent.offset().left;
            var day = $(this).parent('li').data('date');
            var img = parent.data('pic');
            var name = parent.data('name');
            var job = parent.data('job');
            if (a.hasClass('open')) {
                var ftime = $(this).data('time');
                var ltime = a.next().data('time');

            } else if (b.hasClass('open')) {
                var ftime = b.data('time');
                var ltime = a.data('time');
            }
            var d = '<div class="resbox" style="top:' + totop + 'px; margin-left:' + ml + 'px; left:' + toleft + 'px;">' +
                '<div class="ma">' +
                '<div class="top">' +
                '<div class="rightl">' +
                '<img src="' + img + '" alt="">' +
                '</div>' +
                '<div class="leftl">' +
                '<span class="title">' + name + '</span>' +
                '<span class="bot">' + job + '</span>' +
                '</div>' +
                '</div>' +
                '<div class="date">' +
                '<ul>' +
                '<li><span>تاریخ :</span><span class="vla">' + day + '</span></li>' +
                '<li><span> زمان :</span><span class="vla">' + ftime + '</span><span class="vla">-</span><span class="vla">' + ltime + '</span></li>' +
                '</ul>' +
                '</div>' +
                '<div class="but">' +
                ' <span id="' + btid + '" data-id="' + id + '" data-date="' + date + '" data-time="' + time + '" data-cid="' + class_id + '"  ' +
                '>رزرو جلسه </span>' +
                '</div>' +
                '</div>' +

                '</div>';
            var e = '<div class="buto">' +
                '<span>' + ftime + '</span>' +
                '</div>';

            if (a.hasClass('open')) {
                parent.append(d);
                $(this).append(e).addClass('act');
            } else if (b.hasClass('open')) {
                parent.append(d);
                b.append(e).addClass('act');

            }



            $('body').on('click', '#student_reserve', function(e) {
                console.log(el)
                console.log(a)
                    // // $('body').LoadingOverlay("show"  )
                    // if (el.hasClass("red")){
                    //     el.removeClass('red')
                    // }else{
                    //     el.addClass('red')
                    // }
                    // if (a.hasClass("red")){
                    //     a.removeClass('red')
                    // }else{
                    //     a.addClass('red')
                    // }


                var element = $(this)
                var id = $(this).data('id')
                var class_id = $(this).data('cid')
                var user_id = $('#res_student').data('user')
                var count_id = $('#res_student').data('count')
                var date = $(this).data('date')
                var time = $(this).data('time')
                $('#date_e').text(date)
                $('#time_e').text(time)
                    $([document.documentElement, document.body]).animate({
                        scrollTop: $("#nextstep").offset().top-100
                    }, 1000);
                // document.querySelector('#nextstep2').scrollIntoView({ behavior: 'smooth' })
                // document.querySelector('#nextstep2').scrollIntoView({
                //     behavior: 'smooth'
                // });
                // $("#nextstep").get(0).scrollIntoView()
                $('#nextstep').show(400)



                $('#time_meet').val(class_id)
                $('body').on('click', '#s_reserve', function(e) {
                    // $('body').LoadingOverlay("show"  )
                    window.location.href = '/student/reserve/' + user_id + '/' + count_id + '/' + class_id
                })
                $('body').on('click', '#s_change', function(e) {
                    $('#a_meet').val(class_id)
                    $('#form_ch').submit()
                        // $('body').LoadingOverlay("show"  )
                })
            })

        })


        if ($("#teacher-clander .cond ul").length) {



            if ($("#teacher-clander .cond ul").length) {
                $(document).drag("start", function(ev, dd) {
                        return $('<div class="selectiong" />')
                            .css('opacity', .65)
                            .appendTo(document.body);
                    })
                    .drag(function(ev, dd) {
                        $(dd.proxy).css({
                            top: Math.min(ev.pageY, dd.startY),
                            left: Math.min(ev.pageX, dd.startX),
                            height: Math.abs(ev.pageY - dd.startY),
                            width: Math.abs(ev.pageX - dd.startX)
                        });
                    })
                    .drag("end", function(ev, dd) {
                        $(dd.proxy).remove();
                    });
                $('.hour')
                    .drop("start", function() {
                        $(this).addClass("reservedd");
                    })
                    .drop(function(ev, dd) {
                        if ($(this).hasClass('cancel')) {
                            $(this).addClass("certain");
                            $(this).removeClass("cancel");
                            $(this).find('.op').prop('checked', true)
                            $(this).find('.can').prop('checked', false)
                            console.log('drag_has_cancel')
                        } else if ($(this).hasClass('certain')) {
                            $(this).removeClass("certain");
                            $(this).addClass("cancel");
                            console.log('drag_has_certain')
                            $(this).find('.op').prop('checked', false)
                            $(this).find('.can').prop('checked', true)

                        } else if ($(this).hasClass('reserved')) {} else {
                            $(this).toggleClass("open");
                            if ($(this).find('.op').is(':checked')) {
                                console.log('checked')
                                $(this).find('.can').prop('checked', true)
                                $(this).find('.op').prop('checked', false)
                            } else {
                                $(this).find('.op').prop('checked', true)
                                $(this).find('.can').prop('checked', false)
                                console.log('unchedke')
                            }
                            console.log('drag_has_open')
                        }
                    })
                    .drop("end", function() {
                        $(this).removeClass("reservedd");
                    });
                $.drop({ multi: true });

                $('body').on('click', '#teacher-clander .cond ul li .hour', function() {
                    if ($(this).hasClass('certain')) {
                        $(this).removeClass('certain');
                        $(this).addClass('cancel');
                        $(this).find('.op').prop('checked', false)
                        $(this).find('.can').prop('checked', true)
                    } else if ($(this).hasClass('cancel')) {
                        $(this).removeClass('cancel');
                        $(this).addClass('certain');
                        $(this).find('.op').prop('checked', true)
                        $(this).find('.can').prop('checked', false)
                    } else if ($(this).hasClass('open')) {
                        console.log('a')
                        $(this).removeClass('open');
                        $(this).find('.can').prop('checked', true)
                        $(this).find('.op').prop('checked', false)
                    } else {
                        $(this).addClass('open');
                        $(this).find('.op').prop('checked', true)
                        $(this).find('.can').prop('checked', false)
                        console.log('b')

                    }
                })


            }

        }

        $('.lang-listc .lang-list li').click(function() {
            var a = $(this).find('.top').text();
            var b = $(this).find('.id').text();
            $('.lang-listc input').val(a);
            $('.lang-listc .lang-list').fadeOut();
            $('.lang_id').val(b)

        })

        $('body').on('click', '#start_reserve', function(e) {
            var id = $(this).data('id')
            var class_id = $(this).data('cid')
            $('#time_meet').val(class_id)
            var date = $(this).data('date')
            var time = $(this).data('time')
            $('.s_time').text(date + ' ' + time)
            $('#level1').show(400)
            $('body').css('overflow', 'hidden')

        })

        $(".go_level_1").click(function() {


            $('.popupc').hide(400)
            $("body").removeAttr("style");
            $('body').css('overflow', 'hidden')
            $('#level1').show(400)
        })
        $(".go_level_2").click(function() {
            var val = $('input[name="class_type"]:checked').val();
            if (val == undefined) {
                noty('لطفا یکی از جلسات را انتخاب کنید ')
                return
            }


            console.log(val)
            $('.popupc').hide(400)
            $("body").removeAttr("style");
            $('body').css('overflow', 'hidden')
            var element = $(this)
            var id = $(this).data('id')
            $('#level3').show(400)
        })
        $(".go_level_3").click(function() {

            $('.popupc').hide(400)
            $('body').css('overflow', 'hidden')
            var element = $(this)
            var id = $(this).data('id')
            $('#level3').show(400)
            $("body").removeAttr("style");
            $('body').css('overflow', 'hidden')

        })
        $(".go_level_4").click(function() {
            $('.popupc').hide(400)
            $("body").removeAttr("style");
            $('body').css('overflow', 'hidden')
            var element = $(this)
            var id = $(this).data('id')
            $('#level4').show(400)
        })
        $("#send_pay_for_meet").click(function() {
            console.log('sss')
            // var val = $('input[name="bank"]:checked').val();
            // if (val == undefined) {
            //     noty('لطفا یکی از روش های پرداخت را انتخاب کنید ')
            //     return
            // }
            $('#pay_for_meet').submit()
        })
        $("#send_pay_for_meet2").click(function() {
            console.log('sss')
            var val = $('input[name="bank"]:checked').val();
            if (val == undefined) {
                noty('لطفا یکی از روش های پرداخت را انتخاب کنید ')
                return
            }
            $('#pay_for_meet').submit()
        })
        $(".go_level_5").click(function() {
            $('.popupc').hide(400)
            var element = $(this)
            var id = $(this).data('id')
            $('#level5').show(400)
        })




        $('body').on('click', '.popupc .close', function(e) {
            console.log($(this))
            var parent = $(this).find('.popupc')
            parent.hide(400)
            $("body").removeAttr("style");
        })



        $('body').on('click', '.change_class', function(e) {
            var element = $(this)
            $('body').css('overflow', 'hidden')
            var id = element.data('id')
            var img = element.data('img')
            var date = element.data('date')
            var name = element.data('name')
            $('#can_id').val(id)
            $('.s_name').text(name)
            $('.s_date').text(date)
            $('#change_class_popup').show(400)
            $('body').on('click', '#change_yes', function(e) {
                $('#change_class_popup').hide(200)
                $('#reason_change_class_popup').show(500)

            })
            for (i = 1; i < 5; i++) {
                console.log(i)
            }
            $('body').on('click', '#do_change', function(e) {

                var val = $('#reason').val();
                val = val.trim()
                if (val.length < 10) {
                    noty(' حداقل ده کاراکتر وارد کنید ')
                    return
                }
                $('#meet_change').val(id)
                $('#form_change').submit()

            })
        })
        $('body').on('click', '.cancel_class', function(e) {
            var element = $(this)
            $('body').css('overflow', 'hidden')
            var id = element.data('id')
            var img = element.data('img')
            var date = element.data('date')
            var name = element.data('name')
            $('#can_id').val(id)
            $('.s_name').text(name)
            $('.s_date').text(date)
            $('#s_cancel_class_popup').show(400)
                // $('body').on('click','#s_cancel_yes',function (e) {
                //     $('#cancel_form').submit()
                // })
        })








        $(".fave_teacher").click(function() {
            var ele = $(this)
            var id = ele.data('id')
            $('#' + 'form_save_' + id).submit()
        })
        $("input[type='radio'][name='class_type']").click(function() {
            var value = $(this).val();

            var count = $(this).data('count');
            $('#count_meet').val(count)
            var sum = $(this).data('sum');
            $('#fst').val(sum)
            sum = addCommas(sum)
            $('.sum').text(sum)
        });





        $(document).on('submit', '#free', function(e) {

            $(".em").each(function(index) {
                if ($(this).val() == '') {
                    noty('لطفا  همه موارد را پر کنید ')
                    e.preventDefault();
                    $("body").LoadingOverlay("hide");
                    return false
                }
            });
            if (!$('#name').val()) {
                noty('لطفا یک نام برای کلاس خود انتخاب کنید ')
                e.preventDefault();
                $("body").LoadingOverlay("hide");
                return false
            }


        });















        if ($("#teacher-clander .cond ul").length) {
            var slider = $("#teacher-clander .cond ul").lightSlider({
                item: 7,
                autoWidth: false,
                slideMove: 1, // slidemove will be 1 if loop is true
                slideMargin: 10,

                addClass: '',
                mode: "slide",
                useCSS: true,
                cssEasing: 'ease', //'cubic-bezier(0.25, 0, 0.25, 1)',//
                easing: 'linear', //'for jquery animation',////

                speed: 400, //ms'
                auto: false,
                loop: false,
                slideEndAnimation: true,
                pause: 2000,

                keyPress: false,
                controls: false,
                prevHtml: '',
                nextHtml: '',

                rtl: true,
                adaptiveHeight: false,

                vertical: false,
                verticalHeight: 500,
                vThumbWidth: 100,

                thumbItem: 10,
                pager: false,
                gallery: false,
                galleryMargin: 5,
                thumbMargin: 5,
                currentPagerPosition: 'middle',

                enableTouch: false,
                enableDrag: false,
                freeMove: true,
                swipeThreshold: 40,

                responsive: [{
                        breakpoint: 1200,
                        settings: {
                            item: 4,

                        }
                    },
                    {
                        breakpoint: 800,
                        settings: {
                            item: 3,

                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            item: 2,

                        }
                    }
                ],

                onBeforeStart: function(el) {},
                onSliderLoad: function(el) {},
                onBeforeSlide: function(el) {},
                onAfterSlide: function(el) {},
                onBeforeNextSlide: function(el) {},
                onBeforePrevSlide: function(el) {}
            });


            $('#goToPrevSlide').on('click', function() {
                slider.goToPrevSlide();
            });
            $('#goToNextSlide').on('click', function() {
                slider.goToNextSlide();
            });

        }



        if ($("#sideteachernav").length) {
            $('#teacherpish, #sideteachernav').theiaStickySidebar({
                // Settings
                additionalMarginTop: 30
            });
        }



    })












})(jQuery);
