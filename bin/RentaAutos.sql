-- -- - Borramos las tablas

DROP TABLE IF EXISTS cliente;
DROP TABLE IF EXISTS cliente2;
DROP TABLE IF EXISTS promocion;
DROP TABLE IF EXISTS ticket;
DROP TABLE IF EXISTS faccliente;
DROP TABLE IF EXISTS local;
DROP TABLE IF EXISTS garage;
DROP TABLE IF EXISTS empleado;
DROP TABLE IF EXISTS distribuidor;
DROP TABLE IF EXISTS mantenimiento;
DROP TABLE IF EXISTS seguro;
DROP TABLE IF EXISTS coche;
DROP TABLE IF EXISTS alquiler;


-- CREACION DE TABLAS

CREATE TABLE cliente(
    cli_rfc 	VARCHAR(13),
    cli_dni 	VARCHAR(20),
    nombre		VARCHAR(20),
    apaterno 	VARCHAR(15),
    amaterno 	VARCHAR(15),
    email 		VARCHAR(25),
    PRIMARY KEY (cli_rfc, cli_dni)
);

CREATE TABLE cliente2(
    cli_rfc 		VARCHAR(13),
    cli_dni 		VARCHAR(20),
    direccion 	VARCHAR(30),
    telefono 	VARCHAR(10),
    CONSTRAINT cliclie_fk FOREIGN KEY(cli_rfc, cli_dni) 
    REFERENCES cliente(cli_rfc, cli_dni)
);

CREATE TABLE promocion(
    id 		VARCHAR(8) PRIMARY KEY,
    nombre 		VARCHAR(15),
    tipo 		VARCHAR(20),
    costo 		DECIMAL(8,2),
    inicio 		DATE,
    fin 		DATE
);

CREATE TABLE ticket(
    folio 		VARCHAR(8) PRIMARY KEY,
    fecha 		DATE,
    cantidad 	DECIMAL(8,2),
    prom_id 	VARCHAR(8),
    CONSTRAINT protic_fk FOREIGN KEY (prom_id) 
    REFERENCES promocion(id)
);

CREATE TABLE faccliente(
    id 		VARCHAR(8) PRIMARY KEY,
    gasto_adi 	DECIMAL(8,2),
    iva 		DECIMAL(8,2),
    descuento 	DECIMAL(7,2),
    costo_total 	DECIMAL(8,2),
    cli_rfc 		VARCHAR(13),
    cli_dni 		VARCHAR(20),
    tic_fol 		VARCHAR(8),
    CONSTRAINT clifac_fk FOREIGN KEY (cli_rfc, cli_dni)
    REFERENCES cliente(cli_rfc, cli_dni),
    CONSTRAINT ticfac_fk FOREIGN KEY (tic_fol)
    REFERENCES ticket(folio)
);

CREATE TABLE local(
    id 		VARCHAR(8) PRIMARY KEY,
    nombre 		VARCHAR(15),
    direccion 	VARCHAR(40),
    telefono 	VARCHAR(10),
    email 		VARCHAR(30)
);

CREATE TABLE garage(
    id 		VARCHAR(8) PRIMARY KEY,
    direccion 	VARCHAR(40),
    telefono 	VARCHAR(10),
    email 		VARCHAR(30),
    capacidad 	INT,
    total_coches 	INT
);

CREATE TABLE empleado(
    rfc 		VARCHAR(13) PRIMARY KEY,
    nombre 		VARCHAR(15),
    apaterno 	VARCHAR(15),
    amaterno 	VARCHAR(15),
    puesto 		VARCHAR(15),
    telefono 	VARCHAR(10),
    loc_id 		VARCHAR(8),
    gar_id 		VARCHAR(8),
    jefe_id 		VARCHAR(13),
    CONSTRAINT locemp_fk FOREIGN KEY (loc_id) 
    REFERENCES local(id),
    CONSTRAINT garemp_fk FOREIGN KEY (gar_id)
    REFERENCES garage(id),
    CONSTRAINT empemp_fk FOREIGN KEY (jefe_id)
    REFERENCES empleado(rfc)
);

