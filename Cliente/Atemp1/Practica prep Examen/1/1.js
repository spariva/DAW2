var listaPelis =[];
listaPelis = [["Matrix","1999",["Keanu Reeves", "Laurence Fishburne", "Carrie-Anne Moss"]],
    ["El señor de los anillos","2001",["Elijah Wood", "Ian McKellen", "Viggo Mortensen"]],
    ["El padrino","1972",["Marlon Brando", "Al Pacino", "James Caan"]]
]
function listarPeliculas(){
    var pelis = document.getElementById("pelis");
    var content = "";
    listaPelis.forEach(function(pelicula) {
        content += ` <div> 
        <h2>${pelicula[0]}</h2> 
        <p>Año: ${pelicula[1]}</p> 
        <p>Actores Principales: ${pelicula[2].join(", ")}</p> 
        </div> `;
    });
    pelis.innerHTML = content;
}

window.onload = function() { 
    listarPeliculas(); 
    }

/* function listarPeliculas(){
    var lista = document.getElementById("pelis");
    var contenido = "";
    for (var i in listaPelis){
        contenido += "<div>" + listaPelis[i].titulo + listaPelis[i].año + listaPelis[i].actores + "</div>";
    }
    lista.innerHTML = contenido;
} */