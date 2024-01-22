# ******************************
# VALORES IGUALES EN DICCIONARIO
# ******************************


def run(items: dict) -> bool:

    if not items:
        return True
    
    valores = items.values()
    check = next(iter(valores))
        #iter(valores): Crea un iterador (objeto que puede ser iterado (recorrido)) a partir del conjunto de valores del diccionario.
        #next(...): Obtiene el próximo elemento del iterador. En este caso, obtiene el primer valor del conjunto.
    
    for num in valores:
        if check != num:
            return False
        
    return True
    
    
if __name__ == '__main__':
    run({'a': 1, 'b': 1, 'c': 1, 'd': 1})