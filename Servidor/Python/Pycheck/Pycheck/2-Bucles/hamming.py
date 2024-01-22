# *****************
# DISTANCIA HAMMING
# *****************


def run(text1: str, text2: str) -> int:
    acumulador = 0

    longitud1 = len(text1)
    longitud2 = len(text2)

    if longitud1 > longitud2:
        mayor = longitud1
        menor = longitud2
    else:
        mayor = longitud2
        menor = longitud1

    for num in range(0,menor):

        if(text1[num] != text2[num]):
            acumulador += 1

    
    acumulador = acumulador - (mayor-menor)

    return acumulador


if __name__ == '__main__':
    run('0001010011101', '0000110010001')