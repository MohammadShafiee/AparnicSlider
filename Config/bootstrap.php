<?php
define('aparnicSliderUploadsDir', 'aparnic_slider');

AparnicMetabox::addMetaJson('AparnicSlider');
Croogo::hookComponent('*', 'AparnicSlider.AparnicSliders');
Croogo::hookHelper('*', 'AparnicSlider.AparnicSlider');

CroogoNav::add('sidebar', 'aparnic_slider', array(
	'title' => __d('aparnic_slider', 'Aparnic Slider'),
	'url' => '#',
	'weight' => 50,
	'children' => array(
		'index' => array(
			'title' => __d('aparnic_slider', 'Sliders'),
			'url' => array(
				'admin' => true,
				'plugin' => 'aparnic_slider',
				'controller' => 'aparnic_sliders',
				'action' => 'index'
			),
			'weight' => 1
		),
		'create' => array(
			'title' => __d('aparnic_slider', 'New'),
			'url' => array(
				'admin' => true,
				'plugin' => 'aparnic_slider',
				'controller' => 'aparnic_sliders',
				'action' => 'add'
			),
			'weight' => 2
		)
	)
));
Croogo::hookAdminRowAction('AparnicSliders/admin_index', 'slides', array(
    'admin:true/plugin:aparnic_slider/controller:aparnic_slides/action:admin_index/:id' => array(
        'title' => false,
        'options' => array(
            'icon' => 'picture',
            'tooltip' => __d('aparnic_slider', 'view slides')
        )
    )
));