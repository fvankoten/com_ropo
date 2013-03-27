<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted Access');
?>

<tr><th colspan="2"><?php echo JText::_('COM_ROPO_RESTRICTION') ?></th></tr>
<tr>
	<td><?php echo JText::_('COM_ROPO_RESTRICTION_DETAILS_LABEL') ?></td>
	<td><?php echo $this->item->restriction_details ?></td>
</tr>
<tr>
	<td><?php echo JText::_('COM_ROPO_RESTRICTION_LEGAL_BASIS_LABEL') ?></td>
	<td><?php echo $this->item->restriction_legal_basis ?></td>
</tr>