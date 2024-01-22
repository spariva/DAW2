"""╭───────────────────────────────── PRODUCTO ESCALAR ─────────────────────────────────────╮
│ Dados dos vectores (listas) de la misma dimensión, utilice la función zip() para calcular │
│ su producto escalar.                                                                      │
│                                                                                           │
│ Ejemplo:                                                                                  │
│                                                                                           │
│                                                                                           │
│  v1 = [4, 3, 8, 1]                                                                        │
│  v2 = [9, 2, 7, 3]                                                                        │
│                                                                                           │
│  v1 · v2 = [4⋅9 + 3·2 + 8·7 + 1·3] = 101                                                  │
│                                                                                           │
│                                                                                           │
│ Nota:                                                                                     │
│                                                                                           │
│  • Si los vectores tienen distinta dimensión habrá que devolver None.                     │
╰───────────────────────────────────────────────────────────────────────────────────────────╯
┏━━━┳━━━━━━━━━━━━━━━━━┳━━━━━━━━━━━━━━━━━┳━━━━━━━━━━━━━━┓
┃   ┃ (entrada)       ┃ (entrada)       ┃ (salida)     ┃
┃ # ┃ vector1: list   ┃ vector2: list   ┃ dprod: float ┃
┡━━━╇━━━━━━━━━━━━━━━━━╇━━━━━━━━━━━━━━━━━╇━━━━━━━━━━━━━━┩
│ 1 │ [4, 3, 8, 1]    │ [9, 2, 7, 3]    │ 101          │
│ 2 │ [9, 1, 2]       │ [8, 7, 5]       │ 89           │
│ 3 │ [4, 2]          │ [8, 7, 3]       │ None         │
│ 4 │ [8, 3, 5, 6, 4] │ [3, 7, 7, 9, 3] │ 146          │
└───┴─────────────────┴─────────────────┴──────────────┘"""

def run(vector1: list, vector2: list) -> float:

    resultado = 0

    
    if len(vector1) != len(vector2):
        return None
    
    for num1, num2 in zip(vector1, vector2):
        resultado += (num1 * num2)

    return resultado

