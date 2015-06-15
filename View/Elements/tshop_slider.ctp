<div class="banner">
    <div class="full-container">
        <div class="slider-content">
            <ul id="pager2" class="container"></ul>
            <span class="prevControl sliderControl">
                <i class="fa fa-angle-left fa-3x "></i>
            </span>
            <span class="nextControl sliderControl">
                <i class="fa fa-angle-right fa-3x "></i>
            </span>
            <div class="slider slider-v1" data-cycle-swipe="true" data-cycle-prev=".prevControl" data-cycle-next=".nextControl" data-cycle-loader="wait" style="overflow: hidden;">
                <?php foreach($slideImages as $img): ?>
                    <div class="slider-item slider-item-img1 cycle-slide" style="visibility: hidden; position: absolute; top: 0px; left: 0px; z-index: 96; opacity: 1; display: block;">
                        <div class="sliderInfo">
                            <div class="container">
                                <div class="col-lg-12 col-md-12 col-sm-12 sliderTextFull ">
                                    <div class="inner text-center">
                                        <div class="topAnima animated">
                                            <h1 class="uppercase xlarge">FREE SHIPPING</h1>
                                            <h3 class="hidden-xs"> Free Standard Shipping on Orders Over $100 </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                            echo $this->Html->image('/'.aparnicSliderUploadsDir.'/'.$img['pic'],
                                array(
                                    'title' => $img['caption'],
                                    'class' => 'img-responsive parallaximg sliderImg',
                                    'alt' => 'img',
                                    'style' => 'margin-top: 0px;'
                                )
                            );
                        ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>