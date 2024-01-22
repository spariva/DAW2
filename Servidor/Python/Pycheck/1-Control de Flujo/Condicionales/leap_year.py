"""Dada una variable year con un valor entero, compruebe si dicho año es        │
│ bisiesto o no lo es.                                                         │
│                                                                              │
│ Un año es bisiesto en el calendario Gregoriano, si es divisible entre 4 y no │
│ divisible entre 100, o bien si es divisible entre 400. Puede hacer la        │
│ comprobación en esta lista de años bisiestos.                                │
╰──────────────────────────────────────────────────────────────────────────────╯
┏━━━┳━━━━━━━━━━━┳━━━━━━━━━━━━━━━━━━━━┓
┃   ┃ (entrada) ┃ (salida)           ┃
┃ # ┃ year: int ┃ is_leap_year: bool ┃
┡━━━╇━━━━━━━━━━━╇━━━━━━━━━━━━━━━━━━━━┩
│ 1 │ 1900      │ False              │
│ 2 │ 1904      │ True               │
│ 3 │ 1983      │ False              │
│ 4 │ 1992      │ True               │
│ 5 │ 2000      │ True               │
│ 6 │ 2002      │ False              │
│ 7 │ 2052      │ True               │
│ 8 │ 2100      │ False              │
└───┴───────────┴────────────────────┘"""

def bisiesto(year):

    if(year%4)==0:
        if(year%100)!=0:
                return True
        
    if(year%400)==0:
        return True
    
    return False