CREATE TABLE distribuidor(
    id 		VARCHAR(8) PRIMARY KEY,
    nombre 		VARCHAR(15),
    direccion 	VARCHAR(30),
    ciudad 		VARCHAR(15),
    telefono 	VARCHAR(10),
    email 		VARCHAR(20)
);

CREATE TABLE seguro(
    id 		VARCHAR(8) PRIMARY KEY,
    descripcion 	VARCHAR(50),
    tipo 		VARCHAR(15),
    costo 		DECIMAL(8,2),
    vigencia 	DATE
);

CREATE TABLE mantenimiento(
    id 		VARCHAR(8) PRIMARY KEY,
    fecha_ultima 	DATE,
    fecha_proxima 	DATE,
    gasto_combustible 	DECIMAL(8,2),
    refaccion 	DECIMAL(8,2),
    costo_total 	DECIMAL(8,2)
);

CREATE TABLE coche(
    matricula 	VARCHAR(9) PRIMARY KEY,
    madelo 		VARCHAR(20),
    marca 		VARCHAR(15),
    ocupantes 	INT,
    precioxdia 	DECIMAL(8,2),
    observaciones 	VARCHAR(40),
    factura 	VARCHAR(20),
    gar_id 		VARCHAR(8),
    seg_id 		VARCHAR(8),
    dist_id 		VARCHAR(8),
    mant_id 	VARCHAR(8),
    -- gar_id
    CONSTRAINT garco_fk FOREIGN KEY (gar_id)
    REFERENCES garage(id),
    -- seg_id
    CONSTRAINT segco_fk FOREIGN KEY (seg_id)
    REFERENCES seguro(id),
    -- dist_id
    CONSTRAINT distco_fk FOREIGN KEY (dist_id)
    REFERENCES distribuidor(id),
    -- mant_id
    CONSTRAINT manco_fk FOREIGN KEY (mant_id)
    REFERENCES mantenimiento(id)
);

CREATE TABLE alquiler(
    id 		VARCHAR(8) PRIMARY KEY,
    fecha_salida 	DATE,
    fecha_entrada 	DATE,
    tic_fol 		VARCHAR(8),
    matricula 	VARCHAR(9),
    CONSTRAINT ticalq_fk FOREIGN KEY (tic_fol)
    REFERENCES ticket(folio),
    CONSTRAINT matalq_fk FOREIGN KEY (matricula)
    REFERENCES coche(matricula)
);

-- -- -- -- - INSERTAR 5 REGISTROS EN CADA TABLA
-- insrtamos registros en la tabla cliente
INSERT INTO cliente VALUES ('MELM8305281H0','MELM000001','Mario','Merino','Lazaro','mmerino@hotmail.com');
INSERT INTO cliente VALUES ('RAPL9804123M2','RAPL000002','Luis','Ramirez','Perez','lramirez@hotmail.com');
INSERT INTO cliente VALUES ('CAVC7708221H0','CAVC000003','Carlos','Cabrera','Vergara','carlosc@hotmail.com');
INSERT INTO cliente VALUES ('CORL9805131N0','CORL000004','Luis Enrique','Coba','Roman','romanc@hotmail.com');
INSERT INTO cliente VALUES ('GAGJ7804142M0','GAGJ000005','Jesus','Garcia','Garcia','jesusg@hotmail.com');

