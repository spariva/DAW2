# *************************
# PALABRAS EN ORDEN INVERSO
# *************************


def run(text: str) -> str:
    
    palabras = text.split(' ')

    reversing = ''

    for a in range (len(palabras) - 1, -1 , -1):
        reversing = reversing + palabras[a].lower() 

        if a != 0:
            reversing += ' '


    return reversing

if __name__ == '__main__':
    run('Hello World')