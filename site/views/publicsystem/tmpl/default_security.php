<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted Access');
?>

<tr class="level1"><th colspan="2"><?php echo JText::_('COM_ROPO_SECURITY_MEASURES') ?></th></tr>

<tr class="level2"><th colspan="2"><?php echo JText::_('COM_ROPO_SECURITY_CONFIDENTIALITY_FIELDSET') ?></th></tr>
<tr>
	<td class="col1"><?php echo JText::_('COM_ROPO_SECURITY_CONFIDENTIALITY_LABEL') ?></td>
	<td class="col2"><?php echo $this->item->security_confidentiality ?></td>
</tr>

<tr class="level2"><th colspan="2"><?php echo JText::_('COM_ROPO_SECURITY_INTEGRITY_FIELDSET') ?></th></tr>
<tr>
	<td class="col1"><?php echo JText::_('COM_ROPO_SECURITY_INTEGRITY_LABEL') ?></td>
	<td class="col2"><?php echo $this->item->security_integrity ?></td>
</tr>

<tr class="level2"><th colspan="2"><?php echo JText::_('COM_ROPO_SECURITY_AVAILABILITY_FIELDSET') ?></th></tr>
<tr>
	<td class="col1"><?php echo JText::_('COM_ROPO_SECURITY_AVAILABILITY_LABEL') ?></td>
	<td class="col2"><?php echo $this->item->security_availability ?></td>
</tr>

<tr class="level2"><th colspan="2"><?php echo JText::_('COM_ROPO_SECURITY_TRANSPARENCY_FIELDSET') ?></th></tr>
<tr>
	<td class="col1">
		<input type="checkbox" readonly="readonly"
			<?php if ($this->item->security_transparency_by_document == 1) : ?>
			checked="checked"
			<?php endif; ?>
			/>
		<label><?php echo JText::_('COM_ROPO_SECURITY_DOCUMENT_DETAILS_LABEL') ?></label>
	</td>
	<td class="col2"><?php echo $this->item->security_document_details ?></td>
</tr>
<tr>
	<td class="col1">
		<input type="checkbox" readonly="readonly"
			<?php if ($this->item->security_transparency_by_plan == 1) : ?>
			checked="checked"
			<?php endif; ?>
			/>
		<label><?php echo JText::_('COM_ROPO_SECURITY_PLAN_DETAILS_LABEL') ?></label>
	</td>
	<td class="col2"><?php echo $this->item->security_plan_details ?></td>
</tr>