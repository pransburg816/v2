(function($) {
    $(document).ready(function() {
        /* Read more & Read less toggle */
        function toggleReadMoreLess() {
            $('.read-more-link').on('click', function() {
                const parentSection = $(this).closest('.highlight-text');
                parentSection.find('.truncated-content').removeClass('truncated-content').addClass('expanded-content');
                $(this).addClass('d-none');
                parentSection.find('.read-less-link').removeClass('d-none').addClass('active');
            });
            $('.read-less-link').on('click', function() {
                const parentSection = $(this).closest('.highlight-text');
                parentSection.find('.expanded-content').removeClass('expanded-content').addClass('truncated-content');
                $(this).addClass('d-none').removeClass('active');
                parentSection.find('.read-more-link').removeClass('d-none');
            });
        }
        toggleReadMoreLess();

        /* Arrow Navigation */
        function handleArrowNavigation() {
            var $navLinks = $(".main-menu.list-unstyled a:not(:contains('Contact Me'))"); // Select all links excluding "Contact Me"
            function goToLink(index) {
                if ($navLinks[index]) {
                    window.location.href = $navLinks[index].href;
                }
            }
            $("#desktopLeftArrow, #mobileLeftArrow").click(function() {
                var currentUrl = window.location.href;
                var currentIndex = $navLinks.index($navLinks.filter(function() {
                    return this.href === currentUrl;
                }));
                goToLink(currentIndex - 1);
            });
            $("#desktopRightArrow, #mobileRightArrow").click(function() {
                var currentUrl = window.location.href;
                var currentIndex = $navLinks.index($navLinks.filter(function() {
                    return this.href === currentUrl;
                }));
                goToLink(currentIndex + 1);
            });
        }
        handleArrowNavigation();
    });

    /* Stars and Lines Configuration */
    function handleStarsAndLines() {
        var starsConfig = [{
            top: 30,
            left: 35,
            size: 2
        }];

        function createStar(top, left, size) {
            $('<div></div>')
                .addClass('star')
                .css({
                    top: top + '%',
                    left: left + '%',
                    width: size + 'px',
                    height: size + 'px'
                })
                .appendTo('.star-container');
        }
        $.each(starsConfig, function(index, config) {
            createStar(config.top, config.left, config.size);
        });
        // Create additional random stars
        for (var i = 0; i < 5; i++) { // Adjust the number of stars as desired
            var randomTop = Math.random() * 100;
            var randomLeft = Math.random() * 100;
            var randomSize = Math.random() * 5; // Adjust the size range as desired
            createStar(randomTop, randomLeft, randomSize);
        }
    }
    $(document).ready(handleStarsAndLines);

    /* Navbar Active Link on Scroll */
    function handleNavbarScroll() {
        $(window).on('scroll', function() {
            $('.section').each(function(index) {
                var section = $(this);
                var navLink = $('.nav-link').eq(index);
                var rect = section[0].getBoundingClientRect();
                if (rect.top <= 0 && rect.bottom > 0) {
                    navLink.addClass('active');
                } else {
                    navLink.removeClass('active');
                }
            });
        });
    }
    $(document).ready(handleNavbarScroll);

    $(document).ready(function() {
        $('#showFormLinkMobile').on('click', function(event) {
            event.preventDefault();
            var emailForm = $('#emailForm');
            emailForm.toggleClass('d-none'); // Show or hide the form
            if (!emailForm.hasClass('d-none')) {
                $('html, body').animate({
                    scrollTop: emailForm.offset().top
                }, 'smooth'); // Scroll to the form
            }
        });
    });

    // Slide out Accessiblity Panel
    $(document).ready(function() {
        $('#menuButton, #menuButtonContact').click(function() {
            var slideOutMenu = $('#slideOutMenu');
            var isActive = $(this).hasClass('active');

            // Close the menu if it's already open
            if (isActive) {
                closeSlideOutMenu();
                $(this).removeClass('active');
            }
            // Open the menu
            else {
                // Close any other open menus first
                $('#menuButton, #menuButtonContact').removeClass('active');
                closeSlideOutMenu();

                // Open the clicked menu
                slideOutMenu.animate({
                    left: '0'
                }, 500);

                $(this).addClass('active');
            }
        });

        $('#closeButton').click(function() {
            $('#menuButton, #menuButtonContact').removeClass('active');
            closeSlideOutMenu();
        });

        $(document).mouseup(function(e) {
            var menu = $('#slideOutMenu');
            if (!menu.is(e.target) && menu.has(e.target).length === 0) {
                $('#menuButton, #menuButtonContact').removeClass('active');
                closeSlideOutMenu();
            }
        });
    });

    function closeSlideOutMenu() {
        var menu = $('#slideOutMenu');
        menu.animate({
            left: '-100%'
        }, 500);
    }


    $(document).ready(function() {
        $('#menuButton2').click(function() {
            // Opens the menu by sliding it in
            $('#slideOutMenu2').animate({
                left: '0'
            }, 500);
        });

        $('#closeButton2').click(function() {
            // Closes the menu by sliding it out
            $('#slideOutMenu2').animate({
                left: '-100%'
            }, 500);
        });

        // Close the menu if clicked outside of it
        $(document).mouseup(function(e) {
            var menu = $('#slideOutMenu2');
            if (!menu.is(e.target) && menu.has(e.target).length === 0) {
                menu.animate({
                    left: '-100%'
                }, 500);
            }
        });
    });


    $(document).ready(function() {
        $('#menuButtonContact').click(function() {
            $('#slideOutMenuContact').animate({
                left: '0'
            }, 500);
        });

        // Close menu when the close button is clicked
        $('.close-menu').click(function() {
            closeMenu();
        });

        // Close menu when clicking outside of the menu
        $(document).mouseup(function(e) {
            var menu = $('#slideOutMenuContact');
            if (!menu.is(e.target) && menu.has(e.target).length === 0 && !$(e.target).is('input, select, textarea, button, label')) {
                closeMenu();
            }
        });

        function closeMenu() {
            var windowWidth = window.innerWidth || $(window).width();
            if (windowWidth < 992) {
                $('#slideOutMenuContact').animate({
                    left: '-100%'
                }, 500);
            } else {
                $('#slideOutMenuContact').animate({
                    left: '-32.6%'
                }, 500);
            }
        }
    });

    // Show Links Highlighted
    $('#highlightLinks').click(function() {
        var $svg = $(this).find('.bi');
        var $path = $svg.find('path');
        var $highlightDiv = $(this);
        var isHighlighted = $svg.hasClass('bi-toggle-on');

        if (isHighlighted) {
            $path.attr('d', 'M11 4a4 4 0 0 1 0 8H8a4.992 4.992 0 0 0 2-4 4.992 4.992 0 0 0-2-4h3zm-6 8a4 4 0 1 1 0-8 4 4 0 0 1 0 8zM0 8a5 5 0 0 0 5 5h6a5 5 0 0 0 0-10H5a5 5 0 0 0-5 5z');
            $svg.removeClass('bi-toggle-on').addClass('bi-toggle-off');
            $highlightDiv.css({
                'background-color': '',
                'color': '',
                'transition': '',
                'border-radius': '',
                'outline': '',
                'padding': ''
            });
            $('a').css('border', '');
            localStorage.setItem('highlightLinks', 'off');
        } else {
            $path.attr('d', 'M5 3a5 5 0 0 0 0 10h6a5 5 0 0 0 0-10H5zm6 9a4 4 0 1 1 0-8 4 4 0 0 1 0 8H5z');
            $svg.removeClass('bi-toggle-off').addClass('bi-toggle-on');
            $highlightDiv.css({
                'background-color': 'rgba(8, 47, 73, 0.6)',
                'color': '#fff',
                'transition': '0.6s',
                'border-radius': '5px',
                'padding': '10px'
            });
            $('a').css('border', '2px solid yellow');
            localStorage.setItem('highlightLinks', 'on');
        }
    });

    // Check localStorage and set initial state
    $(document).ready(function() {
        if (localStorage.getItem('highlightLinks') === 'on') {
            $('#highlightLinks').click();
        }

        if (localStorage.getItem('highlightText') === 'on') {
            $('#highlightText').click();
        }
    });

    // Highlight - Bold Text
    $('#highlightText').on('click', function() {
        var $svg = $(this).find('.bi');
        var $path = $svg.find('path');
        var $highlightDiv = $(this);
        var isHighlighted = $svg.hasClass('bi-toggle-on');
        var $radialGradient = $('.radial-gradient');

        if (isHighlighted) {
            $path.attr('d', 'M11 4a4 4 0 0 1 0 8H8a4.992 4.992 0 0 0 2-4 4.992 4.992 0 0 0-2-4h3zm-6 8a4 4 0 1 1 0-8 4 4 0 0 1 0 8zM0 8a5 5 0 0 0 5 5h6a5 5 0 0 0 0-10H5a5 5 0 0 0-5 5z');
            $svg.removeClass('bi-toggle-on').addClass('bi-toggle-off');
            $highlightDiv.css({
                backgroundColor: '',
                color: '',
                transition: '',
                borderRadius: '',
                outline: '',
                padding: ''
            });
            $('.container-left *, .main-menu *, blog *, .list-unstyled *, .mt-3 *, .container-fluid *, .hero-message *, .entry-content *').each(function() {
                var $element = $(this);
                if (!$element.attr('id') && !$element.hasClass('font-adjuster') && !$element.hasClass('container-fluid') && !$element.hasClass('line-height-adjuster') && !$element.hasClass('letter-spacing-adjuster') && !$element.hasClass('brightnessText')) {
                    $element.css({
                        color: '',
                        fontWeight: ''
                    });
                }
            });
            $radialGradient.show(); // Show the radial gradient div
            localStorage.setItem('highlightText', 'off');
        } else {
            $path.attr('d', 'M5 3a5 5 0 0 0 0 10h6a5 5 0 0 0 0-10H5zm6 9a4 4 0 1 1 0-8 4 4 0 0 1 0 8H5z');
            $svg.removeClass('bi-toggle-off').addClass('bi-toggle-on');
            $highlightDiv.css({
                backgroundColor: 'rgba(8, 47, 73, 0.6)',
                color: '#fff',
                transition: '0.6s',
                borderRadius: '5px',
                padding: '10px'
            });
            $('.container-left *, .main-menu *, blog *, .list-unstyled *, .mt-3 *, .container-fluid *, .hero-message *, .entry-content *').each(function() {
                var $element = $(this);
                if (!$element.attr('id') && !$element.hasClass('font-adjuster') && !$element.hasClass('container-fluid') && !$element.hasClass('line-height-adjuster') && !$element.hasClass('letter-spacing-adjuster') && !$element.hasClass('brightnessText')) {
                    $element.css({
                        color: '#fff',
                        fontWeight: 'bold'
                    });
                }
            });
            $radialGradient.hide(); // Hide the radial gradient div
            localStorage.setItem('highlightText', 'on');
        }
    });

    $(document).ready(function() {
        var $textArea = $('.entry-content');
        var $lineHeightIndicator = $('.line-height-indicator');
        var $fontSizeIndicator = $('.font-size-indicator');
        var $letterSpacingIndicator = $('.letter-spacing-indicator');
        var savedLineHeight = localStorage.getItem('lineHeight');
        var savedFontSize = localStorage.getItem('fontSize');
        var savedLetterSpacing = localStorage.getItem('letterSpacing');
        var originalLineHeight = parseFloat($textArea.css('--original-line-height'));
        var originalFontSize = parseInt($textArea.css('--original-font-size'));
        var originalLetterSpacing = parseFloat($textArea.css('--original-letter-spacing'));

        if (savedLineHeight) {
            $textArea.css('line-height', savedLineHeight);
            var percentage = ((savedLineHeight / originalLineHeight) * 100).toFixed(0);
            $lineHeightIndicator.text(percentage + '%');
        }

        if (savedFontSize) {
            $textArea.css('font-size', savedFontSize + 'px');
            var percentage = ((savedFontSize / originalFontSize) * 100).toFixed(0);
            $fontSizeIndicator.text(percentage + '%');
        }

        if (savedLetterSpacing) {
            $textArea.css('letter-spacing', savedLetterSpacing + 'px');
            var percentage = ((savedLetterSpacing / originalLetterSpacing) * 100).toFixed(0);
            $letterSpacingIndicator.text(percentage + '%');
        }

        $('.line-height-adjuster__plus-button').click(function() {
            adjustLineHeight($textArea, 0.2, $lineHeightIndicator);
        });
        $('.line-height-adjuster__minus-button').click(function() {
            adjustLineHeight($textArea, -0.2, $lineHeightIndicator);
        });
        $('.font-adjuster__plus-button').click(function() {
            adjustFontSize($textArea, 2, $fontSizeIndicator);
        });
        $('.font-adjuster__minus-button').click(function() {
            adjustFontSize($textArea, -2, $fontSizeIndicator);
        });
        $('.letter-spacing-adjuster__plus-button').click(function() {
            adjustLetterSpacing($textArea, 2, $letterSpacingIndicator);
        });
        $('.letter-spacing-adjuster__minus-button').click(function() {
            adjustLetterSpacing($textArea, -2, $letterSpacingIndicator);
        });
        $('.reset-button').click(function() {
            resetStyles($textArea, $lineHeightIndicator, $fontSizeIndicator, $letterSpacingIndicator);
        });

        function adjustLineHeight($element, adjustment, $indicator) {
            var fontSize = parseFloat($element.css('font-size'));
            var currentLineHeight = parseFloat($element.css('line-height')) / fontSize;
            var newSize = (currentLineHeight + adjustment).toFixed(1);
            var percentage = ((newSize / originalLineHeight) * 100).toFixed(0);
            $element.css('line-height', newSize);
            $indicator.text(percentage + '%');
            localStorage.setItem('lineHeight', newSize);
        }

        function adjustFontSize($element, adjustment, $indicator) {
            var currentSize = parseInt($element.css('font-size'));
            var newSize = currentSize + adjustment;
            var percentage = ((newSize / originalFontSize) * 100).toFixed(0);
            $element.css('font-size', newSize + 'px');
            $indicator.text(percentage + '%');
            localStorage.setItem('fontSize', newSize);
        }

        function adjustLetterSpacing($element, adjustment, $indicator) {
            var currentSpacing = parseFloat($element.css('letter-spacing'));
            var newSize = currentSpacing + adjustment;
            var percentage = ((newSize / originalLetterSpacing) * 100).toFixed(0);
            $element.css('letter-spacing', newSize + 'px');
            $indicator.text(percentage + '%');
            localStorage.setItem('letterSpacing', newSize);
        }

        function resetStyles($element, $lineHeightIndicator, $fontSizeIndicator, $letterSpacingIndicator) {
            $element.css('line-height', originalLineHeight);
            $lineHeightIndicator.text('100%');
            localStorage.removeItem('lineHeight');

            $element.css('font-size', originalFontSize + 'px');
            $fontSizeIndicator.text('100%');
            localStorage.removeItem('fontSize');

            $element.css('letter-spacing', originalLetterSpacing + 'px');
            $letterSpacingIndicator.text('100%');
            localStorage.removeItem('letterSpacing');
        }
    });

    // Letting Spacing //

    $(document).ready(function() {
        var $textArea = $('.entry-content');
        var $letterSpacingIndicator = $('.letter-spacing-indicator');
        var savedLetterSpacing = localStorage.getItem('letterSpacing');

        if (savedLetterSpacing !== null) {
            console.log('Saved Letter Spacing:', savedLetterSpacing); // Log savedLetterSpacing
            $textArea.css('letter-spacing', savedLetterSpacing + 'px');
            var originalSpacing = parseFloat($textArea.css('--original-letter-spacing'));
            console.log('Original Letter Spacing:', originalSpacing); // Log originalSpacing
            var percentage = ((parseFloat(savedLetterSpacing) / originalSpacing) * 100).toFixed(0);
            $letterSpacingIndicator.text(percentage + '%');
        }

        $('.letter-spacing-adjuster__plus-button').click(function() {
            adjustLetterSpacing($textArea, 1, $letterSpacingIndicator);
        });

        $('.letter-spacing-adjuster__minus-button').click(function() {
            adjustLetterSpacing($textArea, -1, $letterSpacingIndicator);
        });

        function adjustLetterSpacing($element, adjustment, $indicator) {
            var currentSpacing = parseFloat($element.css('letter-spacing'));
            var newSize = currentSpacing + adjustment;
            var originalSpacing = parseFloat($element.css('--original-letter-spacing'));
            var percentage = ((newSize / originalSpacing) * 100).toFixed(0);
            $element.css('letter-spacing', newSize + 'px');
            $indicator.text(percentage + '%');
            localStorage.setItem('letterSpacing', newSize);
        }
    });

    /* Site Brightness */
    $(document).ready(function() {
        const $slider = $('#brightnessSlider');
        const $brightnessText = $('#brightnessText');
        if (localStorage.getItem('brightness')) {
            $slider.val(localStorage.getItem('brightness'));
        }
        changeBrightness('p, .fixed-column, .carouselMobile, .radial-gradient, .desktopLeftArrow, .navigation-arrows, img, a, .fw-lighter, span', $slider.val());
        updateText($slider.val());
        $slider.on('input', function() {
            changeBrightness('p, .fixed-column, .carouselMobile, .radial-gradient, .desktopLeftArrow, .navigation-arrows, img, a, .fw-lighter, span', $slider.val());
            updateText($slider.val());
            localStorage.setItem('brightness', $slider.val());
        });

        function changeBrightness(selector, brightness) {
            $(selector).css('filter', `brightness(${brightness})`);
        }

        function updateText(brightness) {
            const percentage = Math.round(parseFloat(brightness) * 100);
            $brightnessText.text(`${percentage}%`);
        }
    });

    // Reset //
    $('#resetButton').on('click', function() {
        // Reset highlight links
        if ($('#highlightLinks .bi').hasClass('bi-toggle-on')) {
            $('#highlightLinks').click();
        }

        // Reset bold text
        if ($('#highlightText .bi').hasClass('bi-toggle-on')) {
            $('#highlightText').click();
        }

    });

})(jQuery);

(function() {
    /* Highlighting text using IntersectionObserver */
    function handleTextHighlighting() {
        const highlightedTextElements = document.querySelectorAll(".highlight-text");
        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add("highlight");
                } else {
                    entry.target.classList.remove("highlight");
                }
            });
        }, {
            root: null,
            rootMargin: "0px",
            threshold: 0.5
        });
        highlightedTextElements.forEach(element => {
            observer.observe(element);
        });
    }
    handleTextHighlighting();

})();