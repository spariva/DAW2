"""╭──────────────────────────────────────────── VALORES IGUALES EN DICCIONARIO ─────────────────────────────────────────────╮
│ Acepte un diccionario como entrada y compruebe si todos sus valores son iguales o no.                                   │
╰─────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────╯
┏━━━┳━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┳━━━━━━━━━━━━━━━━┓
┃   ┃ (entrada)                        ┃ (salida)       ┃
┃ # ┃ items: dict                      ┃ all_same: bool ┃
┡━━━╇━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━╇━━━━━━━━━━━━━━━━┩
│ 1 │ {'a': 1, 'b': 1, 'c': 1, 'd': 1} │ True           │
│ 2 │ {'a': 1, 'b': 2, 'c': 3, 'd': 4} │ False          │
│ 3 │ {1: 'a', 2: 'b', 3: 'c', 4: 'd'} │ False          │
│ 4 │ {1: 'a', 2: 'a', 3: 'a', 4: 'a'} │ True           │
│ 5 │ {}                               │ True           │
└───┴──────────────────────────────────┴────────────────┘"""

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
    