def saludar (nombre: str):
    def mensaje(texto: str):
        return ("Hola", texto + " " + nombre)
    return mensaje

saludo_juan = (saludar("Juan"))
saludo_maki = (saludar("Maki"))

def generar_url (protocolo, dominio):
    def final_url(entidad, accion, id= None):
            if accion == "listado":
                return f"{protocolo}://{dominio}/{entidad}/listado"
            elif accion == "get":
                return f"{protocolo}://{dominio}/{entidad}/get/{id}"
    return final_url
            
url_api = generar_url("https", "www.api.com")
url_music = generar_url("https", "www.music.com")
            


if __name__ == "__main__":
    print(saludo_juan("Buenos días"))
    print(saludo_juan("Buenas tardes"))
    print(saludo_maki("Buenas noches"))
    print(url_api("prueba", "listado", 1))
    print(url_api("usuario", "get", 1))
    print(url_api("blabalblaaa", "listado", 1))
    print(url_api("tarea", "get", 1))
    print(url_music("usuario", "listado", 1))
    print(url_music("usuario", "get"))
