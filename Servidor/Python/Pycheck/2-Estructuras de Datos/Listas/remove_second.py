"""╭────────────────────── NO ME INTERESAN LOS PARES ──────────────────────────╮
│ Dada una lista, genere otra lista eliminando los elementos que ocupan        │
│ posiciones pares (tal y como lo vería un "ser humano no programador").       │
╰──────────────────────────────────────────────────────────────────────────────╯
┏━━━┳━━━━━━━━━━━━━━━━━━━━━━━━━━━┳━━━━━━━━━━━━━━━━━┓
┃   ┃ (entrada)                 ┃ (salida)        ┃
┃ # ┃ items: list               ┃ filter: list    ┃
┡━━━╇━━━━━━━━━━━━━━━━━━━━━━━━━━━╇━━━━━━━━━━━━━━━━━┩
│ 1 │ [1, 2, 1, 2, 1, 2]        │ [1, 1, 1]       │
│ 2 │ ['a', 'b', 'a', 'b', 'a'] │ ['a', 'a', 'a'] │
│ 3 │ [1, 1, 2, 2, 3, 3]        │ [1, 2, 3]       │
└───┴───────────────────────────┴─────────────────┘"""


def run(items: list) -> list:

    salida = items.copy()
    largo =(len(salida) -1)

    for num in range(largo,-1,-1):

        if num%2 != 0:
            del salida[num]

    return salida
