# Análisis de Texto con Strings: Escribe un programa que analice un párrafo de
# texto proporcionado por el usuario, cuente la frecuencia de cada palabra y
# muestre las tres palabras más comunes junto con su número de apariciones.

# Crea la función que recibe un string
def analisisTexto(texto):
    # Crea un diccionario vacío
    diccionario = {}
    # Separa el string en palabras
    palabras = texto.split()
    # Itera sobre cada palabra
    for palabra in palabras:
        # Si la palabra ya está en el diccionario, suma 1 a su valor
        if palabra in diccionario:
            diccionario[palabra] += 1
        # Si no, añade la palabra al diccionario con valor 1
        else:
            diccionario[palabra] = 1
    # Crea una lista con las palabras ordenadas por frecuencia
    lista = sorted(diccionario, key=diccionario.get, reverse=True)
    # Imprime las tres palabras más comunes
    print(lista[0] + ": " + str(diccionario[lista[0]]))
    print(lista[1] + ": " + str(diccionario[lista[1]]))
    print(lista[2] + ": " + str(diccionario[lista[2]]))
    # Calcula la frecuencia total de las palabras
    total = 0
    for palabra in diccionario:
        total += diccionario[palabra]
    # Imprime la frecuencia total
    print("Total: " + str(total))
    return total



# Juego de Adivinanzas con Números Enteros: Desarrolla un juego en el que el
# programa elija un número entero al azar entre 1 y 100, y el jugador tiene
# que adivinarlo. El programa debe indicar si cada intento es demasiado alto o
# demasiado bajo.

# Cálculos Científicos con Números de Punto Flotante: Crea un programa que
# calcule y muestre la distancia entre dos puntos en el espacio 3D, dados sus
# coordenadas (x, y, z).

# Gestión de Inventarios con Listas: Escribe un script que gestione un
# inventario de una tienda. Debe ser capaz de agregar, eliminar y buscar
# productos, donde cada producto
# es un diccionario con nombre, precio y cantidad.

# Organización de Datos con Diccionarios: Desarrolla un programa que lea datos
# de estudiantes (nombre, edad, grado) de un archivo CSV y los almacene en un
# diccionario. Luego, permite al usuario buscar estudiantes por nombre y
# mostrar su información.

# Manipulación de Datos de Clima con Tuplas: Escribe un script que procese una
# lista de tuplas, donde cada tupla contiene la fecha, la temperatura máxima y
# mínima de un día. El programa debe encontrar la temperatura
# más alta y más baja registradas y en qué fecha ocurrieron.

# Análisis de Redes Sociales con Conjuntos: Crea un programa que simule una
# red social. Los usuarios son representados por conjuntos
# que contienen sus amigos.
# El programa debe ser capaz de mostrar amigos comunes, sugerir nuevos amigos,
# y amigos exclusivos de cada usuario.

# Sistema de Control con Booleanos: Desarrolla una simulación de un sistema de
# luces inteligentes en una casa, donde cada luz se enciende o apaga basado en
# la combinación de varios sensores booleanos
# (movimiento, luz ambiental, hora del día).

# Codificación y Decodificación de Mensajes con Bytes: Escribe un programa que
# tome un mensaje, lo codifique en bytes, aplique una operación de cifrado
# simple (como invertir el orden de los bytes) y luego lo decodifique de nuevo
# al mensaje original.

# Generación de Perfiles con Listas de Comprensión: Utiliza listas de
# comprensión para generar una lista de perfiles de usuarios, donde cada
# perfil es un diccionario con información aleatoria generada para nombre,
# edad y correo electrónico. Usa bibliotecas como faker para generar los datos.
