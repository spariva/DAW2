"""────────────────────────────────────────────────────────────── NÚMEROS PRIMOS ───────────────────────────────────────────────────────────────╮
│ Determine si un número dado es un número primo.                                                                                             │
╰─────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────╯
┏━━━┳━━━━━━━━━━━┳━━━━━━━━━━━━━━━┓
┃   ┃ (entrada) ┃ (salida)      ┃
┃ # ┃ n: int    ┃ isprime: bool ┃
┡━━━╇━━━━━━━━━━━╇━━━━━━━━━━━━━━━┩
│ 1 │ 2         │ True          │
│ 2 │ 3         │ True          │
│ 3 │ 10        │ False         │
│ 4 │ 11        │ True          │
│ 5 │ 27        │ False         │
│ 6 │ 31        │ True          │
│ 7 │ 55        │ False         │
│ 8 │ 67        │ True          │
└───┴───────────┴───────────────┘"""

def run(points: str) -> str:
    # TU CÓDIGO AQUÍ

    num = len(points) -1
    puntosA = 0
    puntosB = 0

    while (num >= 0):

        if (points[num] == 'A'):
            puntosA += 1
        else:
            puntosB += 1

        num -= 1

    if puntosA > puntosB:
        return 'A'
    else: 
        return 'B'

if __name__ == '__main__':
    run('ABAABA')