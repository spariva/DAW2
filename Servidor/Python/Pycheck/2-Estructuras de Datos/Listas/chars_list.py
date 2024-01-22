"""╭────────────────────────────── DESPLEGANDO CARACTERES ──────────────────────────────────╮
│ Dada una lista de strings, obtenga otra lista que contenga todos los caracteres de cada   │
│ uno de los strings de la lista de entrada.                                                │
╰───────────────────────────────────────────────────────────────────────────────────────────╯
┏━━━┳━━━━━━━━━━━━━━━━━━━━━━━━┳━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓
┃   ┃ (entrada)              ┃ (salida)                                           ┃
┃ # ┃ texts: list            ┃ chars: list                                        ┃
┡━━━╇━━━━━━━━━━━━━━━━━━━━━━━━╇━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┩
│ 1 │ ['uno', 'dos', 'tres'] │ ['u', 'n', 'o', 'd', 'o', 's', 't', 'r', 'e', 's'] │
│ 2 │ ['', '', '']           │ []                                                 │
│ 3 │ ['abc', 'abc', 'abc']  │ ['a', 'b', 'c', 'a', 'b', 'c', 'a', 'b', 'c']      │
│ 4 │ ['XZ', 'VW']           │ ['X', 'Z', 'V', 'W']                               │
│ 5 │ ['alone']              │ ['a', 'l', 'o', 'n', 'e']                          │
└───┴────────────────────────┴────────────────────────────────────────────────────┘"""

def run(texts: list) -> list:

    chars = []

    for text in texts:
        for char in text:
            chars.append(char)

    return chars