# ********************
# REORGANIZANDO FECHAS
# ********************

def run(input_date: str, base_year: int) -> str:
    month, day, year = input_date.split('/')
    year = base_year + int(year)
    day, month, year = day.zfill(2), month.zfill(2), str(year)

    output_date = day + '-' + month + '-' + year

    return output_date

if __name__ == '__main__':
    run('12/31/23', 2000)