-- -- -- -- --  insertamos registros en la tabla cliente2
INSERT INTO cliente2 VALUES ('RAPL9804123M2','RAPL000002','AV LAS AMERICAS AV BOYACA','2224789677');
INSERT INTO cliente2 VALUES ('MELM8305281H0','MELM000001','AUTOPISTA NORTE CALLE 153','2224785691');
INSERT INTO cliente2 VALUES ('CORL9805131N0','CORL000004','CARRERA 15 CALLE 100','2228566579');
INSERT INTO cliente2 VALUES ('GAGJ7804142M0','GAGJ000005','AUTOPISTA SUR CALLE 59 SUR','2227568479');
INSERT INTO cliente2 VALUES ('CAVC7708221H0','CAVC000003','CALLE 80 CARRERA 114','2226741589');


-- -- -- -- - insertamos registros en la tabla promocion
INSERT INTO promocion VALUES ('UNIX0001','udas','De la semana','450.75','17/05/2021','22/05/2021');
INSERT INTO promocion VALUES ('ALPA0002','udam','Del mes','350.75','1/06/2021','3/06/2021');
INSERT INTO promocion VALUES ('GAMA0003','udaa','Del año','650.75','1/01/2021','31/12/2021');
INSERT INTO promocion VALUES ('TERA0004','udaf','Fin de semana','250.75','3/05/2021','9/05/2021');
INSERT INTO promocion VALUES ('FERO0005','udids','Inicio de semana','150.75','10/05/2021','11/05/2021');



-- -- -- --  insertamos registros en la tabla ticket
INSERT INTO ticket VALUES ('0531','6/05/2021','02','GAMA0003');
INSERT INTO ticket VALUES ('7915','07/05/2021','03','TERA0004');
INSERT INTO ticket VALUES ('4582','10/05/2021','01','FERO0005');
INSERT INTO ticket VALUES ('7892','02/06/2021','02','ALPA0002');
INSERT INTO ticket VALUES ('4785','18/05/2021','04','UNIX0001');


-- -- -- --  insertamos registros en la tabla faccliente
INSERT INTO faccliente VALUES ('000011','320.25','15.28','110.5','2222.03','MELM8305281H0','MELM000001','7915');
INSERT INTO faccliente VALUES ('000022','349.50','17.45','125.78','5489.29','GAGJ7804142M0','GAGJ000005','4582');
INSERT INTO faccliente VALUES ('000033','0','10','158.75','9563','RAPL9804123M2','RAPL000002','0531');
INSERT INTO faccliente VALUES ('000044','489','80','110.2','5784.24','CORL9805131N0','CORL000004','4785');
INSERT INTO faccliente VALUES ('000055','1200','7.54','115.45','7845.36','CAVC7708221H0','CAVC000003','7892');


-- -- -- - insertamos registros en la tabla local
INSERT INTO local VALUES ('0001','Alquiler la uno','Avenida la sienega numero 03, puebla','2331182121','elalquilerlauno@hotmail.com');
INSERT INTO local VALUES ('0002','Alquiler la dos','Colonia centro Puebla 5 de mayo','2223456732','elalquilerdelados@gmail.com');
INSERT INTO local VALUES ('0003','Alquiler tres','Colonia san Francisco local 123, Puebla','2342459875','elalquilerlatres@Outlook.com');
INSERT INTO local VALUES ('0004','Alquiler cuatro','Avenida Juares local 245, Puebla','2365726609','elalquilerdelacuatro@Yahoo.com');
INSERT INTO local VALUES ('0005','Alquiler cinco','Cholula, Puebla centro 123','2481542478','elalquilerdelacinco@gmail.com');


-- -- -- - insertamos registros en la tabla garage
INSERT INTO garage VALUES ('001','colonia tacuballa Puebla','2334562457','garage001@gmail.com','55','100');
INSERT INTO garage VALUES ('002','avenida mira valles Puebla, num. 56','234765294','garage002@hotmail.com','65','100');
INSERT INTO garage VALUES ('003','colonia los serritos num. 09','2347654578','garage003@yahoo.com','40','100');
INSERT INTO garage VALUES ('004','calle obregon las animas 054','6542340900','garage004@hotmail.com','55','100');
INSERT INTO garage VALUES ('005','calle azteca numero 13','9875359988','garage005@gmail.com','45','100');


