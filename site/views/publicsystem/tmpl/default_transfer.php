<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted Access');
?>

<tr><th colspan="2"><?php echo JText::_('COM_ROPO_TRANSFER') ?></th></tr>
<tr>
	<td colspan="2">
		<input type="checkbox" readonly="readonly"
			<?php if ($this->item->transfer_enabled == 0) : ?>
			checked="checked"
			<?php endif; ?>
		/>
		<label><?php echo JText::_('COM_ROPO_TRANSFER_NO_LABEL') ?></label>
	</td>
</tr>
<tr>
	<td colspan="2">
		<input type="checkbox" readonly="readonly"
			<?php if ($this->item->transfer_enabled == 1) : ?>
			checked="checked"
			<?php endif; ?>
		/>
		<label><?php echo JText::_('COM_ROPO_TRANSFER_YES_LABEL') ?></label>
	</td>
</tr>
<tr>
	<td><?php echo JText::_('COM_ROPO_TRANSFER_COUNTRY_LABEL') ?></td>
	<td><?php echo $this->item->transfer_country ?></td>
</tr>
<tr>
	<td><?php echo JText::_('COM_ROPO_TRANSFER_RECIPIENT_LABEL') ?></td>
	<td><?php echo $this->item->transfer_recipient ?></td>
</tr>
<tr>
	<td><?php echo JText::_('COM_ROPO_TRANSFER_FOREIGN_USER_LABEL') ?></td>
	<td><?php echo $this->item->transfer_foreign_user ?></td>
</tr>
<tr>
	<td><?php echo JText::_('COM_ROPO_TRANSFER_PURPOSE_LABEL') ?></td>
	<td><?php echo $this->item->transfer_purpose ?></td>
</tr>
<tr>
	<td><?php echo JText::_('COM_ROPO_TRANSFER_LEGAL_BASIS_LABEL') ?></td>
	<td><?php echo $this->item->transfer_legal_basis ?></td>
</tr>
<tr>
	<td rowspan="3"><?php echo JText::_('COM_ROPO_TRANSFER_FREQUENCY_LABEL') ?></td>
	<td>
		<input type="radio" readonly="readonly"
			<?php if ($this->item->transfer_frequency == 'ONCE') : ?>
			checked="checked"
			<?php endif; ?>
		/>
		<label><?php echo JText::_('COM_ROPO_TRANSFER_FREQUENCY_ONCE') ?></label>
	</td>
</tr>
<tr>
	<td>
		<input type="radio" readonly="readonly"
			<?php if ($this->item->transfer_frequency == 'CONTINUOUSLY') : ?>
			checked="checked"
			<?php endif; ?>
		/>
		<label><?php echo JText::_('COM_ROPO_TRANSFER_FREQUENCY_CONTINUOUSLY') ?></label>
	</td>
</tr>
<tr>
	<td>
		<input type="radio" readonly="readonly"
			<?php if ($this->item->transfer_frequency == 'PERIODICALLY') : ?>
			checked="checked"
			<?php endif; ?>
		/>
		<label>
			<?php echo JText::_('COM_ROPO_TRANSFER_FREQUENCY_PERIODICALLY') ?>
			<?php echo JText::sprintf('COM_ROPO_TRANSFER_EACH_LABEL', $this->item->transfer_frequency ? $this->item->transfer_period : '_') ?>
		</label>
		
	</td>
</tr>
<tr>
	<td><?php echo JText::_('COM_ROPO_TRANSFER_AUTHORIZATION_LABEL') ?></td>
	<td><?php echo $this->item->transfer_authorization ?></td>
</tr>