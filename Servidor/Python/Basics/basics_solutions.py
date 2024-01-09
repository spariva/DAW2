# Strings: Escribe un programa que tome una cadena de texto e invierta su
# orden. Por ejemplo, "Hola Mundo" se convertiría en "odnuM aloH".
def reverse_string(string):
    return string[::-1]


# Números Enteros: Crea un programa que calcule el factorial de un número
# entero dado.


def factorial(n):
    if n == 0:
        return 1
    else:
        return n * factorial(n - 1)


# Números de Punto Flotante: Desarrolla una función en Python que acepte un
# radio como entrada y devuelva el área de un círculo.


def circle_area(r):
    return 3.141592653589793 * (r**2)


# Listas: Escribe un script que tome una lista de números y devuelva una nueva
# lista con los elementos pares.


def even_list(list):
    return [x for x in list if x % 2 == 0]


# Diccionarios: Crea un programa que almacene los nombres y edades de tus
# amigos como pares clave-valor en un diccionario, y luego imprime cada nombre
# con su edad correspondiente.


def friends_ages(friends):
    for name, age in friends.items():
        print(name, age)


# Tuplas: Desarrolla un programa que intercambie los valores de dos variables
# utilizando una tupla.


def swap(a, b):
    return b, a


# Conjuntos (Sets): Escribe un script que tome dos conjuntos de números y
# muestre la unión, intersección, diferencia y diferencia simétrica.


def set_operations(a, b):
    print("Union:", a | b)
    print("Intersection:", a & b)
    print("Difference:", a - b)
    print("Symmetric Difference:", a ^ b)


# Booleanos: Crea una función que tome dos booleanos como entrada y devuelva
# su operación AND lógica.


def and_operator(a, b):
    return a and b


# Bytes: Escribe un programa que convierta una cadena de texto dada en una
# secuencia de bytes y luego la vuelva a convertir en una cadena.


def string_to_bytes(string):
    # convertir a bytes
    b = string.encode("utf-8")
    # convertir a string
    s = b.decode("utf-8")
    return s


# Listas de Comprensión: Utiliza una lista de comprensión para generar una
# lista de los cuadrados de los números del 1 al 10.


def squares():
    return [x**2 for x in range(1, 11)]
