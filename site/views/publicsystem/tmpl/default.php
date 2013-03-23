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

<div id="accordion">
	<h2><?php echo JText::_("COM_ROPO_CHAPTER_1") ?></h2>
	<div class="content">
		COM_ROPO_CHAPTER_1
	</div>

	<h2><?php echo JText::_("COM_ROPO_CHAPTER_2") ?></h2>
	<div class="content">
		COM_ROPO_CHAPTER_2
	</div>

	<h2><?php echo JText::_("COM_ROPO_CHAPTER_3") ?></h2>
	<div class="content">
		COM_ROPO_CHAPTER_3
	</div>

	<h2><?php echo JText::_("COM_ROPO_CHAPTER_4") ?></h2>
	<div class="content">
		COM_ROPO_CHAPTER_4
	</div>
	
	<h2><?php echo JText::_("COM_ROPO_CHAPTER_5") ?></h2>
	<div class="content">
		COM_ROPO_CHAPTER_5
	</div>
	
	<h2><?php echo JText::_("COM_ROPO_CHAPTER_6") ?></h2>
	<div class="content">
		COM_ROPO_CHAPTER_6
	</div>
	
	<h2><?php echo JText::_("COM_ROPO_CHAPTER_7") ?></h2>
	<div class="content">
		COM_ROPO_CHAPTER_7
	</div>
	
	<h2><?php echo JText::_("COM_ROPO_CHAPTER_8") ?></h2>
	<div class="content">
		COM_ROPO_CHAPTER_8
	</div>
	
	<h2><?php echo JText::_("COM_ROPO_CHAPTER_9") ?></h2>
	<div class="content">
		COM_ROPO_CHAPTER_9
	</div>
	
	<h2><?php echo JText::_("COM_ROPO_CHAPTER_10") ?></h2>
	<div class="content">
		COM_ROPO_CHAPTER_10
	</div>
	
	<h2><?php echo JText::_("COM_ROPO_CHAPTER_11") ?></h2>
	<div class="content">
		COM_ROPO_CHAPTER_11
	</div>
	
	<h2><?php echo JText::_("COM_ROPO_CHAPTER_12") ?></h2>
	<div class="content">
		COM_ROPO_CHAPTER_12
	</div>
	
	<h2><?php echo JText::_("COM_ROPO_CHAPTER_13") ?></h2>
	<div class="content">
		COM_ROPO_CHAPTER_13
	</div>
</div>
