							 DROP FUNCTION IF EXISTS buscarCategoriaXtienda;
							DELIMITER $$
									CREATE FUNCTION buscarCategoriaXtienda(idTienda INT) RETURNS VARCHAR(50)
									BEGIN 
										DECLARE fin INTEGER DEFAULT 0;
										DECLARE cadenaCategorias VARCHAR(50);
										DECLARE concatCategoria VARCHAR(50);
										
										DECLARE categorias CURSOR(idtienda INT) for
										select distinct c.descripcion
											from tienda_categoria tc
											join categoria c on c.id = tc.id_categoria
										where tc.id_tienda = idtienda
										and tc.activo = 1;
										
										DECLARE CONTINUE HANDLER FOR NOT FOUND SET fin=1;
										-- DECLARE EXIT HANDLER FOR SQLEXCEPTION
										 -- BEGIN
										  -- SHOW ERRORS LIMIT 1;
										  -- RESIGNAL;
										  -- ROLLBACK;
										 -- END; 
										 
										 INSERT INTO `resultado_proceso`(`id_proceso`, `trace`) VALUES ('1');
										 
										 -- OPEN categorias(idTienda);
										 -- get_categorias: LOOP
												
										    	-- FETCH categorias INTO cadenaCategorias;
												
												-- INSERT INTO `resultado_proceso`(`id_proceso`, `trace`) VALUES (2,'2');
													
													-- IF fin = 1 THEN
													   -- LEAVE get_categorias;
													-- END IF;
													
												-- SELECT CONCAT(concatCategoria,'-',cadenaCategorias) INTO concatCategoria;
										 
											 -- END LOOP get_categorias;		
										 
										 -- CLOSE categorias; 
										 set concatCategoria = 'abc';
										  INSERT INTO `resultado_proceso`(`id_proceso`, `trace`) VALUES (concatCategoria);
										 
										 RETURN concatCategoria;
										 
									END$$
							DELIMITER ;
