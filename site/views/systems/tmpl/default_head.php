<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted Access');
?>
<tr>
	<th width="20">
		<input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count($this->items); ?>);" />
	</th>
	<th><?php echo JText::_('COM_ROPO_SYSTEM_HEADING_REGNO'); ?></th>
	<th>
		<?php echo JText::_('COM_ROPO_SYSTEM_HEADING_TITLE'); ?><br />
		<?php echo JText::_('COM_ROPO_IDENTIFICATIONDATA_FIELDSET_CONTROLLER'); ?>
	</th>
	<th>
		<?php echo JText::_('COM_ROPO_SYSTEM_HEADING_CREATED_TIME'); ?><br />
		<?php echo JText::_('COM_ROPO_SYSTEM_HEADING_MODIFIED_TIME'); ?>
	</th>
	<th><?php echo JText::_('COM_ROPO_SYSTEM_HEADING_STATE'); ?></th>
</tr>
