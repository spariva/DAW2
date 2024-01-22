# ******************
# AGRUPANDO PALABRAS
# ******************


def run(words: list) -> dict:
    agrupados = {}

    for word in words:
        inicial = word[0]
        if inicial in agrupados:
            agrupados[inicial].append(word)
        else:
            agrupados[inicial] = [word]

    return agrupados


if __name__ == '__main__':
    run(['mesa', 'móvil', 'barco', 'coche', 'avión', 'bandeja', 'casa', 'monitor', 'carretera', 'arco'])