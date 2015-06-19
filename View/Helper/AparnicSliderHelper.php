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
                $newContent = $this->__addAparnicSlider($sliderAlias);
                if(!empty($newContent)){
                    $content = str_replace($content, $newContent, $content);
                }
            }
            return $content;
    }
    //----------------------------------------------------------
    private function __addAparnicSlider($sliderAlias) {
        $output = '';
        $slider = $this->_View->viewVars['aparnic_slider_for_layout'][$sliderAlias];
        if(!empty($slider)){
            $sliderElement = $slider['AparnicSlider']['element'];
            $sliderData = array(
                'slideImages' => $slider['AparnicSlide'],
                'sliderOptions' => $slider['CustomFields']
            );
            $output = $this->_View->element($sliderElement, $sliderData);
        }
        return $output;
        
    }
    //----------------------------------------------------------
}
