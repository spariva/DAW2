# *****************
# UN JUEGO AL TENIS
# *****************


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