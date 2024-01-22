# ********************
# AQUÍ TIENE SU VUELTA
# ********************


def run(a_devolver: float, cambio_disponible: list) -> dict:

    # Ordenamos la lista de cambio disponible de mayor a men
    cambio_disponible.sort(reverse=True)
    
    cambio = {}

    for disponible in cambio_disponible:

        if disponible <= a_devolver:
            # Las // nos dan el numero max de divisiones enteras q se pueden hacer
            num = a_devolver // disponible

            a_devolver -= num * disponible
            
            cambio[disponible] = num

    if a_devolver == 0:
        return cambio
    # Si no hay cambio exacto false
    else:
        return None
    
if __name__ == '__main__':
    run(20, [5, 2, 1])