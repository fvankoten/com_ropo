<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted Access');
?>

<tr><th colspan="2"><?php echo JText::_('COM_ROPO_PURPOSE') ?></th></tr>
<tr>
	<td><?php echo JText::_('COM_ROPO_PURPOSES_PURPOSE_LABEL') ?></td>
	<td><?php echo $this->item->purposes_purpose ?></td>
</tr>
<tr>
	<td colspan="2">
		<input type="checkbox" 
			<?php if ($this->item->purposes_established_by_law == 1) : ?>
			checked="checked"
			<?php endif; ?>
			/>
		<label><?php echo JText::_('COM_ROPO_PURPOSES_ESTABLISHED_BY_LAW_LABEL') ?></label>
	</td>
</tr>
<tr>
	<td><?php echo JText::_('COM_ROPO_PURPOSES_ESTABLISHED_BY_LAW_DESCRIPTION_LABEL') ?></td>
	<td><?php echo $this->item->purposes_established_by_law_description ?></td>
</tr>
<tr>
	<td colspan="2">
		<input type="checkbox" 
			<?php if ($this->item->	purposes_established_by_consent == 1) : ?>
			checked="checked"
			<?php endif; ?>
			/>
		<label><?php echo JText::_('COM_ROPO_PURPOSES_ESTABLISHED_BY_CONSENT_LABEL') ?></label>
	</td>
</tr>
<tr>
	<td><?php echo JText::_('COM_ROPO_PURPOSES_ESTABLISHED_BY_CONSENT_DESCRIPTION_LABEL') ?></td>
	<td><?php echo $this->item->purposes_established_by_consent_description ?></td>
</tr>