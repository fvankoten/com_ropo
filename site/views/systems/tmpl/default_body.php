<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted Access');
?>
<?php foreach($this->items as $i => $item): ?>
<tr class="row<?php echo $i % 2; ?>">
	<td><?php echo JHtml::_('grid.id', $i, $item->id); ?></td>
	<td><?php echo JText::sprintf('%d-%03d', $item->regno, $item->version); ?></td>
	<td>
		<?php echo $item->title; ?><br />
		<?php echo $item->identificationdata_controller_name; ?>
	</td>
	<td>
		<?php echo JHTML::_('date', $item->created_time, JText::_('DATE_FORMAT_LC4')); ?><br />
		<?php echo JHTML::_('date', $item->modified_time, JText::_('DATE_FORMAT_LC4')); ?>
	</td>
	<td><?php echo $item->state; ?></td>
</tr>
<?php endforeach; ?>