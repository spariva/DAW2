"""Acepte la opción de dos jugadoras en Piedra-Papel-Tijera y decida el resultado final.                                                       │
│                                                                                                                                             │
│ NOTAS:                                                                                                                                      │
│                                                                                                                                             │
│  • La entrada siempre vendrá en forma de string con valores 'piedra', 'papel' o 'tijera', pero puede estar en mayúsculas, minúsculas o      │
│    mezcla de ellas.                                                                                                                         │
│  • La salida deberá de ser un valor numérico entero:                                                                                        │
│     • 1 si gana la primera jugadora.                                                                                                        │
│     • 2 si gana la segunda jugadora.                                                                                                        │
│     • 0 si hay empate.                                                                                                                      │
╰─────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────╯
┏━━━┳━━━━━━━━━━━━━━┳━━━━━━━━━━━━━━┳━━━━━━━━━━━━━┓
┃   ┃ (entrada)    ┃ (entrada)    ┃ (salida)    ┃
┃ # ┃ choice1: str ┃ choice2: str ┃ winner: int ┃
┡━━━╇━━━━━━━━━━━━━━╇━━━━━━━━━━━━━━╇━━━━━━━━━━━━━┩
│ 1 │ 'piedra'     │ 'PAPEL'      │ 2           │
│ 2 │ 'tijera'     │ 'papel'      │ 1           │
│ 3 │ 'piedra'     │ 'papel'      │ 2           │
│ 4 │ 'TIJERA'     │ 'Piedra'     │ 2           │
│ 5 │ 'papel'      │ 'tijera'     │ 2           │
│ 6 │ 'papel'      │ 'papel'      │ 0           │
│ 7 │ 'tijera'     │ 'TIJERA'     │ 0           │
└───┴──────────────┴──────────────┴─────────────┘"""

def run(choice1: str, choice2: str) -> int:

    choice1 = choice1.lower()
    choice2 = choice2.lower()

    if choice1 == 'piedra':

        if choice2 == 'piedra':

            winner = 0
        
        if choice2 == 'papel':

            winner = 2

        if choice2 == 'tijera':
    
            winner = 1

    if choice1 == 'papel':

        if choice2 == 'piedra':

            winner = 1

        if choice2 == 'papel':

            winner = 0

        if choice2 == 'tijera':

            winner = 2
    
    if choice1 == 'tijera':

        if choice2 == 'piedra':

            winner = 2

        if choice2 == 'papel':

            winner = 1

        if choice2 == 'tijera':

            winner = 0


    return winner