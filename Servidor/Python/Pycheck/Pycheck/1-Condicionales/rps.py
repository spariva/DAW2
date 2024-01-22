# **********************
# PIEDRA, PAPEL O TIJERA
# **********************


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

if __name__ == '__main__':
    run('piedra', 'PAPEL')