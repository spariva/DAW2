# *********************
# ENCONTRANDO ISOGRAMAS
# *********************


def run(text: str) -> bool:
    
    checker = []
    
    for char in text:

        if char == '-':
            continue
        
        if char in checker:
            return False
        
        checker.append(char)
    
    return True


if __name__ == '__main__':
    run('lumberjacks')