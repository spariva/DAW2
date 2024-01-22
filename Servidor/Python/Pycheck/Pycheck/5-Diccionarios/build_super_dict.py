# ***************************
# DICCIONARIO EN CONSTRUCCIÓN
# ***************************



def run(items: list) -> dict:

    diccionario = {}
    
    for valores in items:
        diccionario[valores[0]]= valores[1:4]

    return diccionario


if __name__ == '__main__':
    run([['Episode IV - A New Hope', 'May 25', 1977, 'George Lucas'], ['Episode V - The Empire Strikes Back', 'May 21', 1980], ['Episode VI - Return of the Jedi', 'May 25', 1983]])