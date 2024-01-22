"""╭───────────────────────────────────────────────── LA CLAVE ES LA CLAVE ──────────────────────────────────────────────────╮
│ A partir de un diccionario, obtenga un nuevo diccionario eliminando los espacios de sus claves respetando los valores   │
│ correspondientes.                                                                                                       │
╰─────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────╯
┏━━━┳━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┳━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓
┃   ┃ (entrada)                                                ┃ (salida)                                                 ┃
┃ # ┃ items: dict                                              ┃ fitems: dict                                             ┃
┡━━━╇━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━╇━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┩
│ 1 │ {'S  001': ['Math', 'Science'], 'S    002': ['Math',     │ {'S001': ['Math', 'Science'], 'S002': ['Math',           │
│   │ 'English']}                                              │ 'English']}                                              │
└───┴──────────────────────────────────────────────────────────┴─────────────────────────────────────────────────────"""


def run(items: dict) -> dict:
    # Use dictionary comprehension to create a new dictionary with the same values but with all spaces removed from the keys
    fitems = {key.replace(' ', ''): value for key, value in items.items()}
    return fitems
