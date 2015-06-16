<?php
echo $this->Html->script('AparnicSlider.bxslider/jquery.bxslider.min');
echo $this->Html->css('AparnicSlider.bxslider/jquery.bxslider');
?>
<ul class="bxslider">
    <?php 
    foreach($slideImages as $img){
        echo $this->Html->tag('li', 
            $this->Html->image('/'.aparnicSliderUploadsDir.'/'.$img['pic'],
                array(
                    'title' => $img['caption'],
                    'style' => 'width:'.$sliderOptions['width'].'px; height:'.$sliderOptions['height'].'px'
                )
            ),
            array('escape' => false, 'style' => 'margin:0;')
        );
    }
    ?>
</ul>
<script type="text/javascript">
    $(document).ready(function(){
        $('.bxslider').bxSlider({
                mode: 'fade',
		slideSelector: '',
		infiniteLoop: true,
		hideControlOnEnd: false,
		speed: 500,
		easing: null,
		slideMargin: 0,
		startSlide: 0,
		randomStart: false,
		captions: true,
		ticker: false,
		tickerHover: false,
		adaptiveHeight: false,
		adaptiveHeightSpeed: 500,
		video: false,
		useCSS: true,
		preloadImages: 'visible',
		responsive: true,
		slideZIndex: 50,
		wrapperClass: 'bx-wrapper',

		// TOUCH
		touchEnabled: true,
		swipeThreshold: 50,
		oneToOneTouch: true,
		preventDefaultSwipeX: true,
		preventDefaultSwipeY: false,

		// PAGER
		pager: true,
		pagerType: 'full',
		pagerShortSeparator: ' / ',
		pagerSelector: null,
		buildPager: null,
		pagerCustom: null,

		// CONTROLS
		controls: true,
		nextText: 'Next',
		prevText: 'Prev',
		nextSelector: null,
		prevSelector: null,
		autoControls: false,
		startText: 'Start',
		stopText: 'Stop',
		autoControlsCombine: false,
		autoControlsSelector: null,

		// AUTO
		auto: false,
		pause: 4000,
		autoStart: true,
		autoDirection: 'next',
		autoHover: false,
		autoDelay: 0,
		autoSlideForOnePage: false,

		// CAROUSEL
		minSlides: 1,
		maxSlides: 1,
		moveSlides: 0,
		slideWidth: 0,

		// CALLBACKS
		onSliderLoad: function() {},
		onSlideBefore: function() {},
		onSlideAfter: function() {},
		onSlideNext: function() {},
		onSlidePrev: function() {},
		onSliderResize: function() {}
        });
    });
</script>