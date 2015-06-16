<?php
App::uses('AparnicSliderAppModel', 'AparnicSlider.Model');
/**
 * AparnicSlider Model
 *
 * @property AparnicSlide $AparnicSlide
 */
class AparnicSlider extends AparnicSliderAppModel {


        public $actsAs = array('Meta.Meta');

	public $hasMany = array(
		'AparnicSlide' => array(
			'className' => 'AparnicSlider.AparnicSlide',
			'foreignKey' => 'aparnic_slider_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
        //----------------------------------------------------------
}
