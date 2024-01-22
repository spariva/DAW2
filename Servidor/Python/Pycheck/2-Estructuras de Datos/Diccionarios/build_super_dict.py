"""╭─────────────────────────────────────────── DICCIONARIO EN CONSTRUCCIÓN ──────────────────────────────────────────────╮
│ Dada lista de listas con varios elementos, obtenga un diccionario donde las claves serán los primeros elementos de las  │
│ sublistas y los valores serán los restantes (como listas).                                                              │
╰─────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────╯
┏━━━┳━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┳━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓
┃   ┃ (entrada)                                                ┃ (salida)                                                 ┃
┃ # ┃ items: list                                              ┃ unpack_items: dict                                       ┃
┡━━━╇━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━╇━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┩
│ 1 │ [['Episode IV - A New Hope', 'May 25', 1977, 'George     │ {'Episode IV - A New Hope': ['May 25', 1977, 'George     │
│   │ Lucas'], ['Episode V - The Empire Strikes Back', 'May    │ Lucas'], 'Episode V - The Empire Strikes Back': ['May    │
│   │ 21', 1980], ['Episode VI - Return of the Jedi', 'May     │ 21', 1980], 'Episode VI - Return of the Jedi': ['May     │
│   │ 25', 1983]]                                              │ 25', 1983]}                                              │
└───┴──────────────────────────────────────────────────────────┴──────────────────────────────────────────────────────────┘"""

def run(items: list) -> dict:

    diccionario = {}
    
    for valores in items:
        diccionario[valores[0]]= valores[1:4]

    return diccionario
