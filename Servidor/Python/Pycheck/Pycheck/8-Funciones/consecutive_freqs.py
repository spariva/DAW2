# ************************************
# FRECUENCIA DE ELEMENTOS CONSECUTIVOS
# ************************************

"""
def cfreq(elementos: list, formato: bool):

    salida = []
    sos = [1,1]

    encontrados = []

    if formato:

        return sos

    else:

        for num in range(0, len(elementos)):

            if num in encontrados:

                for buscar in range(0, len(salida)):

                    salida[buscar][buscar+1] = salida [buscar][+1]
            
            else:
                encontrados.append(num)
                salida.append(num, 1)
                

        return 'pendiente'

    return salida
"""

def cfreq(elementos: list, formato: bool):

    salida = []
    sos = [1,1]

    encontrados = []

    if formato:

        return sos

    else:

        for num in range(0, len(elementos)):

            numero = elementos[num]

            if encontrados[numero] is None:

                encontrados[numero] = 1
            
            else:
                encontrados[num] += 1
                

        return encontrados

