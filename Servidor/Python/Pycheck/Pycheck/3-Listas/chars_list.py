# **********************
# DESPLEGANDO CARACTERES
# **********************


def run(texts: list) -> list:

    chars = []

    for text in texts:
        for char in text:
            chars.append(char)

    return chars

if __name__ == '__main__':
    run(['uno', 'dos', 'tres'])