"""╭───────────────────────────────────────────────── AQUÍ TIENE SU VUELTA ──────────────────────────────────────────────────╮
│ Un cliente compra un artículo en una tienda con dinero suficiente (mayor o igual) que el importe del artículo. Por lo   │
│ tanto hay que devolver el cambio. La tienda dispone de una serie concreta de monedas/billetes. El objetivo del          │
│ ejercicio es devolver el cambio al cliente empezando por la moneda/billete más grande y llegando hasta la más pequeña.  │
│                                                                                                                         │
│ Notas:                                                                                                                  │
│                                                                                                                         │
│  • Si el dinero es justo hay que devolver un diccionario vacío.                                                         │
│  • Si el cambio no es posible hay que devolver None                                                                     │
╰─────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────╯
┏━━━┳━━━━━━━━━━━━━━━━━━━━━┳━━━━━━━━━━━━━━━━━━━━━━━━━━━━┳━━━━━━━━━━━━━━━━━━━━━━┓
┃   ┃ (entrada)           ┃ (entrada)                  ┃ (salida)             ┃
┃ # ┃ to_give_back: float ┃ available_currencies: list ┃ money_back: dict     ┃
┡━━━╇━━━━━━━━━━━━━━━━━━━━━╇━━━━━━━━━━━━━━━━━━━━━━━━━━━━╇━━━━━━━━━━━━━━━━━━━━━━┩
│ 1 │ 20                  │ [5, 2, 1]                  │ {5: 4}               │
│ 2 │ 7                   │ [2, 1, 0.5]                │ {2: 3, 1: 1}         │
│ 3 │ 13.5                │ [5, 2, 0.5]                │ {5: 2, 2: 1, 0.5: 3} │
│ 4 │ 11                  │ [0.1, 0.5, 2]              │ {2: 5, 0.5: 2.0}     │
│ 5 │ 0                   │ [0.5, 0.2, 0.1]            │ {}                   │
│ 6 │ 4.75                │ [1, 5, 0.2]                │ None                 │
└───┴─────────────────────┴────────────────────────────┴──────────────────────┘"""

def run(a_devolver: float, cambio_disponible: list) -> dict:

    # Ordenamos la lista de cambio disponible de mayor a men
    cambio_disponible.sort(reverse=True)
    
    cambio = {}

    for disponible in cambio_disponible:

        if disponible <= a_devolver:
            # Las // nos dan el numero max de divisiones enteras q se pueden hacer
            num = a_devolver // disponible

            a_devolver -= num * disponible
            
            cambio[disponible] = num

    if a_devolver == 0:
        return cambio
    # Si no hay cambio exacto false
    else:
        return None