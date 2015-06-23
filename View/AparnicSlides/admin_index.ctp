<?php
$this->viewVars['title_for_layout'] = __d('croogo', 'Aparnic Slides');
$this->extend('/Common/admin_index');
//debug($this->request);
$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Aparnic Slides'), array('action' => 'index'));

$sliderId = $this->request->params['pass'][0];
$this->start('actions');
    echo $this->Croogo->adminAction(
        __d('croogo', 'List %s', __d('aparnic_slider', 'sliders')),
        array('admin' => true, 'plugin' => 'aparnic_slider', 'controller' => 'aparnic_sliders', 'action' => 'index'),
        array('button' => 'default')
    );
    echo $this->Croogo->adminAction(
        __d('croogo', 'New %s', __d('aparnic_slider', 'slider')),
        array('admin' => true, 'plugin' => 'aparnic_slider', 'controller' => 'aparnic_sliders', 'action' => 'add'),
        array('button' => 'default')
    );
    echo $this->Croogo->adminAction(
        __d('croogo', 'New %s', __d('aparnic_slider', 'slide')),
        array('action' => 'add', $sliderId),
        array('button' => 'success')
    );
$this->end();
?>

<div class="aparnicSlides index">
	<table class="table table-striped">
	<tr>
		<th><?php echo $this->Paginator->sort('id', __d('aparnic_slider', 'id')); ?></th>
		<th><?php echo $this->Paginator->sort('pic', __d('aparnic_slider', 'Picture')); ?></th>
		<th><?php echo $this->Paginator->sort('caption', __d('aparnic_slider', 'Caption')); ?></th>
		<th><?php echo $this->Paginator->sort('link', __d('aparnic_slider', 'Link')); ?></th>
		<th class="actions"><?php echo __d('croogo', 'Actions'); ?></th>
	</tr>
	<?php foreach ($aparnicSlides as $aparnicSlide): ?>
	<tr>
		<td><?php echo h($aparnicSlide['AparnicSlide']['id']); ?>&nbsp;</td>
		<td>
                    <?php 
                    $imgUrl = $this->Image->resize('/' . aparnicSliderUploadsDir . '/' . $aparnicSlide['AparnicSlide']['pic'], 
                            100, 
                            200,
                            array('uploadsDir' => aparnicSliderUploadsDir),
                            array('class' => 'img-polaroid')
                        ); 
                    echo $this->Html->link(
                            $imgUrl, 
                            '/' . aparnicSliderUploadsDir . '/' . $aparnicSlide['AparnicSlide']['pic'],
                            array(
                                'escape' => false, 
                                'class' => 'thickbox'
                            )
                        );
                    ?>
                </td>
		<td><?php echo h($aparnicSlide['AparnicSlide']['caption']); ?>&nbsp;</td>
		<td><?php echo h($aparnicSlide['AparnicSlide']['link']); ?>&nbsp;</td>
		<td class="item-actions">
			<?php echo $this->Croogo->adminRowActions($aparnicSlide['AparnicSlide']['id']); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'edit', $sliderId, $aparnicSlide['AparnicSlide']['id']), array('icon' => 'pencil')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'delete', $aparnicSlide['AparnicSlide']['id']), array('icon' => 'trash', 'escape' => true), __d('croogo', 'Are you sure you want to delete # %s?', $aparnicSlide['AparnicSlide']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
</div>
