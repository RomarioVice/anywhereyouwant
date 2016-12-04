<div class="cont-slider">
<div class="slider-show">

    <ul id="sb-slider" class="sb-slider">
        <li>
            <a href="https://vk.com/perevozki_dnr_rossiya?z=photo-88981031_437920823%2Falbum-88981031_212662662%2Frev" target="_blank"><img src="img/slider/s1.jpg" alt="image1"/></a>
<!--            <div class="sb-description">-->
<!--                <h3>Донецк - Липецк (без посредников)</h3>-->
<!--            </div>-->
        </li>
        <li>
            <a href="https://vk.com/perevozki_dnr_rossiya?z=photo-88981031_436529736%2Falbum-88981031_212662662%2Frev" target="_blank"><img src="img/slider/s2.jpg" alt="image2"/></a>
<!--            <div class="sb-description">-->
<!--                <h3>Донецк - Адлер</h3>-->
<!--            </div>-->
        </li>
        <li>
            <a href="https://vk.com/perevozki_dnr_rossiya?z=photo-88981031_436775612%2Falbum-88981031_212662662%2Frev" target="_blank"><img src="img/slider/s3.jpg" alt="image1"/></a>
<!--            <div class="sb-description">-->
<!--                <h3>Донецк - Саратов - Тальятти - Самара</h3>-->
<!--            </div>-->
        </li>
        <li>
            <a href="https://vk.com/perevozki_dnr_rossiya?z=photo-88981031_438691069%2Falbum-88981031_212662662%2Frev" target="_blank"><img src="img/slider/s4.jpg" alt="image1"/></a>
<!--            <div class="sb-description">-->
<!--                <h3>Донецк - Питер - Тверь - В. Новгород</h3>-->
<!--            </div>-->
        </li>
        <li>
            <a href="https://vk.com/perevozki_dnr_rossiya?z=photo-88981031_436119757%2Falbum-88981031_212662662%2Frev" target="_blank"><img src="img/slider/s5.jpg" alt="image1"/></a>
<!--            <div class="sb-description">-->
<!--                <h3>Донецк - В. Новгород</h3>-->
<!--            </div>-->
        </li>
    </ul>

<!--    <div id="shadow" class="shadow"></div>-->

    <div id="nav-arrows" class="nav-arrows">
        <a href="#">Next</a>
        <a href="#">Previous</a>
    </div>

    <div id="nav-options" class="nav-options">
        <span id="navPlay">Play</span>
        <span id="navPause">Pause</span>
    </div>

</div>
</div>

<script type="text/javascript">
    $(function() {

        var Page = (function() {

            var $navArrows = $( '#nav-arrows' ).hide(),
                $navOptions = $( '#nav-options' ).hide(),
                $shadow = $( '#shadow' ).hide(),
                slicebox = $( '#sb-slider' ).slicebox( {
                    onReady : function() {

                        $navArrows.show();
                        $navOptions.show();
                        $shadow.show();
                        slicebox.play();

                    },
                    orientation : 'h',
                    cuboidsCount : 1
                } ),

                init = function() {

                    initEvents();

                },
                initEvents = function() {

                    // add navigation events
                    $navArrows.children( ':first' ).on( 'click', function() {

                        slicebox.next();
                        return false;

                    } );

                    $navArrows.children( ':last' ).on( 'click', function() {

                        slicebox.previous();
                        return false;

                    } );

                    $( '#navPlay' ).on( 'click', function() {

                        slicebox.play();
                        return false;

                    } );

                    $( '#navPause' ).on( 'click', function() {

                        slicebox.pause();
                        return false;

                    } );

                };

            return { init : init };

        })();

        Page.init();

    });
</script>