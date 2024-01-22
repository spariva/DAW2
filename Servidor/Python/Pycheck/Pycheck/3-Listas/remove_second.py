# *************************
# NO ME INTERESAN LOS PARES
# *************************


def run(items: list) -> list:

    salida = items.copy()
    largo =(len(salida) -1)

    for num in range(largo,-1,-1):

        if num%2 != 0:
            del salida[num]

    return salida


if __name__ == '__main__':
    run([1, 2, 1, 2, 1, 2])