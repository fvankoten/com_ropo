<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted Access');
?>

<tr><th colspan="2"><?php echo JText::_('COM_ROPO_DISCLOSURE') ?></th></tr>
<tr>
	<td colspan="2">
		<input type="checkbox" readonly="readonly"
			<?php if ($this->item->disclosure_enabled == 0) : ?>
			checked="checked"
			<?php endif; ?>
		/>
		<label><?php echo JText::_('COM_ROPO_DISCLOSURE_NO_LABEL') ?></label>
	</td>
</tr>
<tr>
	<td colspan="2">
		<input type="checkbox" readonly="readonly"
			<?php if ($this->item->disclosure_enabled == 1) : ?>
			checked="checked"
			<?php endif; ?>
		/>
		<label><?php echo JText::_('COM_ROPO_DISCLOSURE_YES_LABEL') ?></label>
	</td>
</tr>
<tr>
	<td><?php echo JText::_('COM_ROPO_DISCLOSURE_RECIPIENT_LABEL') ?></td>
	<td><?php echo $this->item->disclosure_recipient ?></td>
</tr>
<tr>
	<td><?php echo JText::_('COM_ROPO_DISCLOSURE_PURPOSE_LABEL') ?></td>
	<td><?php echo $this->item->disclosure_purpose ?></td>
</tr>