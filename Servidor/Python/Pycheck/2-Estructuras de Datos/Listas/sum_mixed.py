"""╭────────────────────────────── SUMA HETEROGÉNEA ──────────────────────────────╮
│ Dada una lista de enteros y enteros como cadenas de texto, calcule la suma   │
│ de todos los valores de la lista como si todos sus elementos fueran números. │
╰──────────────────────────────────────────────────────────────────────────────╯
┏━━━┳━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┳━━━━━━━━━━━━━━━━┓
┃   ┃ (entrada)                                             ┃ (salida)       ┃
┃ # ┃ items: list                                           ┃ sum_items: int ┃
┡━━━╇━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━╇━━━━━━━━━━━━━━━━┩
│ 1 │ [1, '2', 3, '4', 5]                                   │ 15             │
│ 2 │ ['0', '-1', '-2', '-3', '-4', '-5']                   │ -15            │
│ 3 │ [100, 90, 80, 70, '60', '50', '40', '30', '20', '10'] │ 550            │
└───┴───────────────────────────────────────────────────────┴────────────────┘"""

def run(items: list) -> int:
    
    suma = 0
    
    for num in items:
        suma = suma + (int(num))

    return suma