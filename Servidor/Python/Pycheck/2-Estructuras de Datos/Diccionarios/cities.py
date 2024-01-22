"""El dato de entrada a su programa es una cadena de texto con el siguiente formato:  <city>:<population>;<city>:<population>;<city>:<population>;....
El objetivo es conseguir obtener un diccionario donde las claves sean las ciudades y los valores sean los habitantes (como enteros). """

def diccionarioCiudades(cadena):

    diccionario = {} # Creo el diccionario

    conjunto = cadena.split(";") # Speparo en parejas ciudad-poblacion

    for par in conjunto: # Separo los elementos en dos distintos y ya los añado
        ciudad, poblacion = par.split(":")
        diccionario[ciudad] = int(poblacion)
        diccionario[ciudad] = int(poblacion.replace('_',''))

    return diccionario