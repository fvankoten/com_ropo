<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted Access');
?>
<?php foreach($this->items as $i => $item): ?>
<tr class="row<?php echo $i % 2; ?>">
	<td rowspan="2"><?php echo JText::sprintf('%d-%03d', $item->regno, $item->version); ?></td>
	<td>
		<a href="<?php echo JRoute::_('index.php?option=com_ropo&view=publicsystem&id='.$item->id); ?>">
			<?php echo $item->title; ?>
		</a>
	</td>
	<td><?php echo JHTML::_('date', $item->created_time, JText::_('DATE_FORMAT_LC4')); ?></td>
	
</tr>
<tr>
	<td><?php echo $item->identificationdata_controller_name; ?></td>
	<td><?php echo JHTML::_('date', $item->modified_time, JText::_('DATE_FORMAT_LC4')); ?></td>
</tr>
<?php endforeach; ?>