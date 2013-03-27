<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted Access');
?>

<tr><th colspan="2"><?php echo JText::_('COM_ROPO_DATA_DURATION_AND_STORAGE') ?></th></tr>

<tr><th colspan="2"><?php echo JText::_('COM_ROPO_DATA_ESTABLISHED_TIME_LABEL') ?></th></tr>
<tr>
	<td colspan="2"><?php echo $this->item->data_established_time ?></td>
</tr>

<tr><th colspan="2"><?php echo JText::_('COM_ROPO_DATA_PERIOD_OF_STORAGE_FIELDSET') ?></th></tr>
<tr>
	<td><?php echo JText::_('COM_ROPO_DATA_STORAGE_PERIOD_LABEL') ?></td>
	<td><?php echo $this->item->data_storage_period ?></td>
</tr>
<tr>
	<td>
		<input type="checkbox" readonly="readonly"
			<?php if ($this->item->data_storage_legal_basis != '') : ?>
			checked="checked"
			<?php endif; ?>
			/>
		<label><?php echo JText::_('COM_ROPO_DATA_STORAGE_LEGAL_BASIS_LABEL') ?></label>
	</td>
	<td><?php echo $this->item->data_storage_legal_basis ?></td>
</tr>
<tr>
	<td>
		<input type="checkbox" readonly="readonly"
			<?php if ($this->item->data_storage_purpose != '') : ?>
			checked="checked"
			<?php endif; ?>
			/>
		<label><?php echo JText::_('COM_ROPO_DATA_STORAGE_PURPOSE_LABEL') ?></label>
	</td>
	<td><?php echo $this->item->data_storage_purpose ?></td>
</tr>

<tr><th colspan="2"><?php echo JText::_('COM_ROPO_DATA_PERIOD_OF_USAGE_FIELDSET') ?></th></tr>
<tr>
	<td><?php echo JText::_('COM_ROPO_DATA_USAGE_PERIOD_LABEL') ?></td>
	<td><?php echo $this->item->data_usage_period ?></td>
</tr>
<tr>
	<td>
		<input type="checkbox" readonly="readonly"
			<?php if ($this->item->data_usage_legal_basis != '') : ?>
			checked="checked"
			<?php endif; ?>
			/>
		<label><?php echo JText::_('COM_ROPO_DATA_USAGE_LEGAL_BASIS_LABEL') ?></label>
	</td>
	<td><?php echo $this->item->data_usage_legal_basis ?></td>
</tr>
<tr>
	<td>
		<input type="checkbox" readonly="readonly"
			<?php if ($this->item->data_usage_purpose != '') : ?>
			checked="checked"
			<?php endif; ?>
			/>
		<label><?php echo JText::_('COM_ROPO_DATA_USAGE_PURPOSE_LABEL') ?></label>
	</td>
	<td><?php echo $this->item->data_usage_purpose ?></td>
</tr>

<tr><th colspan="2"><?php echo JText::_('COM_ROPO_DATA_DETAILS_ON_DATA_RETENTION_FIELDSET') ?></th></tr>
<tr>
	<td colspan="2"><?php echo $this->item->data_details ?>&nbsp;</td>
</tr>