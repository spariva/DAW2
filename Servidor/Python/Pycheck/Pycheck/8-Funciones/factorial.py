# ************************************
# CALCULANDO EL FACTORIAL DE UN NÚMERO
# ************************************


def factorial(num: int):

    resultado = num

    if resultado ==0:
        return 1
    
    elif resultado < 0:
        return None

    else:
        for i in range(1,num):

            resultado *= (num - i)

    return resultado