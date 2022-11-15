CREATE TABLE Municipio(
	provincia	varchar(25) NOT NULL,
    cod_mun		int,
    municipio	varchar(25) NOT NULL,
    PRIMARY KEY (cod_mun)
);

CREATE TABLE Mesa(
	cod_mesa	varchar(25),
    cod_mun		int,
    mesa		varchar(5)	NOT NULL,
    censo		int			NOT NULL,
    p_av		int			NOT NULL,
    s_av		int			NOT NULL,
    v_n			int			NOT NULL,
    v_b			int			NOT NULL,
    PRIMARY KEY (cod_mesa),
    FOREIGN KEY (cod_mun) REFERENCES Municipio(cod_mun)
);

CREATE TABLE Voto(
	cod_mesa	varchar(25),
    partido		varchar(25),
    votos		int			NOT NULL,
    PRIMARY KEY (cod_mesa, partido),
    FOREIGN KEY (cod_mesa) REFERENCES Mesa(cod_mesa)
);