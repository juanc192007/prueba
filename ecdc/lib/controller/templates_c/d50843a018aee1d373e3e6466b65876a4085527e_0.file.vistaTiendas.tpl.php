<?php
/* Smarty version 3.1.34-dev-7, created on 2021-11-03 18:00:50
  from 'C:\xampp\htdocs\public_html\lib\controller\templates\vistaTiendas.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_6182c0421ed010_12352669',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd50843a018aee1d373e3e6466b65876a4085527e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\public_html\\lib\\controller\\templates\\vistaTiendas.tpl',
      1 => 1635958841,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6182c0421ed010_12352669 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\public_html\\smarty\\libs\\plugins\\modifier.replace.php','function'=>'smarty_modifier_replace',),));
?>
	<html>
				<head>
					<meta charset="utf-8">
				</head>
				
				<body>
					   <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tiendas']->value, 'item', false, 'key');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
					      <div class="nombre-comercio-center"><h4 class="nombre-comercio"><?php echo $_smarty_tpl->tpl_vars['tiendas']->value[$_smarty_tpl->tpl_vars['key']->value]['descripcion'];?>
</h4>
						  </div>
						  <div class="item" title="<?php echo $_smarty_tpl->tpl_vars['tiendas']->value[$_smarty_tpl->tpl_vars['key']->value]['descripcion'];?>
">
							  <div class="item-comercio">
							  <a href="<?php echo $_smarty_tpl->tpl_vars['tiendas']->value[$_smarty_tpl->tpl_vars['key']->value]['url'];?>
" target="_blank">
									<img class="img-item" src="img/clients/<?php echo $_smarty_tpl->tpl_vars['tiendas']->value[$_smarty_tpl->tpl_vars['key']->value]['logo'];?>
" alt="">
									<p class="shop-description">Click aqui para ver productos</p>
								</a>
							  </div>
							  <div class="item-descripcion">
							     <!-- <video width="90%" height="70%" controls> -->
								 <div id="video-item" class="video-item">
									 <video onclick="this.paused ? this.play() : this.pause();" controls>
									  <source src="http://localhost/public_html/multimedia/videos-tiendas/<?php echo $_smarty_tpl->tpl_vars['tiendas']->value[$_smarty_tpl->tpl_vars['key']->value]['desc_video'];?>
" type="video/webm" />
									  
									  <!--"http://elcomerciodecali.com.co/multimedia/videos-tiendas/<?php echo $_smarty_tpl->tpl_vars['tiendas']->value[$_smarty_tpl->tpl_vars['key']->value]['desc_video'];?>
" type="video/webm" />-->
									 </video>
								 </div>
							  
							  <div class="categorias-items">
								  <h4>Categorías: 
								  
								  <?php $_smarty_tpl->_assignInScope('categorias', explode("-",$_smarty_tpl->tpl_vars['tiendas']->value[$_smarty_tpl->tpl_vars['key']->value]['categorias']));?>
								
								  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categorias']->value, 'categoria');
$_smarty_tpl->tpl_vars['categoria']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['categoria']->value) {
$_smarty_tpl->tpl_vars['categoria']->do_else = false;
?>
								  
								 	<span><a class="enlace-categoria" href="<?php echo $_smarty_tpl->tpl_vars['tiendas']->value[$_smarty_tpl->tpl_vars['key']->value]['url_categoria'];?>
/<?php echo smarty_modifier_replace(mb_strtolower($_smarty_tpl->tpl_vars['categoria']->value, 'UTF-8')," ","-");?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['categoria']->value;?>
</a></span> 
								  
								  <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
								  
								  </h4>
							  </div>
							  
							  <div class="marcas-items">
								  <h4>Marcas: 
								  
								  <?php $_smarty_tpl->_assignInScope('marcas', explode("-",$_smarty_tpl->tpl_vars['tiendas']->value[$_smarty_tpl->tpl_vars['key']->value]['marcas']));?>
								
								  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['marcas']->value, 'marca');
$_smarty_tpl->tpl_vars['marca']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['marca']->value) {
$_smarty_tpl->tpl_vars['marca']->do_else = false;
?>
								  
								 	<span><a class="enlace-categoria" href="<?php echo $_smarty_tpl->tpl_vars['tiendas']->value[$_smarty_tpl->tpl_vars['key']->value]['url_categoria'];?>
/<?php echo smarty_modifier_replace(mb_strtolower($_smarty_tpl->tpl_vars['marca']->value, 'UTF-8')," ","-");?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['marca']->value;?>
</a></span> 
								  
								  <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
								  
								  </h4>
							  </div>
							  
							  
							  </div>
						  </div>
					   <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
				</body>
			
			


	</html><?php }
}
