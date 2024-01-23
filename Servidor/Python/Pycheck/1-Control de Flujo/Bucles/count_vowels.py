"""╭───────────────────────────────────────────────────────────── 
┏━━━┳━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┳━━━━━━━━━━━━━━━━━┓
┃   ┃ (entrada)                                ┃ (salida)        ┃
┃ # ┃ text: str                                ┃ num_vowels: int ┃
┡━━━╇━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━╇━━━━━━━━━━━━━━━━━┩
│ 1 │ 'El camión chocó contra el árbol'        │ 11              │
│ 2 │ 'WELCOME HOME'                           │ 5               │
│ 3 │ 'Órbita Laica'                           │ 6               │
│ 4 │ 'Programar va de pensar, no de escribir' │ 12              │
│ 5 │ 'Simple es mejor que complejo'           │ 10              │"""


def run(text: str) -> int:
    vowels = "aeiouAEIOUáéíóúÁÉÍÓÚ"
    # Python nos permite recorrer asi de facil un string y sus elementos
    # lo trata directamente como un array de chars
    num_vowels = 0

    for char in text:
        if char in vowels:
            num_vowels += 1

    return num_vowels


