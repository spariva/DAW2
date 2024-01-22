# **************
# NÚMEROS PRIMOS
# **************


def run(n: int) -> bool:

    if n <= 1:
        return False
    
    if n <= 3:
        return True
    
    for num in range(2, n):

        if n % num == 0:

            return False
        
    return True

if __name__ == '__main__':
    run(2)