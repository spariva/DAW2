"""╭──────────────────────────── REORGANIZANDO FECHAS ────────────────────────────╮
│ Transforme una fecha de entrada en otra de salida pero modificando su        │
│ formato.                                                                     │
│                                                                              │
│ Notas:                                                                       │
│                                                                              │
│                                                                              │
│                                                                              │
│  • Formato de fecha de entrada: /<día>/<año-con-2-cifras>                    │
│  • Formato de fecha de salida: <día>--<año-con-4-cifras>                     │
│  • Las fechas son cadenas de caracteres                                      │
│  • Habrá otro parámetro de entrada indicando el año base (entero)            │
╰──────────────────────────────────────────────────────────────────────────────╯
┏━━━┳━━━━━━━━━━━━━━━━━┳━━━━━━━━━━━━━━━━┳━━━━━━━━━━━━━━━━━━┓
┃   ┃ (entrada)       ┃ (entrada)      ┃ (salida)         ┃
┃ # ┃ input_date: str ┃ base_year: int ┃ output_date: str ┃
┡━━━╇━━━━━━━━━━━━━━━━━╇━━━━━━━━━━━━━━━━╇━━━━━━━━━━━━━━━━━━┩
│ 1 │ '12/31/23'      │ 2000           │ '31-12-2023'     │
│ 2 │ '2/21/15'       │ 1800           │ '21-02-1815'     │
│ 3 │ '10/1/87'       │ 1900           │ '01-10-1987'     │
│ 4 │ '9/29/1'        │ 1700           │ '29-09-1701'     │"""


def run(input_date: str, base_year: int) -> str:
    month, day, year = input_date.split('/')
    year = base_year + int(year)
    day, month, year = day.zfill(2), month.zfill(2), str(year)

    output_date = day + '-' + month + '-' + year

    return output_date