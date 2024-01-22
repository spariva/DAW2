# ************
# VALOR MÁXIMO
# ************


def run(values: list) -> int:

    max = values[0]
    
    for num in values:
        if num > max:
            max = num


    return max


if __name__ == '__main__':
    run([-11, 10, -6, 15, -1])