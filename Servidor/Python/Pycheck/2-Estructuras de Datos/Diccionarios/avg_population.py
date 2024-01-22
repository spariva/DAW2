"""Partiendo de un diccionario de ciudades (claves) y poblaciones (valores) -suponiendo que estas ciudades  │
│ son las únicas que existen en el planeta- calcule el porcentaje de población relativo de cada una de      │
│ ellas con respecto al total, dando como salida un diccionario.                                            │
│                                                                                                           │
│ Obtenga la media de población con una precisión de 3 decimales.

(entrada)                                               ┃ (salida)                                          ┃
┃ # ┃ pdata: dict                                       ┃ avg_data: dict                                    ┃
┡━━━╇━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━╇━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┩
│ 1 │ {'Tokyo': 38140000, 'Delhi': 26454000,            │ {'Tokyo': 34.536, 'Delhi': 23.954, 'Shanghai':    │
│   │ 'Shanghai': 24484000, 'Mumbai': 21357000}         │ 22.171, 'Mumbai': 19.339}                         │
│ 2 │ {'Adeje': 49270, 'La Orotava': 42434, 'Los        │ {'Adeje': 40.035, 'La Orotava': 34.48, 'Los       │
│   │ Silos': 4644, 'Santa Úrsula': 15361, 'Tegueste':  │ Silos': 3.774, 'Santa Úrsula': 12.482,            │
│   │ 11359}                                            │ 'Tegueste': 9.23}                                 │
│ 3 │ {'Agaete': 5633, 'Gáldar': 24567, 'Telde':        │ {'Agaete': 4.246, 'Gáldar': 18.517, 'Telde':      │
│   │ 102472}                                           │ 77.237}                                           |"""

def diccionarioCiudades(diccionario):

    total = sum(diccionario.values())

    for valor in diccionario:
        diccionario[valor] = round((diccionario[valor] / total) * 100, 3)

    return diccionario