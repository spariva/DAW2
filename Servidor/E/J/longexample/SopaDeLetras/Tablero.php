<?php

class Tablero {
    private $tablero = [];
    private $rows;
    private $cols;

    public function __construct() {}

    public function inicializaSopaLetras($rows, $cols) {
        $this->rows = $rows;
        $this->cols = $cols;

        for ($i=0; $i < $rows; $i++) { 
            for ($j=0; $j < $cols; $j++) { 
                $letra = chr(rand(ord('a'), ord('z')));
                
                $this->tablero[$i][$j] = $letra;
            }
        }

    }

    public function pintaTablero() {
?>
        <table>
            <?php foreach ($this->tablero as $fila) : ?>
                <tr>
                    <?php foreach ($fila as $celda) : ?>
                        <td><?= $celda ?></td>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
        </table>
<?php
    }

    public function colocaPalabraHorizontal($word) {
        do {
            $posY = mt_rand(0, $this->rows - 1);
            $posX = mt_rand(0, ($this->cols - strlen($word)));
        } while (($posX + strlen($word)) > $this->cols);

        $letter = 0;
        for ($i=$posX; $i < ($posX + strlen($word)); $i++) { 
            $this->tablero[$posY][$i] = $word[$letter];
            $letter++;
        }
    }

    public function colocaPalabraHorizontalAlreves($word) {
        $word = strrev($word);
        do {
            $posY = mt_rand(0, $this->rows - 1);
            $posX = mt_rand(0, ($this->cols - strlen($word)));
        } while (($posX + strlen($word)) > $this->cols);

        $letter = 0;
        for ($i=$posX; $i < ($posX + strlen($word)); $i++) { 
            $this->tablero[$posY][$i] = $word[$letter];
            $letter++;
        }
    }

    public function colocaPalabraVertical($word) {
        do {
            $posY = mt_rand(0, ($this->rows - strlen($word)));
            $posX = mt_rand(0, $this->cols - 1);
        } while (($posY + strlen($word)) > $this->rows);

        $letter = 0;
        for ($i=$posY; $i < ($posY + strlen($word)); $i++) { 
            $this->tablero[$i][$posX] = $word[$letter];
            $letter++;
        }
    }

    public function colocaPalabraVerticalAlreves($word) {
        $word = strrev($word);
        do {
            $posY = mt_rand(0, ($this->rows - strlen($word)));
            $posX = mt_rand(0, $this->cols - 1);
        } while (($posY + strlen($word)) > $this->rows);

        $letter = 0;
        for ($i=$posY; $i < ($posY + strlen($word)); $i++) { 
            $this->tablero[$i][$posX] = $word[$letter];
            $letter++;
        }
    }

    public function colocaPalabra($word){
        $function = mt_rand(0, 3);

        $word = strtolower($word);
        switch ($function) {
            case 0:
                self::colocaPalabraHorizontal($word);
                break;
            case 1:
                self::colocaPalabraHorizontalAlreves($word);
                break;
            case 2:
                self::colocaPalabraVertical($word);
                break;
            case 3:
                self::colocaPalabraVerticalAlreves($word);
                break;
        }
    }
}