<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
?>
<h1><?php echo JText::_("COM_ROPO_SYSTEM")?></h1>

<div id="accordion">
	<table style="table-layout: fixed; width: 100%;">
		<tbody>
			<?php echo $this->loadTemplate('system');?>
			<?php echo $this->loadTemplate('identificationdata');?>
			<?php echo $this->loadTemplate('purpose');?>
			<?php echo $this->loadTemplate('source');?>
			<?php echo $this->loadTemplate('datasubject');?>
			<?php echo $this->loadTemplate('personaldata');?>
			<?php echo $this->loadTemplate('data');?>
			<?php echo $this->loadTemplate('restriction');?>
			<?php echo $this->loadTemplate('disclosure');?>
			<?php echo $this->loadTemplate('transfer');?>
			<?php echo $this->loadTemplate('linkedsystem');?>
			<?php echo $this->loadTemplate('security');?>
			<?php echo $this->loadTemplate('applicant');?>
		</tbody>
	</table>
</div>