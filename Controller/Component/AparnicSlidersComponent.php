<?php
App::uses('Component', 'Controller');
App::uses('StringConverter', 'Croogo.Lib/Utility');
class AparnicSlidersComponent extends Component{
    
    protected $_controller;
    protected $_stringConverter = null;
    protected $_aparnicSliders = array();
    

    public function initialize(Controller $controller) {
        $this->_controller = $controller;
        $this->_stringConverter = new StringConverter();
    }
    //----------------------------------------------------------
    public function startup(Controller $controller) {
        if(!isset($this->_controller->request->params['admin'])){
            $this->__processBlocksData();
        }
    }
    //----------------------------------------------------------
    private function __processBlocksData() {
        $convertor = $this->_stringConverter;
        
        $blocksForLayouts = $this->_controller->Blocks->blocksForLayout;
//        debug($blocksForLayouts);
        foreach ($blocksForLayouts as $region => $blocks) {
            foreach($blocks as $block){
                $this->_aparnicSliders = Hash::merge($this->_aparnicSliders, 
                        $convertor->parseString('AparnicSlider', $block['Block']['body'])
                    );
            }
        }
        $aparnicSlider = ClassRegistry::init('AparnicSlider.AparnicSlider');
        foreach ($this->_aparnicSliders as $sliderAlias => &$sliderAttr) {
            $sliderAttr = $aparnicSlider->find('first', array(
                'conditions' => array(
                    'AparnicSlider.slug' => $sliderAttr['slug']
                )
            ));
        }
    }
    //----------------------------------------------------------
    public function beforeRender(Controller $controller) {
//        debug($this->_controller->viewVars['blocks_for_layout']);
//        debug($this->_aparnicSliders);
        if(!empty($this->_aparnicSliders)){
            $this->_controller->set('aparnic_slider_for_layout', $this->_aparnicSliders);
        }
    }
}