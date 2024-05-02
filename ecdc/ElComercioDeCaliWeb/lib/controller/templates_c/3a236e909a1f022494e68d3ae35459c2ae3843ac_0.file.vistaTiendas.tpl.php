<?php
/* Smarty version 3.1.34-dev-7, created on 2020-08-08 01:47:48
  from '/home/elcomerc/public_html/lib/controller/templates/vistaTiendas.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f2e04449f6976_66354674',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3a236e909a1f022494e68d3ae35459c2ae3843ac' => 
    array (
      0 => '/home/elcomerc/public_html/lib/controller/templates/vistaTiendas.tpl',
      1 => 1596851243,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f2e04449f6976_66354674 (Smarty_Internal_Template $_smarty_tpl) {
?>	<html>
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
</h4></div>
						  <div class="item" title="<?php echo $_smarty_tpl->tpl_vars['tiendas']->value[$_smarty_tpl->tpl_vars['key']->value]['descripcion'];?>
">
							  <div class="item-comercio">
							  <a href="<?php echo $_smarty_tpl->tpl_vars['tiendas']->value[$_smarty_tpl->tpl_vars['key']->value]['url'];?>
" target="_blank">
									<img class="img-item" src="img/clients/<?php echo $_smarty_tpl->tpl_vars['tiendas']->value[$_smarty_tpl->tpl_vars['key']->value]['logo'];?>
" alt="">
									<br>
									<br>
									<p class="shop-description">Click aqui para ver productos</p>
								</a>
							  </div>
							  <div class="item-descripcion">
							     <video width="90%" height="70%" controls>
								  <source src="http://elcomerciodecali.com.co/multimedia/videos-tiendas/<?php echo $_smarty_tpl->tpl_vars['tiendas']->value[$_smarty_tpl->tpl_vars['key']->value]['desc_video'];?>
" type="video/webm" />
								 </video>
							  
							  <div class="categorias-items">
								  <h4>Categorías: <span>ropa para hombre </span><span>ropa para mujer </span><span>ropa para niño</span>
								  <span>ropa para hombre </span><span>ropa para hombre </span><span>ropa para hombre </span><span>ropa para hombre </span><span>ropa para hombre </span></h4>
							  </div>
							  </div>
						  </div>
					   <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
				</body>
			
			


	</html><?php }
}
