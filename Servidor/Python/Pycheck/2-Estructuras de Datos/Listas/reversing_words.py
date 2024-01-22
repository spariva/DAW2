"""╭──────────────────────────────────────────── PALABRAS EN ORDEN INVERSO ───────────────────────────────────────────────╮
│ Dado un string que contiene palabras separadas por espacio, obtenga otro string donde las palabras estén en orden       │
│ inverso. En la cadena de salida todo el texto debe quedar en minúsculas.                                                │
╰─────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────╯
┏━━━┳━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┳━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓
┃   ┃ (entrada)                     ┃ (salida)                      ┃
┃ # ┃ text: str                     ┃ reversing: str                ┃
┡━━━╇━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━╇━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┩
│ 1 │ 'Hello World'                 │ 'world hello'                 │
│ 2 │ 'Esto es Python'              │ 'python es esto'              │
│ 3 │ 'último caso de comprobación' │ 'comprobación de caso último' │
└───┴───────────────────────────────┴───────────────────────────────┘"""

def run(text: str) -> str:
    
    palabras = text.split(' ')

    reversing = ''

    for a in range (len(palabras) - 1, -1 , -1):
        reversing = reversing + palabras[a].lower() 

        if a != 0:
            reversing += ' '


    return reversing
