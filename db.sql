/*DataBase creation*/

CREATE TABLE Municipio(
	provincia	varchar(25) NOT NULL,
    cod_mun		int,
    municipio	varchar(25) NOT NULL,
    PRIMARY KEY (cod_mun, municipio)
);

CREATE TABLE Mesa(
	cod_mesa	varchar(25),
    cod_mun		int,
    municipio	varchar(25),
    mesa		varchar(5)	NOT NULL,
    censo		int			NOT NULL,
    p_av		int			NOT NULL,
    s_av		int			NOT NULL,
    v_n			int			NOT NULL,
    v_b			int			NOT NULL,
    PRIMARY KEY (cod_mesa),
    FOREIGN KEY (cod_mun, municipio) REFERENCES Municipio(cod_mun, municipio)
);

CREATE TABLE Voto(
	cod_mesa	varchar(25),
    partido		varchar(25),
    votos		int			NOT NULL,
    PRIMARY KEY (cod_mesa, partido),
    FOREIGN KEY (cod_mesa) REFERENCES Mesa(cod_mesa)
);

/*SELECTS*/

/*Shows each party with they number of votes, order by numer of votes*/
SELECT partido, SUM(votos) AS Total_Votos FROM voto 
GROUP BY partido 
ORDER BY Total_Votos DESC;

/*Shows first and second advance for all provinces*/
SELECT SUM(p_av) AS Primer_Avance, SUM(s_av) AS Segundo_Avance FROM municipio JOIN
mesa ON provincia='LEON' AND municipio.cod_mun=mesa.cod_mun AND municipio.municipio=mesa.municipio
ORDER BY Segundo_Avance DESC;

/*Shows for each party number of votes for a given province*/
SELECT partido, SUM(voto.votos) AS Total_Votos FROM municipio JOIN
mesa ON municipio.provincia='LEON' AND municipio.cod_mun=mesa.cod_mun AND municipio.municipio=mesa.municipio JOIN
voto ON mesa.cod_mesa=voto.cod_mesa
GROUP BY partido
ORDER BY Total_Votos DESC;
