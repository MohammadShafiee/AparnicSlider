<?php
App::uses('AparnicSlide', 'AparnicSlider.Model');

/**
 * AparnicSlide Test Case
 *
 */
class AparnicSlideTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.aparnic_slider.aparnic_slide',
		'plugin.aparnic_slider.aparnic_slider'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->AparnicSlide = ClassRegistry::init('AparnicSlider.AparnicSlide');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->AparnicSlide);

		parent::tearDown();
	}

}
