# ****************
# SUMA HETEROGÉNEA
# ****************


def run(items: list) -> int:
    
    suma = 0
    
    for num in items:
        suma = suma + (int(num))

    return suma

if __name__ == '__main__':
    run([1, '2', 3, '4', 5])