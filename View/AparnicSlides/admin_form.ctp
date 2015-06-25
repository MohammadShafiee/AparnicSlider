<?php
$this->viewVars['title_for_layout'] = __d('croogo', 'Aparnic Slides');
$this->extend('/Common/admin_edit');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Aparnic Slides'), array('action' => 'index', $this->request->pass['0']));

if ($this->action == 'admin_edit') {
	$this->Html->addCrumb($this->data['AparnicSlide']['id'], '/' . $this->request->url);
	$this->viewVars['title_for_layout'] = 'Aparnic Slides: ' . $this->data['AparnicSlide']['id'];
} else {
	$this->Html->addCrumb(__d('croogo', 'Add'), '/' . $this->request->url);
}

echo $this->Form->create('AparnicSlide', array('type' => 'file'));

?>
<div class="aparnicSlides row-fluid">
	<div class="span8">
		<ul class="nav nav-tabs">
		<?php
			echo $this->Croogo->adminTab(__d('aparnic_slider', 'Aparnic Slide'), '#aparnic-slide');
			echo $this->Croogo->adminTabs();
		?>
		</ul>

		<div class="tab-content">
			<div id='aparnic-slide' class="tab-pane">
			<?php
                if($this->action == 'admin_edit'){
                    $imagePath = '/' . aparnicSliderUploadsDir . '/' . $this->request->data['AparnicSlide']['pic'];
                    echo $this->Html->image($imagePath, array(
                        'width' => '200px',
                        'height' => '200px'
                    ));
                }else{
                    echo $this->Form->input('aparnic_slider_id', array(
                        'type' => 'hidden',
                        'value' => $aparnicSliderId
                    ));
                }
				echo $this->Form->input('id');
				$this->Form->inputDefaults(array('label' => false, 'class' => 'span10'));
				echo $this->Form->input('pic', array(
                                        'type' => 'file',
                                        'required' => false,
					'label' => __d('aparnic_slider', 'Picture'),
				));
				echo $this->Form->input('caption', array(
					'label' => __d('aparnic_slider', 'Caption'),
				));
				echo $this->Form->input('link', array(
					'label' => __d('aparnic_slider', 'Link'),
				));
			?>
			</div>
			<?php echo $this->Croogo->adminTabs(); ?>
		</div>

	</div>

	<div class="span4">
	<?php
		echo $this->Html->beginBox(__d('croogo', 'Publishing')) .
			$this->Form->button(__d('croogo', 'Apply'), array('name' => 'apply')) .
			$this->Form->button(__d('croogo', 'Save'), array('class' => 'btn btn-primary')) .
			$this->Html->link(__d('croogo', 'Cancel'), array('action' => 'index'), array('class' => 'btn btn-danger')) .
			$this->Html->endBox();
		?>
	</div>

</div>
<?php echo $this->Form->end(); ?>
