<?php
echo $this->Html->script('AparnicSlider.nivo_slider/jquery.nivo.slider.pack');
echo $this->Html->css('AparnicSlider.nivo_slider/default/default');
echo $this->Html->css('AparnicSlider.nivo_slider/nivo-slider');
?>
<div class="theme-default">
    <div id="slider" class="nivoSlider">
        <?php 
        foreach($slideImages as $img){
            echo $this->Html->image('/'.aparnicSliderUploadsDir.'/'.$img['pic'],
                    array(
                        'title' => $img['caption'],
                        'style' => 'width:'.$sliderOptions['width'].'px; height:'.$sliderOptions['height'].'px'
                    )
                );
        }
        ?>
    </div>
</div>
<script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider({
            effect: 'random',
		slices: 15,
		boxCols: 8,
		boxRows: 4,
		animSpeed: 500,
		pauseTime: 3000,
		startSlide: 0,
		directionNav: true,
		directionNavHide: true,
		controlNav: true,
		controlNavThumbs: false,
                controlNavThumbsFromRel: false,
		controlNavThumbsSearch: '.jpg',
		controlNavThumbsReplace: '_thumb.jpg',
		keyboardNav: true,
		pauseOnHover: true,
		manualAdvance: false,
		captionOpacity: 0.8,
		prevText: 'Prev',
		nextText: 'Next',
		randomStart: false,
		beforeChange: function(){},
		afterChange: function(){},
		slideshowEnd: function(){},
                lastSlide: function(){},
                afterLoad: function(){}
        });
    });
</script>