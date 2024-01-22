"""Escriba un programa que acepte edad, peso, pulso y número de plaquetas de una persona y determine si cumple con los requisitos para donar   │
│ sangre.                    
http://www3.gobiernodecanarias.org/sanidad/ichh/donantes/requisitos.asp                                                                                                                 │
╰─────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────╯
┏━━━┳━━━━━━━━━━━┳━━━━━━━━━━━━━┳━━━━━━━━━━━━━━━━┳━━━━━━━━━━━━━━━━┳━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓
┃   ┃ (entrada) ┃ (entrada)   ┃ (entrada)      ┃ (entrada)      ┃ (salida)                    ┃
┃ # ┃ age: int  ┃ weight: int ┃ heartbeat: int ┃ platelets: int ┃ suitable_for_donation: bool ┃
┡━━━╇━━━━━━━━━━━╇━━━━━━━━━━━━━╇━━━━━━━━━━━━━━━━╇━━━━━━━━━━━━━━━━╇━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┩
│ 1 │ 34        │ 81          │ 70             │ 151000         │ True                        │
│ 2 │ 17        │ 81          │ 70             │ 200000         │ False                       │
│ 3 │ 50        │ 47          │ 70             │ 171000         │ False                       │
│ 4 │ 50        │ 47          │ 70             │ 128000         │ False                       │
│ 5 │ 19        │ 86          │ 90             │ 210000         │ True                        │
│ 6 │ 19        │ 86          │ 120            │ 210000         │ False                       │
└───┴───────────┴─────────────┴────────────────┴────────────────┴─────────────────────────────┘"""

def run(age: int, weight: int, heartbeat: int, platelets: int) -> bool:
    # TU CÓDIGO AQUÍ

    v_platelets = 12.5 * weight

    if age > 18 and age < 65:

        if weight > 50:

            if heartbeat > 50 and heartbeat < 110:

                if platelets > v_platelets:

                    return True
    
    return False

