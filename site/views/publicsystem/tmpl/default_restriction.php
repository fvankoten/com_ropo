<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted Access');
?>

<tr class="level1"><th colspan="2"><?php echo JText::_('COM_ROPO_RESTRICTION') ?></th></tr>
<tr>
	<td class="col1"><?php echo JText::_('COM_ROPO_RESTRICTION_DETAILS_LABEL') ?></td>
	<td class="col2"><?php echo $this->item->restriction_details ?></td>
</tr>
<tr>
	<td class="col1"><?php echo JText::_('COM_ROPO_RESTRICTION_LEGAL_BASIS_LABEL') ?></td>
	<td class="col2"><?php echo $this->item->restriction_legal_basis ?></td>
</tr>