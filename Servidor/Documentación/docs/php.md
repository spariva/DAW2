# Explorando PHP

Durante mis días de descanso, he dedicado tiempo a estudiar PHP e intentar escribir código. Algunos de los temas que he explorado incluyen:

- **Repasar lo básico**: Estaba muy perdida<¿¿???>.
- **Conexión con bases de datos**: Intenté entender qué tenemos que hacer en el proyecto, no lo conseguí.
- **Desarrollo web con PHP**: Buenas prácticas y típicos vídeos de youtube.

![notion3](img/notion3.png)

## Notion

![notion1](img/notion1.png)

También he intentado organizarme, dando mis primeros pasos con Notion y desarrollando una wiki de programación con lo que voy aprendiendo.

[mi web](https://https://www.notion.so/Wiki-de-programaci-n-1cf2c133a0ee4155907f022d9fcf3315/)
![notion2](img/notion2.png)

### Bloque de código en Md:

```php
<?php 
//Ay los planetas... Me pilla la sintaxis por haber puesto el lenguaje tras el triple backtick.
        public function loadPlanetFromFile(){
        $file = fopen("planetas.txt", "r");
        $planetas = [];
        while(!feof($file)){//mientras no llegue al final del archivo/siga abierto es el feof
            $linea = fgets($file);
            $planeta = explode(" ", $linea);//separa la linea por espacios y lo guarda en un array
            $planetas[] = new Planeta($planeta[0], $planeta[1], $planeta[2], $planeta[3]);
        }
        fclose($file);
        return $planetas;
    }
?>
```

### Ejemplo de otro lenguaje:

```javascript
                const a2 = document.getElementById('div2');
                const e2 = document.querySelector('div#div2 ol');
               function resaltar2(){
                a2.classList.toggle('resaltar');
               }

               function ocultar2(){
                if (!e2.classList.contains('display-hidden')) {
                    e2.classList.add('display-hidden');
                    }
               }
               
               function mostrar2(){
                if (e2.classList.contains('display-hidden')) {
                    e2.classList.remove('display-hidden');
                    }
               }
```
