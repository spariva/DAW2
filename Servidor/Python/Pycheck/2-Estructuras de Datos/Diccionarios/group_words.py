"""╭────────────────────────────────────────────────── AGRUPANDO PALABRAS ───────────────────────────────────────────────────╮
│ Dada una lista de palabras, agrúpelas por su letra inicial a través de un diccionario de listas.                        │
╰─────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────╯
┏━━━┳━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┳━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓
┃   ┃ (entrada)                                                ┃ (salida)                                                 ┃
┃ # ┃ words: list                                              ┃ group_words: dict                                        ┃
┡━━━╇━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━╇━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┩
│ 1 │ ['mesa', 'móvil', 'barco', 'coche', 'avión', 'bandeja',  │ {'m': ['mesa', 'móvil', 'monitor'], 'b': ['barco',       │
│   │ 'casa', 'monitor', 'carretera', 'arco']                  │ 'bandeja'], 'c': ['coche', 'casa', 'carretera'], 'a':    │
│   │                                                          │ ['avión', 'arco']}                                       │
└───┴──────────────────────────────────────────────────────────┴──────────────────────────────────────────────────────────┘"""


def run(words: list) -> dict:
    agrupados = {}

    for word in words:
        inicial = word[0]
        if inicial in agrupados:
            agrupados[inicial].append(word)
        else:
            agrupados[inicial] = [word]

    return agrupados