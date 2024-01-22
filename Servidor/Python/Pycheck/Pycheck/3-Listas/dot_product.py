# ****************
# PRODUCTO ESCALAR
# ****************


def run(vector1: list, vector2: list) -> float:

    resultado = 0

    if len(vector1) != len(vector2):
        return None
    
    for num1, num2 in zip(vector1, vector2):
        resultado += (num1 * num2)

    return resultado

if __name__ == '__main__':
    run([4, 3, 8, 1], [9, 2, 7, 3])