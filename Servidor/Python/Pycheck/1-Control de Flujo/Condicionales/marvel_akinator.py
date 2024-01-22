"""Implemente un "clon" de Akinator que permita adivinar el personaje de Marvel en base a las tres preguntas siguientes:                       │
│                                                                                                                                             │
│  1 ¿Puede volar? → Se representa por la variable de entrada: can_fly                                                                        │
│  2 ¿Es humano? → Se representa por la variable de entrada: is_human                                                                         │
│  3 ¿Tiene máscara? → Se representa por la variable de entrada: has_mask                                                                     │
│                                                                                                                                             │
│                                                                                                                                             │
│                                                  ✔                                                                                          │
│                                              ┌──────► Ironman                                                                               │
│                                ✔             │                                                                                              │
│                              ┌───► Has mask? │                                                                                              │
│                              │               │                                                                                              │
│                              │               └──────► Captain Marvel                                                                        │
│                              │                   ˟                                                                                          │
│               ✔              │                                                                                                              │
│           ┌──────► Is human? │                                                                                                              │
│           │                  │                   ✔                                                                                          │
│           │                  │               ┌──────► Ronan Accuser                                                                         │
│           │                  │               │                                                                                              │
│           │                  └───► Has mask? │                                                                                              │
│           │                    ˟             │                                                                                              │
│           │                                  └──────► Vision                                                                                │
│           │                                      ˟                                                                                          │
│           │                                                                                                                                 │
│  Can fly? │                                                                                                                                 │
│           │                                      ✔                                                                                          │
│           │                                  ┌──────► Spiderman                                                                             │
│           │                    ✔             │                                                                                              │
│           │                  ┌───► Has mask? │                                                                                              │
│           │                  │               │                                                                                              │
│           │                  │               └──────► Hulk                                                                                  │
│           │                  │                   ˟                                                                                          │
│           │                  │                                                                                                              │
│           └──────► Is human? │                                                                                                              │
│               ˟              │                   ✔                                                                                          │
│                              │               ┌──────► Black Bolt                                                                            │
│                              │               │                                                                                              │
│                              └───► Has mask? │                                                                                              │
│                                ˟             │                                                                                              │
│                                              └──────► Thanos                                                                                │
│                                                  ˟                                                                                          │
│                                                                                                                                             │
╰─────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────╯
┏━━━┳━━━━━━━━━━━━━━━┳━━━━━━━━━━━━━━━━┳━━━━━━━━━━━━━━━━┳━━━━━━━━━━━━━━━━━━┓
┃   ┃ (entrada)     ┃ (entrada)      ┃ (entrada)      ┃ (salida)         ┃
┃ # ┃ can_fly: bool ┃ is_human: bool ┃ has_mask: bool ┃ character: str   ┃
┡━━━╇━━━━━━━━━━━━━━━╇━━━━━━━━━━━━━━━━╇━━━━━━━━━━━━━━━━╇━━━━━━━━━━━━━━━━━━┩
│ 1 │ True          │ True           │ True           │ 'Ironman'        │
│ 2 │ True          │ True           │ False          │ 'Captain Marvel' │
│ 3 │ True          │ False          │ True           │ 'Ronan Accuser'  │
│ 4 │ True          │ False          │ False          │ 'Vision'         │
│ 5 │ False         │ True           │ True           │ 'Spiderman'      │
│ 6 │ False         │ True           │ False          │ 'Hulk'           │
│ 7 │ False         │ False          │ True           │ 'Black Bolt'     │
│ 8 │ False         │ False          │ False          │ 'Thanos'         │
└───┴───────────────┴────────────────┴────────────────┴──────────────────┘"""

def akinator_marvel(volar:bool, humano: bool, mascara:bool):

    if volar is True:

        if humano is True:

            if mascara is True:

                return "Ironman"
            
            else:

                return "Captain Marvel"

        else:

            if mascara is True:

                return "Ronan Accuser"
            
            else:

                return "Vision"
            
    else:

        if humano is True:

            if mascara is True:

                return "Spiderman"
            
            else:

                return "Hulk"
            
        else:

            if mascara is True:

                return "Black Bolt"
            
            else: 

                return "Thanos"

