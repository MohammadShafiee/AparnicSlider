<?php
$this->viewVars['title_for_layout'] = __d('croogo', 'Aparnic Sliders');
$this->extend('/Common/admin_edit');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Aparnic Sliders'), array('action' => 'index'));

if ($this->action == 'admin_edit') {
	$this->Html->addCrumb($this->data['AparnicSlider']['title'], '/' . $this->request->url);
	$this->viewVars['title_for_layout'] = 'Aparnic Sliders: ' . $this->data['AparnicSlider']['title'];
} else {
	$this->Html->addCrumb(__d('croogo', 'Add'), '/' . $this->request->url);
}

echo $this->Form->create('AparnicSlider');

?>
<div class="aparnicSliders row-fluid">
	<div class="span8">
		<ul class="nav nav-tabs">
		<?php
			echo $this->Croogo->adminTab(__d('croogo', 'Aparnic Slider'), '#aparnic-slider');
			echo $this->Croogo->adminTabs();
		?>
		</ul>

		<div class="tab-content">
			<div id='aparnic-slider' class="tab-pane">
			<?php
				echo $this->Form->input('id');
				$this->Form->inputDefaults(array('label' => false, 'class' => 'span10'));
				echo $this->Form->input('title', array(
					'label' => 'Title',
				));
				echo $this->Form->input('slug', array(
					'label' => 'Slug',
				));
                $elementOptions = Configure::read('elements');
                $elementOptions = array_combine($elementOptions, $elementOptions);
                echo $this->Form->input('element', array(
                    'label' => 'Element',
                    'options' => $elementOptions,
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
                echo $this->Croogo->adminBoxes();
		?>
	</div>

</div>
<?php echo $this->Form->end(); ?>
