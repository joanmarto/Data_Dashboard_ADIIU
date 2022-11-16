import pandas as pd

def create_mesa_table(buffer):
    open("csv/Mesa.csv", "x") #Create file
    mes = buffer[['Codigo de mesa', 'Codigo municipio', 'Municipio','Mesa','Censo', 'Primer Avance', 'Segundo Avance', 'Votos Nulos', 'Votos Blanco']]
    mes = mes.drop_duplicates(subset='Codigo de mesa')
    #print(mes.to_string)
    mes.to_csv('csv/Mesa.csv', index=False)

def create_votos_table(buffer):
    open("csv/Votos.csv", "x") #Create file
    vot = buffer[['Codigo de mesa','Partido','Num Votos']]
    vot = vot.drop_duplicates(subset=['Codigo de mesa', 'Partido'])
    #print(vot.to_string)
    vot.to_csv('csv/Votos.csv', index=False)

def create_municipio_table(buffer):
    open("csv/Municipios.csv", "x") #Create file
    mun = buffer[['Provincia','Codigo municipio','Municipio']]
    mun = mun.drop_duplicates(subset=['Codigo municipio', 'Municipio'])
    #print(mun.to_string)
    mun.to_csv("csv/Municipios.csv", index=False)

if __name__ == "__main__":
    bf = pd.read_csv('csv/ResultadosElectorales2022.csv', encoding = "utf_8", sep=';')
    #print(bf.to_string)
    create_municipio_table(bf)
    create_votos_table(bf)
    create_mesa_table(bf)
