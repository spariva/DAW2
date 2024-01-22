"""╭───────────────────────────────────────────── BORRANDO VALORES CLAVE ─────────────────────────────────────────────────╮
│ Dado un diccionario cuyos valores son listas, genere un diccionario nuevo donde se borre el contenido de dichas listas. │
│                                                                                                                         │
│ Resuelva el ejercicio utilizando diccionarios por comprensión.                                                          │
╰─────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────╯
┏━━━┳━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┳━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓
┃   ┃ (entrada)                                                ┃ (salida)                       ┃
┃ # ┃ items: dict                                              ┃ citems: dict                   ┃
┡━━━╇━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━╇━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┩
│ 1 │ {'C1': [10, 20, 30], 'C2': [20, 30, 40], 'C3': [12, 34]} │ {'C1': [], 'C2': [], 'C3': []} │
└───┴──────────────────────────────────────────────────────────┴────────────────────────────────┘"""

def run(items: dict) -> dict:
    # Use dictionary comprehension to create a new dictionary with the same keys but with all values replaced by empty lists
    citems = {key: [] for key in items}
    return citems