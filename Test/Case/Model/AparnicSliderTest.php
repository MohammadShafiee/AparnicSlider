<?php
App::uses('AparnicSlider', 'AparnicSlider.Model');

/**
 * AparnicSlider Test Case
 *
 */
class AparnicSliderTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.aparnic_slider.aparnic_slider',
		'plugin.aparnic_slider.aparnic_slide'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->AparnicSlider = ClassRegistry::init('AparnicSlider.AparnicSlider');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->AparnicSlider);

		parent::tearDown();
	}

}
