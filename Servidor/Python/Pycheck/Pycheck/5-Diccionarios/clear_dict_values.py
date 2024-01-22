# **********************
# BORRANDO VALORES CLAVE
# **********************


def run(items: dict) -> dict:
    # Use dictionary comprehension to create a new dictionary with the same keys but with all values replaced by empty lists
    citems = {key: [] for key in items}
    return citems

if __name__ == '__main__':
    run({'C1': [10, 20, 30], 'C2': [20, 30, 40], 'C3': [12, 34]})