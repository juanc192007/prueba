							 DROP FUNCTION IF EXISTS buscarCategoriaXtienda;
							DELIMITER $$
									CREATE FUNCTION buscarCategoriaXtienda(idTienda INT) RETURNS VARCHAR(50)
									BEGIN 
										DECLARE fin INTEGER DEFAULT 0;
										DECLARE cadenaCategorias VARCHAR(50);
										DECLARE concatCategoria VARCHAR(50);
										DECLARE concatCategoria2 VARCHAR(50);
										
										
										DECLARE categorias CURSOR for
										select distinct c.descripcion
											from tienda_categoria tc
											join categoria c on c.id = tc.id_categoria
										where tc.id_tienda = idtienda
										and tc.activo = 1;
										
										DECLARE CONTINUE HANDLER FOR NOT FOUND SET fin=1;
										DECLARE EXIT HANDLER FOR SQLEXCEPTION
										 BEGIN
										  INSERT INTO `resultado_proceso`(`trace`) VALUES ('Ha ocurrido un error!!!');
										  -- RESIGNAL;
										  -- ROLLBACK;
										 END; 
										 
										 set concatCategoria = '';
										 
										 OPEN categorias;
										 get_categorias: LOOP
												
										    	FETCH categorias INTO cadenaCategorias;
												
													IF fin = 1 THEN
													   LEAVE get_categorias;
													END IF;
													
													set concatCategoria = concat(concatCategoria,'-',cadenaCategorias);
												
											 END LOOP get_categorias;	
											 
											 set concatCategoria = RIGHT(concatCategoria,LENGTH(concatCategoria)-1);										 
										 
										 RETURN concatCategoria;
										 
									END$$
							DELIMITER ;