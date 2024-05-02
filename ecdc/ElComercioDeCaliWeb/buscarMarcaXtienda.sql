							 DROP FUNCTION IF EXISTS buscarMarcaXtienda;
							DELIMITER $$
									CREATE FUNCTION buscarMarcaXtienda(idTienda INT) RETURNS VARCHAR(50)
									BEGIN 
										DECLARE fin INTEGER DEFAULT 0;
										DECLARE cadenaMarcas VARCHAR(50);
										DECLARE concatMarca VARCHAR(50);
										
										
										DECLARE marcas CURSOR for
										select distinct m.descripcion
											from  tienda_marca tm
											join marca m on m.id = tm.id_marca
										where tm.id_tienda = idtienda
										and tm.activo = 1;
										
										DECLARE CONTINUE HANDLER FOR NOT FOUND SET fin=1;
										DECLARE EXIT HANDLER FOR SQLEXCEPTION
										 BEGIN
										  INSERT INTO `resultado_proceso`(`trace`) VALUES ('Ha ocurrido un error!!!');
										  -- RESIGNAL;
										  -- ROLLBACK;
										 END; 
										 
										 set concatMarca = '';
										 
										 OPEN marcas;
										 get_marcas: LOOP
												
										    	FETCH marcas INTO cadenaMarcas;
												
													IF fin = 1 THEN
													   LEAVE get_marcas;
													END IF;
													
													set concatMarca = concat(concatMarca,'-',cadenaMarcas);
												
											 END LOOP get_marcas;	
											 
											 set concatMarca = RIGHT(concatMarca,LENGTH(concatMarca)-1);										 
										 
										 RETURN concatMarca;
										 
									END$$
							DELIMITER ;