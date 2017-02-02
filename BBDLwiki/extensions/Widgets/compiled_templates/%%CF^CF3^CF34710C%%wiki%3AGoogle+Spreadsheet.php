<?php /* Smarty version 2.6.18-dev, created on 2012-01-11 14:35:56
         compiled from wiki:Google+Spreadsheet */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'wiki:Google Spreadsheet', 1, false),array('modifier', 'default', 'wiki:Google Spreadsheet', 1, false),)), $this); ?>
<iframe width="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['width'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')))) ? $this->_run_mod_handler('default', true, $_tmp, 500) : smarty_modifier_default($_tmp, 500)); ?>
" height="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['height'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')))) ? $this->_run_mod_handler('default', true, $_tmp, 300) : smarty_modifier_default($_tmp, 300)); ?>
" frameborder="0" src="http://spreadsheets.google.com/pub?key=<?php echo ((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'urlpathinfo') : smarty_modifier_escape($_tmp, 'urlpathinfo')); ?>
<?php if (! $this->_tpl_vars['page']): ?>&output=html&widget=true<?php endif; ?>"></iframe>