(function($) {
    "use strict";
    var windowOn = $(window);
    $(document).ready( function() {
        windowOn.on('load', function () {
            wowAnimation();
        });
        
        //>> Mobile Menu Js Start <<//
        $('#mobile-menu').meanmenu({
            meanMenuContainer: '.mobile-menu',
            meanScreenWidth: "1199",
            meanExpand: ['<i class="far fa-plus"></i>'],
        });
        
        //>> Sidebar Toggle Js Start <<//
        $(".offcanvas__close,.offcanvas__overlay").on("click", function() {
            $(".offcanvas__info").removeClass("info-open");
            $(".offcanvas__overlay").removeClass("overlay-open");
        });
        $(".sidebar__toggle").on("click", function() {
            $(".offcanvas__info").addClass("info-open");
            $(".offcanvas__overlay").addClass("overlay-open");
        });

        //>> Body Overlay Js Start <<//
        $(".body-overlay").on("click", function() {
            $(".offcanvas__area").removeClass("offcanvas-opened");
            $(".df-search-area").removeClass("opened");;
            $(".body-overlay").removeClass("opened");
        });

       //>> Sticky Menu <<//
        windowOn.on('scroll', function () {
            var scroll = windowOn.scrollTop();
            if (scroll < 300) {
            $("#header-sticky").removeClass("sticky");
            } else {
            $("#header-sticky").addClass("sticky");
            }
        });

          //>> offcanvas bar <<//
        $(".tp-offcanvas-toogle").on('click', function(){
            $(".tp-offcanvas").addClass("tp-offcanvas-open");
            $(".tp-offcanvas-overlay").addClass("tp-offcanvas-overlay-open");
        });
        $(".tp-offcanvas-close-toggle,.tp-offcanvas-overlay").on('click', function(){
            $(".tp-offcanvas").removeClass("tp-offcanvas-open");
            $(".tp-offcanvas-overlay").removeClass("tp-offcanvas-overlay-open");
        });

         //>> Search Bar <<//
        $(".tp-search-toggle").on('click', function(){
            $(".tp-header-search-bar").addClass("tp-search-open");
            $(".tp-offcanvas-overlay").addClass("tp-offcanvas-overlay-open");
        });

        $(".tp-search-close,.tp-offcanvas-overlay").on('click', function(){
            $(".tp-header-search-bar").removeClass("tp-search-open");
            $(".tp-offcanvas-overlay").removeClass("tp-offcanvas-overlay-open");
        });

        //>> Video Popup Start <<//
        $(".img-popup").magnificPopup({
            type: "image",
            gallery: {
                enabled: true,
            },
        });

        $('.video-popup').magnificPopup({
            type: 'iframe',
            mainClass: 'mfp-fade', // fade + zoom effect
            removalDelay: 300,     // wait for animation
            preloader: true,
            fixedContentPos: false
        });




        
        //>> Wow Animation Js <<//
        function wowAnimation() {
            var wow = new WOW({
                boxClass: 'wow',
                animateClass: 'animated',
                offset: 0,
                mobile: true,
                live: true
            });
            wow.init();
        }

        //>> Data Background<<//
        // data bg img 
        $("[data-background]").each(function () {
            $(this).css("background-image", "url(" + $(this).attr("data-background") + ")")
        })

        // data bg color
        $("[data-bg-color]").each(function () {
            $(this).css("background-color", $(this).attr("data-bg-color"))
        })

        // data bg color
        $("[data-color]").each(function () {
            $(this).css("color", $(this).attr("data-color"))
        })

        //>> hero sllider  <<//
        var swiper = new Swiper(".hero-thumb-active", {
            spaceBetween: 10,
            slidesPerView: 3,
            freeMode: true,
            watchSlidesProgress: true,
        });

        var swiper2 = new Swiper(".hero-slider-active", {
            spaceBetween: 0,
            effect: "fade",
            autoplay: true,
            speed: 2000,
            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
            },
            thumbs: {
              swiper: swiper,
            },
        });
        

        //>> brand Slider  <<//
        var swiper = new Swiper(".brand-slider-active", {
            spaceBetween: 30,
            speed: 2000,
            loop: true,
            autoplay: {
                delay: 1000,
                disableOnInteraction: false,
            },
            keyboard: {
                enabled: true,
            },
            breakpoints: {
                1199: {
                    slidesPerView: 5,
                },
                991: {
                    slidesPerView: 4,
                },
                767: {
                    slidesPerView: 3,
                },
                575: {
                    slidesPerView: 2,
                },
                375: {
                    slidesPerView: 2,
                },
                0: {
                    slidesPerView: 1,
                },
            },
        }); 

       //>> testimonial Slider <<//
       if($(".testimonial-active").length > 0) {
        var swiper = new Swiper(".testimonial-active", {
            slidesPerView: 1,
            spaceBetween: 50,
            speed: 2000,
            loop: true,
            keyboard: {
                enabled: true,
            },
            autoplay: {
                delay: 1500,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: ".testimonial-swiper-button-next",
                prevEl: ".testimonial-swiper-button-prev",
            },
            breakpoints: {
                1199: {
                    slidesPerView: 1,
                },
                991: {
                    slidesPerView: 1,
                },
                767: {
                    slidesPerView: 1,
                },
                575: {
                    slidesPerView: 1,
                },
                0: {
                    slidesPerView: 1,
                },
            },
            }); 
        }

        //>> Back To Top  <<//
        windowOn.on('scroll',function () {
            if ($(this).scrollTop() > 20) {
                $("#back-top").addClass("show");
            } else {
                $("#back-top").removeClass("show");
            }
        });
        $("#back-top").on("click",function () {
            $("html, body").animate({ scrollTop: 0 }, 800);
            return false;
        });

        //>> Search Popup <<//
        const $searchWrap = $(".search-wrap");
        const $navSearch = $(".nav-search");
        const $searchClose = $("#search-close");

        $(".search-trigger").on("click", function (e) {
            e.preventDefault();
            $searchWrap.animate({ opacity: "toggle" }, 500);
            $navSearch.add($searchClose).addClass("open");
        });

        $(".search-close").on("click", function (e) {
            e.preventDefault();
            $searchWrap.animate({ opacity: "toggle" }, 500);
            $navSearch.add($searchClose).removeClass("open");
        });

        function closeSearch() {
            $searchWrap.fadeOut(200);
            $navSearch.add($searchClose).removeClass("open");
        }

        $(document.body).on("click", function (e) {
            closeSearch();
        });

        $(".search-trigger, .main-search-input").on("click", function (e) {
            e.stopPropagation();
        });
        
        //>> odomitter Counter <<//
        $('.counter-item').waypoint(
            function () {
                var odo = $(".counter-item .odometer");
                odo.each(function () {
                    var countNumber = $(this).attr("data-count");
                    $(this).html(countNumber);
                });
            }, {
                offset: "80%",
                triggerOnce: true
            }
        );
        
        //>> Hover Active <<//
        var hoverClasses = $(".active-hover");
        hoverClasses.on("mouseenter", function() {
                $(hoverClasses).removeClass("active");
                $(this).addClass("active");
            }
        );

        //>> Mouse Cursor <<//
        function mousecursor() {
            if ($("body")) {
                const e = document.querySelector(".cursor-inner"),
                    t = document.querySelector(".cursor-outer");
                let n,
                    i = 0,
                    o = !1;
                (window.onmousemove = function(s) {
                    o ||
                        (t.style.transform =
                            "translate(" + s.clientX + "px, " + s.clientY + "px)"),
                        (e.style.transform =
                            "translate(" + s.clientX + "px, " + s.clientY + "px)"),
                        (n = s.clientY),
                        (i = s.clientX);
                }),
                $("body").on("mouseenter", "a, .cursor-pointer", function() {
                        e.classList.add("cursor-hover"), t.classList.add("cursor-hover");
                    }),
                    $("body").on("mouseleave", "a, .cursor-pointer", function() {
                        ($(this).is("a") && $(this).closest(".cursor-pointer").length) ||
                        (e.classList.remove("cursor-hover"),
                            t.classList.remove("cursor-hover"));
                    }),
                    (e.style.visibility = "visible"),
                    (t.style.visibility = "visible");
            }
        }
        $(function() {
            mousecursor();
        });

    }); // End Document Ready Function

    function loader() {
        $(window).on("load", function() {
            // Animate loader off screen
            $(".preloader").addClass('loaded');                    
            $(".preloader").delay(600).fadeOut();                       
        });
    }

    loader();
})(jQuery); // End jQuery

