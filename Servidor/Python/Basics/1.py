#!/bin/python
nombre = input("¿Cuál es tu nombre? ")
print("Hola " + nombre + "!")       

if nombre == "":
    print("No has introducido ningún nombre")
else:
    print("Hola " + nombre + "!")

def saludar(nombre):
    print("Hola " + nombre + "!")

def invertir(texto):
    return texto[::-1]

def es_palindromo(texto):
    return texto == invertir(texto)

def invertirMalo(texto):
    texto = list(texto)
    for i in range(len(texto)):
        texto[i] = texto[len(texto) - i - 1]
    return ''.join(texto)
    #return texto check if its different

# Function that takes a list of numbers and returns the even numbers
def odd_numbers(numbers):
    even = []
    for number in numbers:
        if number % 2 == 0:
            even.append(number)
    return even

# Function that calculates the factorial of a number
def factorial(number):
    if number == 0:
        return 1
    else:
        return number * factorial(number - 1)
    
# Diccionarios: Crea un programa que almacene los nombres y edades de tus amigos como pares clave-valor en un diccionario, y luego imprime cada nombre con su edad correspondiente.
def diccionario():
    amigos = {"Maki": 22, "Sergio": 23, "Miguel": 24}
    for amigo in amigos:
        print(amigo + ": " + str(amigos[amigo]))

# Conjuntos (Sets): Escribe un script que tome dos conjuntos de números y muestre la unión, intersección, diferencia y diferencia simétrica.
def conjuntos():
    set1 = {1, 2, 3, 4, 5}
    set2 = {4, 5, 6, 7, 8}
    print("Union: " + str(set1 | set2))
    print("Interseccion: " + str(set1 & set2))
    print("Diferencia: " + str(set1 - set2))
    print("Diferencia simetrica: " + str(set1 ^ set2))

# Tuplas: Desarrolla un programa que intercambie los valores de dos variables utilizando una tupla.
def tuplas():
    a = 1
    b = 2
    print("a = " + str(a) + ", b = " + str(b))
    a, b = b, a
    print("a = " + str(a) + ", b = " + str(b))

# Booleanos: Crea una función que tome dos booleanos como entrada y devuelva su operación AND lógica.
def booleanos(a, b):
    return a and b

# Bytes: Escribe un programa que convierta una cadena de texto dada en una secuencia de bytes y luego la vuelva a convertir en una cadena.
def bytes(texto):
    texto = texto.encode('utf-8')
    print(texto)
    texto = texto.decode('utf-8')
    print(texto)

# Listas de Comprensión: Utiliza una lista de comprensión para generar una lista de los cuadrados de los números del 1 al 10.
def comprension():
    lista = [x**2 for x in range(1, 11)]
    print(lista)

# Funciones Lambda: Escribe un programa que utilice una función lambda para ordenar una lista de tuplas (nombre, edad, altura) en orden ascendente por el nombre, luego por la edad y luego por la altura.
def lambda1():
    lista = [("Maki", 22, 1.70), ("Sergio", 23, 1.80), ("Miguel", 24, 1.90)]
    lista.sort(key = lambda x: (x[0], x[1], x[2]))
    print(lista)


    

if __name__ == "__main__":
    print("Hello World!")
    print(factorial(5))

