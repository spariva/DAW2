# *********************************
# APLICANDO FUNCIÓN POR COMPRENSIÓN
# *********************************


def run(xmin: int, xmax: int) -> list:

    values = []

    for i in range (xmin, xmax +1):
        values.append((3 * i) + 2)

    return values


if __name__ == '__main__':
    run(0, 10)