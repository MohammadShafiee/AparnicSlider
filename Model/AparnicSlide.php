<?php
App::uses('AparnicSliderAppModel', 'AparnicSlider.Model');
/**
 * AparnicSlide Model
 *
 * @property AparnicSlider $AparnicSlider
 */
class AparnicSlide extends AparnicSliderAppModel {


        public $validate = array(
            'pic' => array(
                'notEmpty' => array(
                    'allowEmpty' => false,
                    'message' => 'image can not be empty',
                    'on' => 'create',
                )
            )
        );
	public $belongsTo = array(
		'AparnicSlider' => array(
			'className' => 'AparnicSlider.AparnicSlider',
			'foreignKey' => 'aparnic_slider_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
                        'counterCache' => true
		)
	);
        //----------------------------------------------------------
        public function beforeSave($options = array()) {
            $pic = $this->data[$this->alias]['pic'];
            unset($this->data[$this->alias]['pic']);
            if(isset($pic['tmp_name']) && !empty($pic['tmp_name'])){
                $this->__uploadPic($pic);
            }
            return true;
        }
        //----------------------------------------------------------
        private function __uploadPic($pic = NULL) {
            
            $destination = WWW_ROOT . aparnicSliderUploadsDir . DS . $pic['name'];
            $newPicName = $pic['name'];
            if (file_exists($destination)) {
                $newPicName = String::uuid() . '-' . $pic['name'];
                $destination = WWW_ROOT . aparnicSliderUploadsDir . DS . $newPicName;
            }
            
            $moved = move_uploaded_file($pic['tmp_name'], $destination);
            if($moved){
                $this->data[$this->alias]['pic'] = $newPicName;
                return true;
            }
            return false;
        }
        //----------------------------------------------------------
        
}
