"""╭───────────────────────────── SUMA DE CUADRADOS ──────────────────────────────╮
│ Escriba una función en Python que reproduzca lo siguiente:                   │
│                                                                              │
│                                                                              │
│             2    2                                                           │
│  f(x, y) = x  + y                                                            │
│                                                                              │
╰──────────────────────────────────────────────────────────────────────────────╯
┏━━━┳━━━━━━━━━━━┳━━━━━━━━━━━┳━━━━━━━━━━━━━┓
┃   ┃ (entrada) ┃ (entrada) ┃ (salida)    ┃
┃ # ┃ x: int    ┃ y: int    ┃ result: int ┃
┡━━━╇━━━━━━━━━━━╇━━━━━━━━━━━╇━━━━━━━━━━━━━┩
│ 1 │ 3         │ 4         │ 25          │
│ 2 │ -5        │ -7        │ 74          │
│ 3 │ -2        │ 8         │ 68          │
└───┴───────────┴───────────┴─────────────┘"""


def f(num1: int , num2:int):

    num = (num1 * num1) + (num2* num2)

    return num