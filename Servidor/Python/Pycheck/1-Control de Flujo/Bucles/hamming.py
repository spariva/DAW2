"""╭──────────────────────────────────────────── DISTANCIA HAMMING ────────────────────────────────────────────╮
│ Calcule la distancia hamming entre dos cadenas de texto dadas.                                            │
│                                                                                                           │
│ NOTAS:                                                                                                    │
│   https://es.wikipedia.org/wiki/Distancia_de_Hamming                                                      │
│  • Si las cadenas de texto tienen distinta longitud habrá que devolver -1.                                │
╰───────────────────────────────────────────────────────────────────────────────────────────────────────────╯
┏━━━┳━━━━━━━━━━━━━━━━━┳━━━━━━━━━━━━━━━━━┳━━━━━━━━━━━━━━━┓
┃   ┃ (entrada)       ┃ (entrada)       ┃ (salida)      ┃
┃ # ┃ text1: str      ┃ text2: str      ┃ dhamming: int ┃
┡━━━╇━━━━━━━━━━━━━━━━━╇━━━━━━━━━━━━━━━━━╇━━━━━━━━━━━━━━━┩
│ 1 │ '0001010011101' │ '0000110010001' │ 4             │
│ 2 │ 'abc'           │ 'abcd'          │ -1            │
│ 3 │ 'teclado'       │ 'techado'       │ 1             │
│ 4 │ 'esperanza'     │ 'esmeralda'     │ 3             │
└───┴─────────────────┴─────────────────┴───────────────┘"""

def run(text1: str, text2: str) -> int:
    acumulador = 0

    longitud1 = len(text1)
    longitud2 = len(text2)

    if longitud1 > longitud2:
        mayor = longitud1
        menor = longitud2
    else:
        mayor = longitud2
        menor = longitud1

    for num in range(0,menor):

        if(text1[num] != text2[num]):
            acumulador += 1

    
    acumulador = acumulador - (mayor-menor)

    return acumulador
