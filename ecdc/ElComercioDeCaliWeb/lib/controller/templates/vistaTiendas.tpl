	<html>
				<head>
					<meta charset="utf-8">
				</head>
				
				<body>
					   {foreach key=key item=item from=$tiendas}
					      <div class="nombre-comercio-center"><h4 class="nombre-comercio">{$tiendas[$key]['descripcion']}</h4>
						  </div>
						  <div class="item" title="{$tiendas[$key]['descripcion']}">
							  <div class="item-comercio">
							  <a href="{$tiendas[$key]['url']}" target="_blank">
									<img class="img-item" src="img/clients/{$tiendas[$key]['logo']}" alt="">
									<p class="shop-description">Click aqui para ver productos</p>
								</a>
							  </div>
							  <div class="item-descripcion">
							     <!-- <video width="90%" height="70%" controls> -->
								 <div id="video-item" class="video-item">
									 <video onclick="this.paused ? this.play() : this.pause();" controls>
									  <source src="http://localhost/public_html/multimedia/videos-tiendas/{$tiendas[$key]['desc_video']}" type="video/webm" />
									  
									  <!--"http://elcomerciodecali.com.co/multimedia/videos-tiendas/{$tiendas[$key]['desc_video']}" type="video/webm" />-->
									 </video>
								 </div>
							  
							  <div class="categorias-items">
								  <h4>Categorías: 
								  
								  {assign var=categorias value="-"|explode:$tiendas[$key]['categorias']}
								
								  {foreach from=$categorias item=categoria}
								  
								 	<span><a class="enlace-categoria" href="{$tiendas[$key]['url_categoria']}/{$categoria|lower|replace:" ":"-"}" target="_blank">{$categoria}</a></span> 
								  
								  {/foreach}
								  
								  </h4>
							  </div>
							  
							  <div class="marcas-items">
								  <h4>Marcas: 
								  
								  {assign var=marcas value="-"|explode:$tiendas[$key]['marcas']}
								
								  {foreach from=$marcas item=marca}
								  
								 	<span><a class="enlace-categoria" href="{$tiendas[$key]['url_categoria']}/{$marca|lower|replace:" ":"-"}" target="_blank">{$marca}</a></span> 
								  
								  {/foreach}
								  
								  </h4>
							  </div>
							  
							  
							  </div>
						  </div>
					   {/foreach}
				</body>
			
			


	</html>