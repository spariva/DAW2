# **************
# DONANDO SANGRE
# **************


def run(age: int, weight: int, heartbeat: int, platelets: int) -> bool:

    v_platelets = 12.5 * weight

    if age > 18 and age < 65:

        if weight > 50:

            if heartbeat > 50 and heartbeat < 110:

                if platelets > v_platelets:

                    return True
    
    return False



if __name__ == '__main__':
    run(34, 81, 70, 151000)