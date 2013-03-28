<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

//Add Slide/toggle behavior
JHTML::_('behavior.framework',true);
$this->document->addScriptDeclaration('
	window.addEvent("domready", function( ){
		navAcc = new Accordion($("accordion"), "#accordion h2", "#accordion .content", {display: 0}  );
	});
');
?>

<h1><?php echo JText::_("COM_ROPO_SYSTEM")?></h1>

<div>
	<a href="<?php echo JRoute::_('index.php?option=com_ropo&view=publicsystem&id='.(int) $this->item->id); ?>&format=pdf&tmpl=component">
		<?php echo JText::_('COM_ROPO_CREATE_PDF') ?>
	</a>
</div>

<div id="accordion">
	<table style="table-layout: fixed; width: 100%;" id="publicsystem">
		<colgroup>
		    <col class="col1">
		    <col class="col2">
	  </colgroup>
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
