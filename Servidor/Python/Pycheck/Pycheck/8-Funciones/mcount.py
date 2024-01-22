# *******************
# CONTANDO SIN CONTAR
# *******************


def mcount(items: tuple, target: int) -> int:
    
    acumulador = 0

    for num in items:
        if target == num:
            acumulador += 1

    return acumulador