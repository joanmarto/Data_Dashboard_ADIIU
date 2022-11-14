import pandas as pd

def create_mesa_table(buffer):
    #mesas = open("Mesa.csv", "x") #Create file
    mes = buffer[['Codigo de mesa', 'Codigo municipio','Mesa','Censo', 'Primer Avance', 'Segundo Avance', 'Votos Nulos', 'Votos Blanco']]
    mes = mes.drop_duplicates(subset='Codigo de mesa')
    print(mes.to_string)

def create_partido_table(buffer):
    #partidos = open("Partido.csv", "x") #Create file
    part = buffer[['Partido']]
    part = part.drop_duplicates(subset='Partido')
    print(part.to_string)

def create_votos_table(buffer):
    #votos = open("Votos.csv", "x") #Create file
    vot = buffer[['Codigo de mesa','Partido','Num Votos']]
    vot = vot.drop_duplicates(subset=['Codigo de mesa', 'Partido'])
    print(vot.to_string)

def create_municipio_table(buffer):
    #municipios = open("Municipios.csv", "x") #Create file
    mun = buffer[['Provincia','Codigo municipio','Municipio']]
    mun = mun.drop_duplicates(subset=['Codigo municipio'])
    print(mun.to_string)

if __name__ == "__main__":
    bf = pd.read_csv('ResultadosElectorales2022.csv', encoding = "utf-8", sep=';')
    #print(bf.to_string)
    print("################################################################")
    create_municipio_table(bf)
    print("################################################################")
    create_votos_table(bf)
    print("################################################################")
    create_mesa_table(bf)
    print("################################################################")
    create_partido_table(bf)
