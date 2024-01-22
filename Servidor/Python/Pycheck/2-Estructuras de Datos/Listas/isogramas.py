"""Determine si una cadena de texto dada es un isograma, es decir, no se repite ninguna letra.                                                               │
• No se puede utilizar la función count()                                   │
• Los guiones medios no cuentan como caracter repetido. """

def isograma(texto):
    
    checker = []
    
    for char in texto:

        if char == '-':
            continue
        
        if char in checker:
            return False
        
        checker.append(char)
    
    return True
