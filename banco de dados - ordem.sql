CREATE SCHEMA ordem ;

use ordem;

CREATE TABLE `ordem`.`ordem` (
  `os` INT NOT NULL AUTO_INCREMENT,
  `data_criacao` DATETIME NOT NULL,
  `nome` VARCHAR(30) NOT NULL,
  `descricao_os` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`os`));


CREATE TABLE `ordem`.`ocorrencia` (
  `id_ocorrencia` INT NOT NULL,
  `ocorrencia` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`id_ocorrencia`));



CREATE TABLE `ordem`.`ordem_ocorrencia` (
  `fk_id_os` INT NOT NULL,
  `fk_id_ocorrencia` INT NOT NULL,
  PRIMARY KEY (`fk_id_os`, `fk_id_ocorrencia`),
  INDEX `fk_id_ocorrencia_idx` (`fk_id_ocorrencia` ASC) VISIBLE,
  CONSTRAINT `fk_id_os`
    FOREIGN KEY (`fk_id_os`)
    REFERENCES `ordem`.`ordem` (`os`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_id_ocorrencia`
    FOREIGN KEY (`fk_id_ocorrencia`)
    REFERENCES `ordem`.`ocorrencia` (`id_ocorrencia`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);

insert into ordem.ocorrencia(id_ocorrencia, ocorrencia) values
(1, 'Televisor Inoperante'),
(2, 'CPU Inoperante'),
(3, 'TECLADO Inoperante'),
(4, 'MOUSE Inoperante'),
(5, 'ESTABILIZADOR Inoperante'),
(6, 'CABO HDMI Inoperante'),
(7, 'CABO VGA Inoperante'),
(8, 'CABO P2 Inoperante'),
(9, 'INTERNET Inoperante'); 

insert into ordem.ordem(os, data_criacao, nome, descricao_os) values
(1, '2001-01-01 01:01:01', 'teste1', 'Televisor Inoperante'),
(2, '2002-02-02 02:02:02', 'teste2', 'CPU Inoperante'),
(3, '2003-03-03 03:03:03', 'teste3', 'TECLADO Inoperante'),
(4, '2004-04-04 04:04:04', 'teste4', 'MOUSE Inoperante'),
(5, '2005-05-05 05:05:05', 'teste5', 'ESTABILIZADOR Inoperante'),
(6, '2006-06-06 06:06:06', 'teste6', 'CABO HDMI Inoperante'),
(7, '2007-07-07 07:07:07', 'teste7', 'CABO VGA Inoperante'),
(8, '2008-08-08 08:08:08', 'teste8', 'CABO P2 Inoperante'),
(9, '2009-09-09 09:09:09', 'teste9', 'INTERNET Inoperante'); 