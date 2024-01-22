"""╭──────────────────── CALCULANDO EL FACTORIAL DE UN NÚMERO ─────────────────╮
│ Escriba una función que calcule el factorial de un número n. El factorial de │
│ un número n se define como:                                                  │
│                                                                              │
│                                                                              │
│  n! = n · (n - 1) · (n - 2) · ... · 1                                        │
│                                                                              │
│                                                                              │
│ Notas:                                                                       │
│                                                                              │
│  • 0! = 1                                                                    │
│  • El factorial de un número negativo no se puede calcular.                  │
╰──────────────────────────────────────────────────────────────────────────────╯
┏━━━┳━━━━━━━━━━━┳━━━━━━━━━━━┓
┃   ┃ (entrada) ┃ (salida)  ┃
┃ # ┃ n: int    ┃ fact: int ┃
┡━━━╇━━━━━━━━━━━╇━━━━━━━━━━━┩
│ 1 │ 5         │ 120       │
│ 2 │ 0         │ 1         │
│ 3 │ -1        │ None      │
└───┴───────────┴───────────┘"""

def factorial(num: int):

    resultado = num

    if resultado ==0:
        return 1
    
    if resultado < 0:
        return None

    for i in range(1,num):

        resultado *= (num - i)

    return resultado