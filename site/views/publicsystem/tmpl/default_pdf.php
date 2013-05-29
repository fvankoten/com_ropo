<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
?>

<div>	
<?php echo JHtml::_(
							'image', 
							JUri::base().'media/com_ropo/images/llogo.jpg', 
							'logo', 
							array('width' => '100%')); ?>
</div>

<div id="accordion" style="margin-top: 1em;">
	<table style="table-layout: fixed; width: 100%;" id="publicsystem" class="pdf">
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