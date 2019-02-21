 jQuery(function($) {

    // header fade
    $(function () {
        var header = $('#header-main, #header-scrolling');
        setTimeout(function () {
            header.addClass('show');
        }, 800);
    });

    $(document).ready(function() {
        // for placeholder link
        function prevent(){
            $('.prevent, .btn-modal, a[href="#"]').on('click touch', function(event){
                event.preventDefault();
            });
        }

        // for empty link
        prevent();

        // for burger menu
        function burgerMenu() {
            $('.mobile-menu-toggle').toggleClass('active');
            $('.mobile-menu-wrap').toggleClass('showing');
            // $('#header-main').toggleClass('white-bg');
            $('body').toggleClass('overflow');
        }
        $('.mobile-menu-toggle, .mobile-menu-overlay').on('click', function () {
            burgerMenu();
        });
        $(window).on('resize', function () {
            var windowWidth = $(window).width();
            if (windowWidth > 1024 && $('.mobile-menu-toggle').hasClass('active')) {
                burgerMenu();
            }
        });

        //for body height
        $(function () {
            $(window).on('load resize', function () {
                setTimeout(function () {
                    var body = $('body'),
                        wrapper = $('.wrapper'),
                        windowHeight = wrapper.height();

                        if (windowHeight > 2500) {
                            if (!(body.hasClass('.percentage-position'))) {
                                body.addClass('percentage-position');
                            }
                        } else {
                            if (body.hasClass('.percentage-position')) {
                                body.removeClass('percentage-position');
                            }
                        }

                }, 100);
            });
        });



        //for smooth-scroll
        if (typeof SmoothScroll !== 'undefined') {
            var scroll = new SmoothScroll('a[href*="#"]', {

                // Selectors
                ignore: 'a[href="#"]',
                header: null,
                topOnEmptyHash: false,

                // Speed & Duration
                speed: 500,
                speedAsDuration: false,
                durationMax: null,
                durationMin: null,
                clip: true,
                offset: function (anchor, toggle) {

                    // var myOffset = 15,
                    //     currentPos =  $(window).scrollTop(),
                    //     headerHeight = $('#header-scrolling').outerHeight() + myOffset,
                    //     anchorNavHeight = $('.anchor-nav-box').outerHeight() + myOffset;
                    //
                    // if (currentPos > anchor.offsetTop) {
                    //     //up
                    //     return anchorNavHeight + headerHeight;
                    // } else {
                    //     //down
                    //     return anchorNavHeight;
                    // }

                },

                // Easing
                easing: 'easeInOutCubic',

                // History
                updateURL: false,
                popstate: true,

                // Custom Events
                emitEvents: true

            });
        }



        function scrollEffects() {
            var $window = $(window),
                html = $('html'),
                body = $('body'),
                header = $('#header-main'),
                delayHeight = 100,
                lastScrollTop = 0;

            $window.on('load resize', function () {
                var currentPos = $window.scrollTop();

                body.removeClass('direction-up direction-down');
                header.removeClass('fixed');

                setTimeout(function () {
                    var windowWidth = $window.width(),
                        headerOffset = header.offset().top,
                        headerHeight = header.outerHeight();
                        // anchorNavHeight = anchorNav.outerHeight();

                    // if (anchorNav.length) {
                    //     if (anchorNav.hasClass('.details')) {
                    //         var anchorNavOffset = anchorNav.offset().top - 40;
                    //     } else {
                    //         var anchorNavOffset = anchorNav.offset().top;
                    //     }
                    // }

                    // if (currentPos > anchorNavOffset) {
                    //     setTimeout(function () {
                    //         if (!(anchorNav.hasClass('affix'))) {
                    //             anchorNav.addClass('affix');
                    //             anchorNav.next().css('margin-top', anchorNavHeight);
                    //         }
                    //     }, 500);
                    // }

                    if (windowWidth < 1025) {
                        // for mobile & tablet
                        var headerTrigger = headerOffset + headerHeight;

                        $window.unbind('scroll');
                        $window.on('scroll', function () {
                            var top = $window.scrollTop();

                            if (lastScrollTop > top) {
                                // scroll UP
                                if (top == 0 && top < 2 * headerTrigger) {
                                    if (body.hasClass('direction-up')) {
                                        body.removeClass('direction-up');
                                        header.removeClass('fixed');
                                    }
                                } else if (top != 0 && top < headerTrigger + delayHeight) {
                                    if (body.hasClass('direction-up')) {
                                        body.removeClass('direction-up');
                                        header.removeClass('fixed');
                                    }
                                } else if (top != 0 && top > 2 * headerTrigger) {
                                    if (!(body.hasClass('direction-up'))) {
                                        body.removeClass('direction-down').addClass('direction-up');
                                    }
                                }

                                //for anchor nav
                                // if (anchorNav.length) {
                                //     var anchorNavTrigger = anchorNavOffset - 65;
                                //
                                //     if (top < anchorNavTrigger) {
                                //         if (anchorNav.hasClass('affix')) {
                                //             anchorNav.removeClass('affix');
                                //             anchorNav.next().css('margin-top', '0');
                                //         }
                                //     }
                                // }
                            } else {
                                // scroll DOWN
                                if (top > 2 * headerTrigger) {
                                    if (!(body.hasClass('direction-down'))) {
                                        body.removeClass('direction-up').addClass('direction-down');
                                    }
                                }

                                //for anchor nav
                                // if (anchorNav.length) {
                                //     var anchorNavTrigger = anchorNavOffset;
                                //
                                //     if (top > anchorNavTrigger) {
                                //         if (!(anchorNav.hasClass('affix'))) {
                                //             anchorNav.addClass('affix');
                                //             anchorNav.next().css('margin-top', anchorNavHeight);
                                //         }
                                //     }
                                // }
                            }



                            lastScrollTop = top;
                        });
                    } else {
                        //for desktop
                        var headerTrigger = headerOffset + headerHeight;

                        $window.unbind('scroll');
                        $window.on('scroll', function () {
                            var top = $window.scrollTop();

                            if (lastScrollTop > top) {
                                // scroll UP
                                //for main nav
                                if (top == 0 && top < 2 * headerTrigger) {
                                    if (body.hasClass('direction-up')) {
                                        body.removeClass('direction-up');
                                        header.removeClass('fixed');
                                    }
                                } else if (top != 0 && top < headerTrigger + delayHeight) {
                                    if (body.hasClass('direction-up')) {
                                        body.removeClass('direction-up');
                                        header.removeClass('fixed');
                                    }
                                } else if (top != 0 && top > 2 * headerTrigger) {
                                    if (!(body.hasClass('direction-up'))) {
                                        body.removeClass('direction-down').addClass('direction-up');
                                    }
                                }

                                //for anchor nav
                                // if (anchorNav.length) {
                                //     var anchorNavTrigger = anchorNavOffset;
                                //
                                //     if (top < anchorNavTrigger) {
                                //         if (anchorNav.hasClass('affix')) {
                                //             anchorNav.removeClass('affix');
                                //             anchorNav.next().css('margin-top', '0');
                                //         }
                                //     }
                                // }
                            } else {
                                // scroll DOWN
                                //for main nav
                                if (top > 2 * headerTrigger) {
                                    if (!(body.hasClass('direction-down'))) {
                                        body.removeClass('direction-up').addClass('direction-down');
                                    }
                                }

                                //for anchor nav
                                // if (anchorNav.length) {
                                //     var anchorNavTrigger = anchorNavOffset;
                                //
                                //     if (top > anchorNavTrigger) {
                                //         if (!(anchorNav.hasClass('affix'))) {
                                //             anchorNav.addClass('affix');
                                //             anchorNav.next().css('margin-top', anchorNavHeight);
                                //         }
                                //     }
                                // }
                            }

                            lastScrollTop = top;
                        });
                    }
                }, 50);
            });
        }

        scrollEffects();

        //for popup
        if (typeof $.fn.magnificPopup !== 'undefined') {
            if ($('.constant-popup-form').length) {
                $('.constant-popup-form').magnificPopup({
                    type: 'inline',
                    mainClass: 'mfp-fade',
                    removalDelay: 350,
                    preloader: false,
                    fixedContentPos: true,
                    fixedBgPos: true,
                    callbacks: {
                        beforeClose: function () {
                            if ($('.subscribe-form').length) {
                                var form = $('.subscribe-form');

                                form.each(function () {
                                    $(this).find('input[type="email"]').val('');
                                });
                            }
                        }
                    }
                });
            }
        }

        //for subscribe form
        $(function () {


            // var count = 0;
            // function checkForm() {
            //     if ($('#ctct_form_0').length) {
            //         var form = $('#ctct_form_0'),
            //             inputEmail = $('input#email_address_0'),
            //             inputList = $('input#email_list_1_0');
            //
            //         if ( count == 30 ) {
            //             stopInterval();
            //         }
            //
            //         if (inputList.prop('checked') == true) {
            //             console.log('ok');
            //             inputEmail.attr('placeholder', 'Join our mailing list');
            //             stopInterval();
            //             submitForm();
            //         } else {
            //             console.log('uncheck');
            //             inputList.prop('checked', true);
            //         }
            //     }
            // }
            //
            // var checker = setInterval(checkForm, 500);
            // // var checkStatus = setInterval(checkStatusForm, 500);
            //
            //
            // function stopInterval() {
            //     clearInterval(checker);
            //     console.log('stop');
            // }

            // function stopStatusInterval() {
            //     clearInterval(checkStatus);
            //     console.log('stop');
            // }

            //for my form
            // function submitForm() {
                if ($('.subscribe-form').length) {
                    $('.subscribe-form').on('submit',function (e) {
                        e.preventDefault();

                        var form         =  $(this),
                            // parentBox    = form.parents('.subscribe-form-box'),
                            // btn          = form.find('.btn'),
                            popupBtn     = form.find('.constant-popup-form'),
                            emailVal     = form.find('input[type="email"]').val();


                        var constantForm       = $('#ctct_form_0'),
                            constantEmailField = constantForm.find('input[type="email"]');
                        //     constantSuccessBox = $('#success_message_0');
                        //
                        //     form.fadeOut(0);
                            constantEmailField.val(emailVal);
                            setTimeout(function () {
                                popupBtn.click();
                                // ajaxIcon.css('visibility','visible');
                                // console.log(emailVal);
                                //
                                // constantEmailField.val(emailVal);
                                // constantForm.submit();

                            },100);

                        // console.log('prevent');
                    });

                    $('.subscribe-form input[type="email"]').on('click change',function (e) {
                        // e.preventDefault();

                        var form         =  $(this).parents('.subscribe-form'),
                            // parentBox    = form.parents('.subscribe-form-box'),
                            // btn          = form.find('.btn'),
                            popupBtn     = form.find('.constant-popup-form'),
                            emailVal     = form.find('input[type="email"]').val();


                        var constantForm       = $('#ctct_form_0'),
                            constantEmailField = constantForm.find('input[type="email"]');
                        //     constantSuccessBox = $('#success_message_0');
                        //
                        //     form.fadeOut(0);
                        constantEmailField.val(emailVal);
                        setTimeout(function () {
                            popupBtn.click();
                            // ajaxIcon.css('visibility','visible');
                            // console.log(emailVal);
                            //
                            // constantEmailField.val(emailVal);
                            // constantForm.submit();

                        },100);

                       //console.log('click');
                    });
                }
            // }

            // var countStatus = 0;
            // function checkStatusForm() {
            //     var constantForm       = $('#ctct_form_0'),
            //         constantSuccessBox = $('#success_message_0');
            //
            //    //console.log(countStatus);
            //     if (constantSuccessBox.css('display') == 'none') {
            //         countStatus++;
            //     } else {
            //         stopStatusInterval();
            //        //console.log('stop status');
            //     }
            // }
            // submitForm();
        });
    });

});


