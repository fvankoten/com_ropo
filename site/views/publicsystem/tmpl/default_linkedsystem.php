<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted Access');
?>

<tr class="level1"><th colspan="2"><?php echo JText::_('COM_ROPO_LINKED_FILING_SYSTEMS') ?></th></tr>
<tr>
	<td colspan="2" class="col1">
		<input type="checkbox" readonly="readonly"
			<?php if ($this->item->linkedsystem_enabled == 0) : ?>
			checked="checked"
			<?php endif; ?>
		/>
		<label><?php echo JText::_('COM_ROPO_LINKED_FILING_SYSTEMS_NO_LABEL') ?></label>
	</td>
</tr>
<tr>
	<td colspan="2" class="col1">
		<input type="checkbox" readonly="readonly"
			<?php if ($this->item->linkedsystem_enabled == 1) : ?>
			checked="checked"
			<?php endif; ?>
		/>
		<label><?php echo JText::_('COM_ROPO_LINKED_FILING_SYSTEMS_YES_LABEL') ?></label>
	</td>
</tr>
<tr>
	<td class="col1"><?php echo JText::_('COM_ROPO_LINKEDSYSTEM_DESCRIPTION_LABEL') ?></td>
	<td class="col2"><?php echo $this->item->linkedsystem_description ?></td>
</tr>
<tr>
	<td class="col1"><?php echo JText::_('COM_ROPO_LINKEDSYSTEM_NOTIFICATION_LABEL') ?></td>
	<td class="col2"><?php echo $this->item->linkedsystem_notification ?></td>
</tr>
<tr>
	<td class="col1"><?php echo JText::_('COM_ROPO_LINKEDSYSTEM_AUTHORIZATION_LABEL') ?></td>
	<td class="col2"><?php echo $this->item->linkedsystem_authorization ?></td>
</tr>