-- -- --  insertamos registros en la tabla empleado
INSERT INTO empleado VALUES ('PEHF003','FERNANDO','HUERTA','PEREZ','JEFE','2225641237','0001','001','PEHF003');
INSERT INTO empleado VALUES ('PEPJ001','JOSE','PEREZ','PEREZ','EMPLEADO','2224568971','0002','002','PEHF003');
INSERT INTO empleado VALUES ('MORF008','FELIPE','RAMIREZ','MORALES','JEFE','2224414546','0005','005','MORF008');
INSERT INTO empleado VALUES ('LOSR002','RAUL','SANCHEZ','LOPEZ','EMPLEADO','2228954723','0003','003','MORF008');
INSERT INTO empleado VALUES ('GAOA004','ANTONIO','ORTIZ','GARCIA','EMPLEADO','2221232425','0004','004','MORF008');


-- -- --  insertamos registros en la tabla distribuidor
INSERT INTO distribuidor VALUES ('ds01','Juan','colonia tacuballa num 03','Puebla','2222343656','dis01@gmail.com');
INSERT INTO distribuidor VALUES ('ds02','Manuel','av. albaro obregon','Veracruz','2346544576','dis02@hotmail.com');
INSERT INTO distribuidor VALUES ('ds03','Josè','av. carrillo num. 03','Guadalajara','2330003573','dis03@yahoo.com');
INSERT INTO distribuidor VALUES ('ds04','Alberto','colonia la sienega num. 98','Sonora','3453545290','dis04@Outlook.com');
INSERT INTO distribuidor VALUES ('ds05','beto','colonia las animas num. 45','Yucatan','5672349876','dis05@gmail.com');


-- -- -- - insertamos registros en la tabla seguro
INSERT INTO seguro VALUES('seg01','AMPLIA','VUELCO','1500.00','1/01/2025');
INSERT INTO seguro VALUES('seg02','AMPLIA','COLISION','1500.00','1/01/2024');
INSERT INTO seguro VALUES('seg03','AMPLIA PLUS','QUEMADURA','3000.00','1/01/2026');
INSERT INTO seguro VALUES('seg04','LIMITADA','VUELCO','900.00','1/01/2024');
INSERT INTO seguro VALUES('seg05','AMPLIA','ROBO','1500.00','1/01/2023');



-- -- --  insertamos registros en la tabla mantenimiento
INSERT INTO mantenimiento VALUES ('mante001','26/04/2021','19/05/2021','550','220.5','857.36');
INSERT INTO mantenimiento VALUES ('mante002','20/04/2021','26/05/2021','862','120.5','935.6');
INSERT INTO mantenimiento VALUES ('mante003','3/04/2021','29/05/2021','165','20.5','89');
INSERT INTO mantenimiento VALUES ('mante004','15/04/2021','21/05/2021','852','45','1020');
INSERT INTO mantenimiento VALUES ('mante005','1/04/2021','10/05/2021','652','452','1207.2');


-- -- -- - insertamos registros en la tabla coches
INSERT INTO coche VALUES ('CABA4532','2015','VMW','5','1500','Rayón costado derecho','impresa','001','seg01','ds01','mante001');
INSERT INTO coche VALUES ('RABA7634','2019','NISAN','10','3000','buen estado','eniada al correo','002','seg02','ds02','mante002');
INSERT INTO coche VALUES ('PXTW4532','2018','HONDA','8','2800','pocas fallas','impresa','003','seg03','ds03','mante003');
INSERT INTO coche VALUES ('GARA3542','2019','TOYOTA','15','3500','buen estado','impresa','004','seg04','ds04','mante004');
 INSERT INTO coche VALUES ('CHAP0997','2021','FORD','20','6000','buen estado','eniada al correo','005','seg05','ds05','mante005');


