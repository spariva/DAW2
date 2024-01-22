"""╭────────────────── APLICANDO FUNCIÓN POR COMPRENSIÓN ──────────────────────╮
│ Utilizando listas por comprensión, cree una lista que contenga el resultado  │
│ de aplicar la función f(x) = 3x + 2 para el rango de x dado en los valores   │
│ de entrada.                                                                  │
│                                                                              │
│ Ejemplo: Si xmin=0 y xmax=5, la lista de valores resultante debería ser: [2, │
│ 5, 8, 11, 14]                                                                │
╰──────────────────────────────────────────────────────────────────────────────╯
┏━━━┳━━━━━━━━━━━┳━━━━━━━━━━━┳━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓
┃   ┃ (entrada) ┃ (entrada) ┃ (salida)                                  ┃
┃ # ┃ xmin: int ┃ xmax: int ┃ values: list                              ┃
┡━━━╇━━━━━━━━━━━╇━━━━━━━━━━━╇━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┩
│ 1 │ 0         │ 10        │ [2, 5, 8, 11, 14, 17, 20, 23, 26, 29, 32] │
│ 2 │ -7        │ 0         │ [-19, -16, -13, -10, -7, -4, -1, 2]       │
│ 3 │ 131       │ 134       │ [395, 398, 401, 404]                      │
│ 4 │ 0         │ 1         │ [2, 5]                                    │
└───┴───────────┴───────────┴───────────────────────────────────────────┘"""

def run(xmin: int, xmax: int) -> list:
    # TU CÓDIGO AQUÍ
    values = []

    for i in range (xmin, xmax+1):
        values.append((3 * i) + 2)

    return values

