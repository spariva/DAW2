# *******************************
# ADIVINANDO PERSONAJES DE MARVEL
# *******************************


def run(can_fly: bool, is_human: bool, has_mask: bool) -> str:

    if can_fly is True:

        if is_human is True:

            if has_mask is True:

                return "Ironman"
            
            else:

                return "Captain Marvel"

        else:

            if has_mask is True:

                return "Ronan Accuser"
            
            else:

                return "Vision"
            
    else:

        if is_human is True:

            if has_mask is True:

                return "Spiderman"
            
            else:

                return "Hulk"
            
        else:

            if has_mask is True:

                return "Black Bolt"
            
            else: 

                return "Thanos"

    character = 'output'

    return character


if __name__ == '__main__':
    run(True, True, True)