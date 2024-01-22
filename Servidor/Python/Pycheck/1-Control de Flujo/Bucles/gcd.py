"""╭──────────────────────────── MÁXIMO COMÚN DIVISOR ────────────────────────────╮
│ Encuentre el máximo común divisor entre dos números enteros.                 │
│                                                                              │
│ NOTAS:                                                                       │
│                                                                              │
│  • No es necesario utilizar ningún algoritmo existente.                      │
│  • Basta con probar divisores.                                               │
╰──────────────────────────────────────────────────────────────────────────────╯
┏━━━┳━━━━━━━━━━━┳━━━━━━━━━━━┳━━━━━━━━━━━━━━━━┓
┃   ┃ (entrada) ┃ (entrada) ┃ (salida)       ┃
┃ # ┃ a: int    ┃ b: int    ┃ gcd_value: int ┃
┡━━━╇━━━━━━━━━━━╇━━━━━━━━━━━╇━━━━━━━━━━━━━━━━┩
│ 1 │ 1         │ 1         │ 1              │
│ 2 │ 3         │ 7         │ 1              │
│ 3 │ 46        │ 64        │ 2              │
│ 4 │ 12        │ 44        │ 4              │
│ 5 │ 28        │ 91        │ 7              │
└───┴───────────┴───────────┴────────────────┘"""

def run(a: int, b: int) -> int:

    if a > b:
        x = b
    else:
        x = a

    for num in range(x,0,-1):

        if(a%num == 0):
            if(b%num == 0):
                return num
            
    return 0


