<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted Access');
?>

<tr class="level1"><th colspan="2"><?php echo JText::_('COM_ROPO_APPLICANT') ?></th></tr>
<tr>
	<td class="col1"><?php echo JText::_('COM_ROPO_APPLICANT_FIRSTNAME_LABEL') ?></td>
	<td class="col2"><?php echo $this->item->applicant_firstname ?></td>
</tr>
<tr>
	<td class="col1"><?php echo JText::_('COM_ROPO_APPLICANT_LASTNAME_LABEL') ?></td>
	<td class="col2"><?php echo $this->item->applicant_lastname ?></td>
</tr>
<tr>
	<td class="col1"><?php echo JText::_('COM_ROPO_APPLICANT_APPLICATION_DATE_LABEL') ?></td>
	<td class="col2"><?php echo $this->item->applicant_application_date ?></td>
</tr>
<tr>
	<td class="col1"><?php echo JText::_('COM_ROPO_APPLICANT_SIGNATURE_LABEL') ?></td>
	<td class="col2"><?php echo $this->item->security_confidentiality ?></td>
</tr>