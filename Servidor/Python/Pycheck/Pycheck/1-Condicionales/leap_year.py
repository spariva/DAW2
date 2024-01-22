# **************
# AÑOS BISIESTOS
# **************


def run(year: int) -> bool:
    # TU CÓDIGO AQUÍ


    if(year%4)==0:
        if(year%100)!=0:
                return True
        
    if(year%400)==0:
        return True
    

    return False

if __name__ == '__main__':
    run(1900)