-- -- -- --  insertamos registros en la tabla alquiler
INSERT INTO alquiler VALUES ('alqui001','6/05/2021','07/05/2021','0531','CABA4532');
INSERT INTO alquiler VALUES ('alqui002','7/05/2021','08/05/2021','7915','RABA7634');
INSERT INTO alquiler VALUES ('alqui003','10/05/2021','10/05/2021','4582','PXTW4532');
INSERT INTO alquiler VALUES ('alqui004','02/06/2021','04/06/2021','7892','GARA3542');
INSERT INTO alquiler VALUES ('alqui005', DATE_FORMAT('18/05/2021','20/05/2021','4785','CHAP0997');



-- -- --  Actualizamos llaves primarias y doraneas con UPDATE
-- PRIMARIAS
UPDATE faccliente SET id='000001' WHERE id='000011';
UPDATE seguro SET id='seg001' WHERE id='seg01';
UPDATE empleado SET RFC='PEHF013' WHERE RFC='PEHF003';
UPDATE garage SET id='031' WHERE id='001';
UPDATE coche SET matricula='CARO4532' WHERE matricula='CABA4532';
-- FORANEAS
UPDATE coche SET mant_id='mante021' WHERE mant_id='mante001';
UPDATE faccliente SET tic_fol='1579' WHERE tic_fol='7915';
UPDATE empleado SET cli_id='C04' WHERE cli_id='C05';
UPDATE mantenimiento SET gar_id='002' WHERE gar_id='001';
UPDATE alquiler SET tic_fol='4531' WHERE tic_fol='0531';

-- -- -- -- -- -- borrar registros con DELETE-- -- -- -- -- -- 
DELETE FROM distribuidor WHERE id='ds01';
DELETE FROM garage WHERE id='005';
DELETE FROM seguro WHERE id='seg05';
DELETE FROM coche WHERE matricula='CHAP0997';
DELETE FROM promocion WHERE id='UNIX0001';


-- -- -- -- -- -- consultas sencillas con SELECT-- -- -- -- -- -- 
SELECT * FROM cliente2;
SELECT * FROM cliente;
SELECT * FROM empleado;
SELECT * FROM faccliente;
SELECT * FROM coche;
SELECT * FROM promocion;
SELECT * FROM tiket;
SELECT * FROM alquiler;
SELECT * FROM garage;
SELECT * FROM seguro;
SELECT * FROM mantenimiento;
SELECT * FROM local;
SELECT * FROM distribuidor;

SELECT id FROM facclientel;
SELECT id FROM promocion;
SELECT folio FROM ticket;
SELECT id FROM alquiler;
SELECT id FROM mantenimiento;
SELECT id FROM local;
SELECT rfc FROM empleado;
SELECT id FROM distribuidor;
SELECT id FROM garage;
SELECT id FROM seguro;
SELECT cli_rfc FROM cliente;
SELECT cli_rfc FROM cliente2;

SELECT cli_rfc, cli_dni FROM cliente2;
SELECT cli_rfc, cli_dni FROM cliente;
SELECT id, nombre FROM empleado;
SELECT matricula, marca FROM coche;
SELECT id, nombre FROM promocion;
SELECT id, direccion FROM garage;
SELECT id, nombre FROM local;
SELECT id, nombre FROM distribuidor;
SELECT id, refaccion FROM mantenimiento;
SELECT id, descripcion FROM seguro;
SELECT folio, fecha FROM ticket;
SELECT id, matricula FROM alquiler;
SELECT id, gasto_adi FROM faccliente;


-- -- -- -- -- -- SELECT 3 consultas con 3 tablas-- -- -- -- -- --   

SELECT cliente.cli_dni,  faccliente.descuento, ticket.cantidad FROM cliente, faccliente, ticket;
SELECT local.id, empleado.nombre, garage.direccion FROM local, empleado, garage WHERE empleado.nombre = 'JOSE';
SELECT mantenimiento.id, coche.matricula, alquiler.fecha_entrada FROM mantenimiento, coche, alquiler WHERE coche.matricula='CABA4532';

-- -- -- -- -- -- SELECT 3 consultas para procesos-- -- -- -- -- -- 
SELECT id, fech_salida, fech_entrada FROM alquiler WHERE costo>7000;
SELECT folio, fecha FROM ticket WHERE prom_id = (SELECT id FROM promocion WHERE costo>600);
SELECT matricula, modelo, marca FROM coche WHERE seg_id = (SELECT id FROM seguro WHERE vigencia='1/01/2023');



-- -- -- -- -- -- Respaldos-- -- -- -- -- -- 
-- Respaldo tablas
CREATE TABLE respaldo_garage AS (SELECT * FROM garage);
CREATE TABLE respaldo_cliente AS (SELECT * FROM cliente);
CREATE TABLE respaldo_faccliente AS (SELECT * FROM faccliente);

-- respaldo columnas
-- -- alquiler
ALTER TABLE alquiler ADD fecha_sal2 DATE;
UPDATE alquiler SET fecha_sal2=fecha_salida;
-- -- empleado
ALTER TABLE empleado ADD puesto2 VARCHAR(15);
UPDATE empleado SET puesto2=puesto;
-- -- garage
ALTER TABLE garage ADD capacidad2 INT;
UPDATE garage SET capacidad2=capacidad;

-- -- -- -- -- -- USUARIOS-- -- -- -- -- -- 
-- -Gerente
DROP USER gerente;
CREATE USER gerente DEFAULT TABLESPACE SYSTEM QUOTA 10000M
ON SYSTEM IDENTIFIED BY yoadministro;
GRANT ALL PRIVILEGES TO gerente;
CONNECT gerente/yoadministro;
SHOW USER;

-- -Subgerente
DROP USER subgerente;
CREATE USER subgerente IDENTIFIED BY yosuperviso;
GRANT CREATE SESSION TO subgerente;
GRANT SELECT, INSERT, UPDATE, DELETE ON gerente.cliente2 TO subgerente;
GRANT SELECT, INSERT, UPDATE, DELETE ON gerente.cliente TO subgerente;
GRANT SELECT, INSERT, UPDATE, DELETE ON gerente.faccliente TO subgerente;
GRANT SELECT, INSERT, UPDATE, DELETE ON gerente.coche TO subgerente;
GRANT SELECT, INSERT, UPDATE, DELETE ON gerente.promocion TO subgerente;
GRANT SELECT, INSERT, UPDATE, DELETE ON gerente.ticket TO subgerente;
GRANT SELECT, INSERT, UPDATE, DELETE ON gerente.alquiler TO subgerente;
GRANT SELECT, INSERT, UPDATE, DELETE ON gerente.mantenimiento TO subgerente;
GRANT SELECT, INSERT, UPDATE, DELETE ON gerente.local TO subgerente;
GRANT SELECT, INSERT, UPDATE, DELETE ON gerente.seguro TO subgerente;
GRANT SELECT, INSERT, UPDATE, DELETE ON gerente.garage TO subgerente;
GRANT SELECT, INSERT, UPDATE, DELETE ON gerente.distribuidor TO subgerente;

-- -Cliente
DROP USER cliente;
CREATE USER cliente IDENTIFIED BY yoreservo
GRANT CREATE SESSION TO cliente;
GRANT SELECT ON gerente.cliente TO cliente;
GRANT SELECT ON gerente.faccliente TO cliente;
GRANT SELECT ON gerente.garage TO cliente;
GRANT SELECT ON gerente.coche TO cliente;
GRANT SELECT ON gerente.seguro TO cliente;
GRANT SELECT ON gerente.mantenimiento TO cliente;
GRANT SELECT ON gerente.promocion TO cliente;
GRANT SELECT ON gerente.local TO cliente;



























