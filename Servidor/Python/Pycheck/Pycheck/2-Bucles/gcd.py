# ********************
# MÁXIMO COMÚN DIVISOR
# ********************


def run(a: int, b: int) -> int:
    
    if a > b:
        x = b
    else:
        x = a

    for num in range(x,0,-1):

        if(a%num == 0):
            if(b%num == 0):
                return num
            
    return 0


if __name__ == '__main__':
    run(1, 1)