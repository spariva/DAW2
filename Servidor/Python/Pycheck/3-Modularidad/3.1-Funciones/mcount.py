"""╭────────────────────────────────────────── CONTANDO SIN CONTAR ──────────────────────────────────────────────╮
│ Cree una función que cuente el número de veces que aparece un determinado valor en una tupla.                  │
│                                                                                                                │
│ Notas:                                                                                                         │
│                                                                                                                │
│  • Se puede suponer que la tupla sólo contendrá valores numéricos enteros.                                     │
│  • No se puede utilizar la función predefinida count()                                                         │
│  • Utilice anotación de tipos y valores por defecto (según corresponda).                                       │
│  • Documente la función siguiendo el formato Sphinx.                                                           │
╰────────────────────────────────────────────────────────────────────────────────────────────────────────────────╯
    ┏━━━┳━━━━━━━━━━━━━━━━━━━━━━━━━━┳━━━━━━━━━━━━━┳━━━━━━━━━━━━┓
    ┃   ┃ (entrada)                ┃ (entrada)   ┃ (salida)   ┃
    ┃ # ┃ items: tuple             ┃ target: int ┃ count: int ┃
    ┡━━━╇━━━━━━━━━━━━━━━━━━━━━━━━━━╇━━━━━━━━━━━━━╇━━━━━━━━━━━━┩
    │ 1 │ (1, 2, 3, 1, 1, 5, 6, 1) │ 1           │ 4          │
    │ 2 │ (2, 2, 2, 2, 2)          │ 2           │ 5          │
    │ 3 │ (1, 2, 3, 4, 5)          │ 0           │ 0          │
    │ 4 │ ()                       │ 1           │ 0          │
    └───┴──────────────────────────┴─────────────┴────────────┘"""

def mcount(items: tuple, target: int) -> int:
    
    acumulador = 0

    for num in items:
        if target == num:
            acumulador += 1

    return acumulador
