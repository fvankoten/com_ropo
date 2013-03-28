<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted Access');
?>

<tr class="level1"><th colspan="2"><?php echo JText::_('COM_ROPO_DATASUBJECT') ?></th></tr>
<tr>
	<td class="col1">
		<input type="checkbox" readonly="readonly"
			<?php if ($this->item->datasubject_civil_servants == 1) : ?>
			checked="checked"
			<?php endif; ?>
			/>
		<label><?php echo JText::_('COM_ROPO_DATASUBJECT_CIVIL_SERVANTS_LABEL') ?></label>
	</td>
	<td class="col2">	
		<input type="checkbox" readonly="readonly"
			<?php if ($this->item->datasubject_shareholders == 1) : ?>
			checked="checked"
			<?php endif; ?>
			/>
		<label><?php echo JText::_('COM_ROPO_DATASUBJECT_SHAREHOLDERS_LABEL') ?></label>
	</td>
</tr>
<tr>
	<td class="col1">
		<input type="checkbox" readonly="readonly"
			<?php if ($this->item->datasubject_clients == 1) : ?>
			checked="checked"
			<?php endif; ?>
			/>
		<label><?php echo JText::_('COM_ROPO_DATASUBJECT_CLIENTS_LABEL') ?></label>
	</td>
	<td class="col2">	
		<input type="checkbox" readonly="readonly"
			<?php if ($this->item->datasubject_social_assistence_users == 1) : ?>
			checked="checked"
			<?php endif; ?>
			/>
		<label><?php echo JText::_('COM_ROPO_DATASUBJECT_SOCIAL_ASSISTENCE_USERS_LABEL') ?></label>
	</td>
</tr>
<tr>
	<td class="col1">
		<input type="checkbox" readonly="readonly"
			<?php if ($this->item->datasubject_employees == 1) : ?>
			checked="checked"
			<?php endif; ?>
			/>
		<label><?php echo JText::_('COM_ROPO_DATASUBJECT_EMPLOYEES_LABEL') ?></label>
	</td>
	<td class="col2">	
		<input type="checkbox" readonly="readonly"
			<?php if ($this->item->datasubject_students == 1) : ?>
			checked="checked"
			<?php endif; ?>
			/>
		<label><?php echo JText::_('COM_ROPO_DATASUBJECT_STUDENTS_LABEL') ?></label>
	</td>
</tr>
<tr>
	<td class="col1">
		<input type="checkbox" readonly="readonly"
			<?php if ($this->item->datasubject_members == 1) : ?>
			checked="checked"
			<?php endif; ?>
			/>
		<label><?php echo JText::_('COM_ROPO_DATASUBJECT_MEMBERS_LABEL') ?></label>
	</td>
	<td class="col2">	
		<input type="checkbox" readonly="readonly"
			<?php if ($this->item->datasubject_suppliers == 1) : ?>
			checked="checked"
			<?php endif; ?>
			/>
		<label><?php echo JText::_('COM_ROPO_DATASUBJECT_SUPPLIERS_LABEL') ?></label>
	</td>
</tr>
<tr>
	<td colspan="2" class="col1">
		<input type="checkbox" readonly="readonly"
			<?php if ($this->item->datasubject_patients == 1) : ?>
			checked="checked"
			<?php endif; ?>
			/>
		<label><?php echo JText::_('COM_ROPO_DATASUBJECT_PATIENTS_LABEL') ?></label>
	</td>
</tr>
<tr>
	<td class="col1">
		<input type="checkbox" readonly="readonly"
			<?php if ($this->item->datasubject_other != '') : ?>
			checked="checked"
			<?php endif; ?>
			/>
		<label><?php echo JText::_('COM_ROPO_DATASUBJECT_OTHER_LABEL') ?></label>
	</td>
	<td class="col2"><?php echo $this->item->datasubject_other ?></td>
</tr>