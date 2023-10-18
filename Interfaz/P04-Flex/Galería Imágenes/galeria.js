var img = ["https://makspariva.files.wordpress.com/2018/10/fireflies.jpg", "https://makspariva.files.wordpress.com/2018/09/lostinsociety.jpg", "https://makspariva.files.wordpress.com/2018/10/foundsilence.jpg", "https://makspariva.files.wordpress.com/2018/09/img_9724.jpg"];
var img2 =["https://makspariva.files.wordpress.com/2018/07/img_0417.jpg", "https://makspariva.files.wordpress.com/2018/10/mg_7000.jpg", "https://makspariva.files.wordpress.com/2018/10/mg_0622.jpg", "https://makspariva.files.wordpress.com/2018/09/los-abrigos-son-para-los-lunes-de-lluvia3.jpg"]
var img3 =["https://makspariva.files.wordpress.com/2018/10/scan10098.jpg", "https://makspariva.files.wordpress.com/2018/10/img_9626.jpg", "https://makspariva.files.wordpress.com/2018/10/img_9625.jpg", "https://makspariva.files.wordpress.com/2018/10/mg_0516.jpg"]
const imagenElemento = document.getElementById('miImagen');
var contador = 0;
console.log(imagenElemento.src); 
function cambiarImagen(arr) {  
    if(contador>=arr.length){
        imagenElemento.src = arr[0];
        contador = 0;
    }
    imagenElemento.src = arr[contador];
    contador ++;
}
