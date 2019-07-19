<?php
//creamos la carpeta codec, y el archivo cifrado. Copiamos el contenido de table de la carpeta models, pero le cambiamos el nombre a Geeks, que es el que hemos definido en el json de composer y le cambiamos la carpeta a codec, que es la que hemos creado y en la que se encuentra este fichero.

namespace Geeks\codec;

class Cifrado{
    private $alfabetoBase = null;
    private  $alfabetoCesar = null;
    
    
    private function crearAlfabeto($desplaza){
        //creamos el alfabeto NORMAL
        for ($i=65; $i < 91 ; $i++) { //los números que asignamos a las i dependen de el código ASCII, que asigna a un número a cada letra. En este caso las mayúsculas van desde el 65 al 90
            $this->alfabetoBase[] =   chr($i);//chr() hace el cambio de números a ASCI. Hace la conversión.
        }
        //Creamos el alfabeto CÉSAR
        for ($i=65+$desplaza; $i < 91 ; $i++) { 
            $this->alfabetoCesar[] =   chr($i);
        }
        for ($i=65; $i < 65+$desplaza ; $i++) { 
            $this->alfabetoCesar[] =   chr($i);
        }
    }

    private function codificaCesar($nombre){
        for($i = 0; $i < strlen($nombre); $i++){
            $letra = substr($nombre, $i, 1);//substr es una especie de for. el primer argumento es el nombre, el segundo la posición y el tercero la cantidad de letras.
            $pos = array_search($letra, $this->alfabetoBase);
            $nombreCodificado[] = $nombreCodofocado.$this->alfabetoCesar[$pos];
        }
        return $nombreCodificado;
    }

    function codifica($nombre) {
        $this->crearAlfabeto(3);
        $nombreCodificado = $this->codificaCesar(strtoupper($nombre));//strtoupper() convierte nombre en mayúsculas, poeque en ascii hay diferenciación y no encontraría las letras
    }

    function getAlfabetoOriginal() {
        return $this->alfabetoBase;
    }

    function getAlfabetoCesar(){
        return $this->alfabetoCesar;
    }
}