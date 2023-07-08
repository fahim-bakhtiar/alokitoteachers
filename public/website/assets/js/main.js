(function ($) {
    'use strict';

    $(document).ready(function () {

        /*========================================
        Mobile menu
        ========================================*/
        $(document).on('click', '.nav-close', function (e) {
            $(".header").removeClass("nav-open");
            var dropDown = $('.mobile-menu-dropdown');
            if (dropDown.hasClass('show')) {
                dropDown.removeClass('show');
            }
        });

        $('.mobile-menu-list li a').on('click', function (e) {
            var element = $(this).parent('li');
            if (element.hasClass('open')) {
                element.removeClass('open');
                element.find('li').removeClass('open');
                element.find('ul').slideUp(500, "swing");
            } else {
                element.addClass('open');
                element.children('ul').slideDown(500, "swing");
                element.siblings('li').children('ul').slideUp(500, "swing");
                element.siblings('li').removeClass('open');
                element.siblings('li').find('li').removeClass('open');
                element.siblings('li').find('ul').slideUp(500, "swing");
            }
        });


        $(document).on('click', '.menu-icon', function (e) {
            $(".header").addClass('nav-open');
        });

        $(document).on('click', '.has-dropdown>a', function (event) {
            event.preventDefault();
            $(this).next('.mobile-menu-dropdown').addClass('show');
        });

        $('.partner-slider').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            arrows: false,
            dots: true,
            responsive: [
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    }
                }
            ]
        });

        $('.partner-slider-2').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            arrows: false,
            dots: true,
            responsive: [
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    }
                }
            ]
        });

        $('.testimonial-slider').slick({
            slidesToShow: 2,
            slidesToScroll: 1,
            autoplay: true,
            centerMode: true,
            autoplaySpeed: 2000,
            arrows: false,
            dots: true,
            responsive: [
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        centerMode: false,
                    }
                }
            ]
        });

        const deBounce = (fn, delay) => {
            let timer;
            return function () {
                let context = this,
                    args = arguments;
                clearTimeout(timer);
                timer = setTimeout(() => {
                    fn.apply(context, args);
                }, delay);
            };
        }

        /*
        * Course Search
        * */
        $(document).on('change keyup', 'input[name=course-search]', deBounce(function (e) {
            let searchWrap = $(this).closest('.course-search-input');
            var value = $(this).val();
            if (value.length > 0) {
                $('.course-search-result').show();
                searchWrap.addClass('active');
                searchWrap.find('.ri-close-line').remove();
                searchWrap.append('<i class="ri-close-line"></i>');
            } else {
                $('.course-search-result').hide();
                searchWrap.removeClass('active');
                searchWrap.find('.ri-close-line').remove();
            }
        }, 300));

        $(document).on('click', '.course-search-input .ri-close-line', function (e) {
            $(this).closest('.course-search-input').removeClass('active');
            $(this).closest('.course-search-input').find('input[name=course-search]').val('');
            $(this).remove();
        })


        /*
        * Video Player
        * */
        const player = new Plyr("#course-player", {
            controls: [
                "play-large",
                "restart",
                "rewind",
                "play",
                "fast-forward",
                "progress",
                "current-time",
                "duration",
                "mute",
                "volume",
                "captions",
                "settings",
                "pip",
                "airplay",
                "fullscreen",
            ],
        });

        /*
        * Login Form
        * */
        $(document).on('change keyup', '.login-form', function (e) {
            let form = $(this);
            let username = form.find('input[name=username]').val();
            let password = form.find('input[name=password]').val();
            if (username !== '' && password !== '') {
                form.find('button[type=submit]').removeAttr('disabled');
            } else {
                form.find('button[type=submit]').attr('disabled', 'disabled');
            }
        });


        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
                    $('#imagePreview').hide();
                    $('#imagePreview').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $(document).on('change', '#imageUpload', function () {
            readURL(this);
        });

        $(document).on('click', '.remove-image', function (e) {
            e.preventDefault();
            $('#imageUpload').val('');
            $('#imagePreview').css('background-image', 'none');
        });

        $(document).on('click', 'input[name=accountType]', function (e) {
            let value = $(this).val();
            if (value === 'school') {
                $('#instituteType').show();
            } else {
                $('#instituteType').hide();
            }
        });

        if($("#signup-form").length > 0 ) {
            var formValidate = $("#signup-form").validate({
                rules: {
                    accountType: {
                        required: true
                    },
                    instituteType: {
                        required: false
                    },
                    name: {
                        required: true
                    },
                    username: {
                        required: true
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    phone: {
                        required: true
                    },
                    password: {
                        required: true
                    }
                },
                errorElement: "span",
                errorClass: "error",
                errorPlacement: function (error, element) {
                    error.insertAfter(element);
                }
            });

            $(document).on('change', '#signup-form', function (e) {
                let tabContent = $(this).find('.tab-content');
                let activeStep = tabContent.data('active-step')
                if (formValidate.form()) {
                    //active step button attr remove
                    $('#' + activeStep).find('.btn-default').removeAttr('disabled');
                } else {
                    //active step button attr add
                    $('#' + activeStep).find('.btn-default').attr('disabled', 'disabled');
                }
            });

            $(document).on('click', '.next-btn1', function () {
                if (formValidate.form()) {
                    $(".tab-pane").hide();
                    $("#step2").fadeIn(1000);
                    $('.progressbar-dots:nth-child(2)').addClass('active');
                    $('#signup-form .tab-content').data('active-step', 'step2');
                } else {
                    $('#signup-form .btn-default').attr('disabled', 'disabled');
                }
            });
            $(document).on('click', '.next-btn2', function () {
                if (formValidate.form()) {
                    $(".tab-pane").hide();
                    $("#step3").fadeIn(1000);
                    $('.progressbar-dots:nth-child(3)').addClass('active');
                    $('#signup-form .tab-content').data('active-step', 'step3');
                } else {
                    $('#signup-form .btn-default').attr('disabled', 'disabled');
                }
            });

            // $(".submit-btn").click(function () {
            //     if (formValidate.form()) {
            //         $("#success").fadeIn(1000);
            //         return false;
            //     }
            // });
        }
        if($(".need-assessment-form").length > 0) {
            var assessmentValidate = $(".need-assessment-form").validate({
                rules: {
                    na_q1: {
                        required: true
                    },
                    na_q2: {
                        required: true
                    },
                    na_q3: {
                        required: true
                    },
                    na_q4: {
                        required: true
                    },
                    na_q5: {
                        required: true
                    },
                    na_q6: {
                        required: true
                    },
                    na_q7: {
                        required: true
                    },
                    na_q8: {
                        required: true
                    },
                    na_q9: {
                        required: true
                    },
                    na_q10: {
                        required: true
                    }
                },
                errorElement: "span",
                errorClass: "error",
                errorPlacement: function (error, element) {
                    error.insertAfter(element);
                }
            });

            $(document).on('change', '.need-assessment-form', function (e) {
                if (assessmentValidate.form()) {
                    $(".tab-pane").hide();
                    $("#step3").fadeIn(1000);
                    $('.progressbar-dots:nth-child(2)').addClass('active');
                    $('.progressbar-dots:nth-child(3)').addClass('active');
                    $(this).find('.btn-default').removeAttr('disabled');
                }
            });
        }

        $("#user_class").length > 0 ? $('#user_class').selectpicker() : '';
        $("#school_district").length > 0 ? $('#school_district').selectpicker() : '';
        $("#teacher_district").length > 0 ? $('#teacher_district').selectpicker() : '';
        $("#user_sub").length > 0 ? $('#user_sub').selectpicker() : '';

        
    });
})(jQuery);
