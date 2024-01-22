# ******************
# POBLACIÓN PROMEDIO
# ******************


def run(pdata: dict) -> dict:
    total = sum(pdata.values())  # suma todas poblaciones

    for valor in pdata:
        pdata[valor] = round((pdata[valor] / total) * 100, 3)

    return pdata

if __name__ == '__main__':
    print(run({'Tokyo': 38140000, 'Delhi': 26454000, 'Shanghai': 24484000, 'Mumbai': 21357000}))