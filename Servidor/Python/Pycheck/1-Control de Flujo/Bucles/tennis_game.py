"""╭──────────────────────────────────────────── UN JUEGO AL TENIS ────────────────────────────────────────────╮
│ Escenario: Partido de Tenis. Dada una cadena de texto con letras A o B indicando si el jugador A ha       │
│ ganado un punto o si el jugador B ha ganado un punto, haga un programa en Python que determine quién ha   │
│ ganado el juego actual.                                                                                   │
│                                                                                                           │
│ Nota: Es obvio que el jugador que ha ganado el último punto del juego también ha ganado el juego, pero    │
│ nos interesa irlo calculando de forma secuencial para prepararnos de cara a ejercicios más completos.     │
╰───────────────────────────────────────────────────────────────────────────────────────────────────────────╯
┏━━━┳━━━━━━━━━━━━━━━━━━┳━━━━━━━━━━━━━┓
┃   ┃ (entrada)        ┃ (salida)    ┃
┃ # ┃ points: str      ┃ winner: str ┃
┡━━━╇━━━━━━━━━━━━━━━━━━╇━━━━━━━━━━━━━┩
│ 1 │ 'ABAABA'         │ 'A'         │
│ 2 │ 'BABABAABBB'     │ 'B'         │
│ 3 │ 'AAABA'          │ 'A'         │
│ 4 │ 'BBBAAAABABBAAA' │ 'A'         │
└───┴──────────────────┴─────────────┘"""

def run(points: str) -> str:
    # TU CÓDIGO AQUÍ

    num = len(points)
    puntosA = 0
    puntosB = 0

    while (num > 0):

        if (points[num] == 'A'):
            puntosA += 1
        else:
            puntosB += 1

        num -= 1

    if puntosA > puntosB:
        return 'A'
    else: 
        return 'B'

