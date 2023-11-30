<?php

/*
Debes definir una estructura adecuada para este problema
*/
$tablero = [];




// Serialización del tablero
$tablero_serializado = htmlspecialchars(serialize($tablero));

?>

<html>
<head>
  <link rel="stylesheet" type="text/css" media="all" href="css/estilo.css">
  <title>3 en Raya</title>
</head>
<body>
  <h1>3 en raya</h1>
  <table>
    <tr>
      <td>&nbsp;</td>
      <td>O</td>
      <td>X</td>
    </tr>
    <tr>
      <td>X</td>
      <td>O</td>
      <td>X</td>
    </tr>
    <tr>
      <td>X</td>
      <td>O</td>
      <td>X</td>
    </tr>
  </table>
  <div class="error">
    Esto es un texto de error
  </div>
  <div class="error">
    Jugador AAA ha ganado
    <a href="">Juego nuevo</a>
  </div>
  <form action="PONER_VALOR" method="post">
      turno:
      <select name="turno">
        <option value="X">X</option>
        <option value="O">O</option>
      </select>
      <br>
      x: <input type="text" name="posx" value=""><br>
      y: <input type="text" name="posy" value=""><br>
      <input type="hidden" name="tablero" value="TODO_PONER_VALOR"><br>
      <button type="submit" name="submit">Jugar</button>
  </form>
</body>
</html>
