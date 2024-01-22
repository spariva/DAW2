"""╭────────────────────────────────── FRECUENCIA DE ELEMENTOS CONSECUTIVOS ─────────────────────────────────────╮
│ Escriba una función que reciba una lista de elementos y un parámetro "opcional" para el formato de salida. El  │
│ objetivo es encontrar la frecuencia de aparición de elementos consecutivos en la lista de entrada.             │
│                                                                                                                │
│ Si el parámetro de salida como cadena de texto está a False se deberá devolver una lista de tuplas, donde cada │
│ tupla contiene el elemento y el número de repeticiones (frecuencia). Si el parámetro de salida como cadena de  │
│ texto está a True se deberá devolver una cadena de texto con elemento:frecuencia separados por comas.          │
│                                                                                                                │
│ Notas:                                                                                                         │
│                                                                                                                │
│  • Se debe obligar a que el primer parámetro (lista de elementos) sea pasado como posicional.                  │
│  • El segundo parámetro para el formato de salida como cadena de texto debe ser falso por defecto.             │
╰────────────────────────────────────────────────────────────────────────────────────────────────────────────────╯
    ┏━━━━┳━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┳━━━━━━━━━━━━━━━━━┳━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓
    ┃    ┃ (entrada)                         ┃ (entrada)       ┃ (salida)                         ┃
    ┃ #  ┃ items: list                       ┃ as_string: bool ┃ freqs: list                      ┃
    ┡━━━━╇━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━╇━━━━━━━━━━━━━━━━━╇━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┩
    │ 1  │ [1, 2, 2, 2, 4, 4, 4, 5, 5, 5, 5] │ False           │ [(1, 1), (2, 3), (4, 3), (5, 4)] │
    │ 2  │ [1, 2, 2, 2, 4, 4, 4, 5, 5, 5, 5] │ True            │ '1:1,2:3,4:3,5:4'                │
    │ 3  │ []                                │ False           │ []                               │
    │ 4  │ []                                │ True            │ ''                               │
    │ 5  │ [1]                               │ False           │ [(1, 1)]                         │
    │ 6  │ [1]                               │ True            │ '1:1'                            │
    │ 7  │ [0, 1]                            │ False           │ [(0, 1), (1, 1)]                 │
    │ 8  │ [0, 1]                            │ True            │ '0:1,1:1'                        │
    │ 9  │ [0, 0, 9, 5, 5, 5, 1, 1, 1]       │ False           │ [(0, 2), (9, 1), (5, 3), (1, 3)] │
    │ 10 │ [1, 2, 3]                         │ True            │ '1:1,2:1,3:1'                    │
    │ 11 │ [2, 2, 1, 1, 2, 2, 1, 1]          │ False           │ [(2, 2), (1, 2), (2, 2), (1, 2)] │
    │ 12 │ [2, 2, 1, 1, 2, 2, 1, 1]          │ True            │ '2:2,1:2,2:2,1:2'                │
    └────┴───────────────────────────────────┴─────────────────┴──────────────────────────────────┘"""

def frecuencia(elementos: list, formato: bool): list

    salida = []
    sos = [1,1]

    encontrados = []

    if formato:

        return sos

    else:

        for num in range(0, len(elementos)):

            numero = elementos[num]

            if encontrados[numero] != '':

                encontrados[numero] += 1
            
            else:
                encontrados[num] = 1
                

        return 'encontrados'

