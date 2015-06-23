<?php
$this->viewVars['title_for_layout'] = __d('croogo', 'Aparnic Sliders');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Aparnic Sliders'), array('action' => 'index'));

?>

<div class="aparnicSliders index">
	<table class="table table-striped">
	<tr>
		<th><?php echo $this->Paginator->sort('id', __d('aparnic_slider', 'id')); ?></th>
		<th><?php echo $this->Paginator->sort('title', __d('aparnic_slider', 'Title')); ?></th>
		<th><?php echo $this->Paginator->sort('slug', __d('aparnic_slider', 'Slug')); ?></th>
		<th><?php echo $this->Paginator->sort('element', __d('aparnic_slider', 'Element')); ?></th>
		<th><?php echo $this->Paginator->sort('aparnic_slide_count', __d('aparnic_slider', 'Aparnic slide count')); ?></th>
		<th><?php echo __d('aparnic_slider', 'shortcode'); ?></th>
		<th><?php echo $this->Paginator->sort('created', __d('aparnic_slider', 'Created')); ?></th>
		<th class="actions"><?php echo __d('croogo', 'Actions'); ?></th>
	</tr>
	<?php foreach ($aparnicSliders as $aparnicSlider): ?>
	<tr>
		<td><?php echo h($aparnicSlider['AparnicSlider']['id']); ?>&nbsp;</td>
		<td><?php echo h($aparnicSlider['AparnicSlider']['title']); ?>&nbsp;</td>
		<td><?php echo h($aparnicSlider['AparnicSlider']['slug']); ?>&nbsp;</td>
		<td><?php echo h($aparnicSlider['AparnicSlider']['element']); ?>&nbsp;</td>
		<td><?php echo h($aparnicSlider['AparnicSlider']['aparnic_slide_count']); ?>&nbsp;</td>
                <td><?php echo '[AparnicSlider:'.$aparnicSlider['AparnicSlider']['slug'].' slug="'.$aparnicSlider['AparnicSlider']['slug'].'"]'; ?>&nbsp;</td>
                <td><?php echo jdate('Y-m-d H:i:s', h($aparnicSlider['AparnicSlider']['created']), null, 'Asia/Tehran', 'en'); ?>&nbsp;</td>
		<td class="item-actions">
                        
			<?php echo $this->Croogo->adminRowActions($aparnicSlider['AparnicSlider']['id']); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'edit', $aparnicSlider['AparnicSlider']['id']), array('icon' => 'pencil')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'delete', $aparnicSlider['AparnicSlider']['id']), array('icon' => 'trash', 'escape' => true), __d('croogo', 'Are you sure you want to delete # %s?', $aparnicSlider['AparnicSlider']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
</div>
