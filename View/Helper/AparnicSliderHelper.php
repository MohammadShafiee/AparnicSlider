<?php
App::uses('StringConvertor', 'Croogo.Lib/Utility');
class AparnicSliderHelper extends AppHelper{
    private $__stringConverter = null;
    public function __construct(View $View, $settings = array()) {
        parent::__construct($View, $settings);
        $this->__stringConverter = new StringConverter();
        $this->__setupEvent();
    }
    //----------------------------------------------------------
    private function __setupEvent() {
        $events = array(
            'Helper.Layout.beforeFilter' => array(
                'passParams' => true
            )
        );
        $eventManager = $this->_View->getEventManager();
        foreach ($events as $name => $config) {
            $eventManager->attach(array($this, 'filter'), $name, $config);
        }
    }
    //----------------------------------------------------------
    public function filter(&$content, $options = array()) {
            $aparnicSliders = $this->__stringConverter->parseString('AparnicSlider', $content);
            foreach($aparnicSliders as $sliderAlias => $sliderAttr){
                $content = str_replace($content, $this->__addAparnicSlider($sliderAlias), $content);
            }
            return $content;
    }
    //----------------------------------------------------------
    private function __addAparnicSlider($sliderAlias) {
        $slider = $this->_View->viewVars['aparnic_slider_for_layout'][$sliderAlias];
        $sliderElement = $slider['AparnicSlider']['element'];
        $sliderData = array(
            'slideImages' => $slider['AparnicSlide'],
            'sliderOptions' => $slider['CustomFields']
        );
        $output = '';
        $output = $this->_View->element($sliderElement, $sliderData);
        return $output;
        
    }
    //----------------------------------------------------------
}
