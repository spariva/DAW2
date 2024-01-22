"""╭──────────────────────────────────────────────── ORDENANDO NÚMEROS ───────────────────────────────────────────────────╮
│ Ordene la lista de números dada de manera ascendente sin utilizar la función sorted().                                  │
│                                                                                                                         │
│ IMPORTANTE: No modifique la lista de entrada. En vez de eso haga una copia en otra lista antes de modificar.            │
╰─────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────╯
┏━━━┳━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┳━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓
┃   ┃ (entrada)                             ┃ (salida)                              ┃
┃ # ┃ numbers: list                         ┃ sorted_numbers: list                  ┃
┡━━━╇━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━╇━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┩
│ 1 │ [4, 2, 9, 7, 1, 8]                    │ [1, 2, 4, 7, 8, 9]                    │
│ 2 │ [21, 11, 5, 34, 42, 7, 16, 3, 51, 18] │ [3, 5, 7, 11, 16, 18, 21, 34, 42, 51] │
│ 3 │ [3, 2, 2, 5, 7, 1, 7, 9, 2, 9, 9, 4]  │ [1, 2, 2, 2, 3, 4, 5, 7, 7, 9, 9, 9]  │
│ 4 │ [0]                                   │ [0]                                   │
│ 5 │ [1, 0]                                │ [0, 1]                                │
└───┴───────────────────────────────────────┴───────────────────────────────────────┘"""

def sort_numbers(numbers: list) -> list:
    sorted_numbers = numbers.copy()
    for i in range(len(sorted_numbers)):
        for j in range(len(sorted_numbers) - 1):
            if sorted_numbers[j] > sorted_numbers[j + 1]:
                sorted_numbers[j], sorted_numbers[j + 1] = sorted_numbers[j + 1], sorted_numbers[j]
    return sorted_numbers