<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted Access');
?>
<?php foreach($this->items as $i => $item): ?>
<tr class="row<?php echo $i % 2; ?>">
	<td><?php echo JHtml::_('grid.id', $i, $item->id); ?></td>
	<td><?php echo $item->id; ?></td>
	<td><?php echo $item->regno; ?></td>
	<td><?php echo $item->version; ?></td>
	<td><?php echo $item->title; ?></td>
	<td><?php echo $item->created_time; ?></td>
	<td><?php echo $item->modified_time; ?></td>
	<td><?php echo $item->state; ?></td>
</tr>
<?php endforeach; ?>