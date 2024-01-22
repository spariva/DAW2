# ********************
# LA CLAVE ES LA CLAVE
# ********************


def run(items: dict) -> dict:
    # Use dictionary comprehension to create a new dictionary with the same values but with all spaces removed from the keys
    fitems = {key.replace(' ', ''): value for key, value in items.items()}
    return fitems


if __name__ == '__main__':
    run({'S  001': ['Math', 'Science'], 'S    002': ['Math', 'English']})