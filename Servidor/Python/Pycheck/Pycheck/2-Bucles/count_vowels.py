# ****************
# CONTANDO VOCALES
# ****************


def run(text: str) -> int:

    vowels = 'aeiouAEIOUáéíóúÁÉÍÓÚ'
    
    num_vowels = 0

    for char in text:
        if char in vowels:
            num_vowels += 1
            
    return num_vowels
if __name__ == '__main__':
    run('El camión chocó contra el árbol')