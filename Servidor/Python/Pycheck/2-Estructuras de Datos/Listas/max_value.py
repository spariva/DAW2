"""╭──────────────────────────────── VALOR MÁXIMO ────────────────────────────────╮
│ Dada una lista de valores numéricos enteros, obtenga su máximo valor.        │
│                                                                              │
│ Prohibido utilizar:                                                          │
│                                                                              │
│  • La función "built-in" min().                                              │
│  • La función "built-in" max().                                              │
│  • La función "built-in" sorted().                                           │
╰──────────────────────────────────────────────────────────────────────────────╯
┏━━━┳━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┳━━━━━━━━━━━━━━━━┓
┃   ┃ (entrada)                    ┃ (salida)       ┃
┃ # ┃ values: list                 ┃ max_value: int ┃
┡━━━╇━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━╇━━━━━━━━━━━━━━━━┩
│ 1 │ [-11, 10, -6, 15, -1]        │ 15             │
│ 2 │ [5, 9, -6, 9, -2, -9, -7, 2] │ 9              │
│ 3 │ [-7, -5, -5, -8, -3]         │ -3             │
└───┴──────────────────────────────┴────────────────┘"""

def run(values: list) -> int:

    max = values[0]
    
    for num in values:
        if num > max:
            max = num


    return max
