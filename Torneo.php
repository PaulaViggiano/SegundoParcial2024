<?php
    class Torneo {
        private $colPartidos;
        private $premio;

        //METODO CONSTRUCTOR 
        public function __construct($premio){
            $this -> colPartidos = [];
            $this -> premio = $premio;
        }

        //METODOS DE ACCESO GETTERS Y SETTER
        public function setColPartidos($colPartidos){
            $this -> colPartidos = $colPartidos;
        }
        public function getColPartidos(){
            return $this -> colPartidos;
        }
        public function setPremio($premio){
            $this -> premio = $premio;
        }
        public function getPremio(){
            return $this -> premio;
        }
        //metodo toString
        public function __toString(){
            $partidos = $this -> getColPartidos();
            $cadenaCol = "";
            foreach ($partidos as $partido) {
                $cadenaCol .= $partido . "\n";
            }
            $mensaje = "Premio: " . $this -> getPremio() . "\n";
            $mensaje .= "Partidos: \n" . $cadenaCol;

            
            return $mensaje;
        }    

        /** Implementar el método ingresarPartido($OBJEquipo1, $OBJEquipo2, $fecha, $tipoPartido) en la  
         * clase Torneo el cual recibe por parámetro 2 equipos, la fecha en la que se realizará el partido 
         * y si se  trata de un partido de futbol o basquetbol . El método debe crear y retornar la 
         * instancia de la clase Partido que corresponda y almacenarla en la colección de partidos 
         * del Torneo. Se debe chequear que los 2 equipos tengan la misma categoría e igual cantidad 
         * de jugadores, caso contrario no podrá ser registrado ese partido en el torneo. 
         * @param object $OBJEquipo1
         * @param object $OBJEquipo2
         * @param string $fecha
         * @param string $tipoPartido
         * @return object $partido
        */
        public function ingresarPartido($OBJEquipo1, $OBJEquipo2, $fecha, $tipoPartido){
            $arregloPartidos = $this -> getColPartidos();
            $id = count($arregloPartidos) + 1;
            $equipo1 = $OBJEquipo1 -> getCantJugadores();//Juagadores equipo 1
            $equipo2 = $OBJEquipo2 -> getCantJugadores();//jugadores equipo 2
            $categoria1 = $OBJEquipo1 -> getObjCategoria() -> getDescripcion();//categoria equipo 1
            $categoria2 = $OBJEquipo2 -> getObjCategoria() -> getDescripcion();//categoria equipo 2
            $partido = null;
            $tipoPartido = strtolower($tipoPartido);
            if ($tipoPartido == "futbol") {
                
                if ($equipo1 == $equipo2 && $categoria1 == $categoria2) {
                    $partido = new PartidoFutbol($id, $fecha, $OBJEquipo1,3, $OBJEquipo2, 1);
                    $arregloPartidos[] = $partido;
                    $this -> setColPartidos($arregloPartidos);
                    
                } 
                
            } elseif ($tipoPartido == "basquet") {
                if ($equipo1 == $equipo2 && $categoria1 == $categoria2) {
                    $partido = new PartidoBasquet($id, $fecha, $OBJEquipo1, 35, $OBJEquipo2, 87, 5);
                    $arregloPartidos[] = $partido;
                    $this -> setColPartidos($arregloPartidos);
                }
            } 

            return $partido;
        }

        /** Implementar el método darGanadores($deporte) en la clase Torneo que recibe por parámetro 
         * si se trata de un partido de fútbol o de básquetbol y en  base  al parámetro busca entre 
         * esos partidos los equipos ganadores ( equipo con mayor cantidad de goles). El método retorna 
         * una colección con los objetos de los equipos encontrados.  
         *@param string $deporte
         *@return array
        */

        public function darGanadores($deporte){
            
            $partidos = $this -> getColPartidos();//Obtengo la colecccion de partidos
            $ganadores = [];//Inicializo el return vacio

            foreach ($partidos as $partido) {
                $esPartidoFutbol = is_a($partido, 'PartidoFutbol');//Me fijo si el objeto es el tipo que estoy buscando para guardar
                $esPartidoBasquet = is_a($partido, 'PartidoBasquet');
                if ($esPartidoFutbol && $deporte == "futbol") {
                    $ganador = $partido -> darEquipoGanador();
                    $ganadores[] = $ganador;
                } elseif ($esPartidoBasquet && $deporte == "basquet") {
                    $ganador = $partido -> darEquipoGanador();
                    $ganadores[] = $ganador;
                }
                
            }

            return $ganadores;
        }

        /** Implementar el método calcularPremioPartido($OBJPartido) que debe retornar un arreglo asociativo 
         * donde una de sus claves es ‘equipoGanador’  y contiene la referencia al equipo ganador; 
         * y la otra clave es ‘premioPartido’ que contiene el valor obtenido del coeficiente del Partido
         *  por el importe configurado para el torneo. (premioPartido = Coef_partido * ImportePremio)
         * @param object $OBJPartido
         * @return array
        */

        public function calcularPremioPartido($OBJPartido){
            $elPremio = $this -> getPremio();//Obtengo el valor del premio base
            if ($OBJPartido == null) {
                $premioPartido = ['equipo ganador' => '---',
                                'premio partido' => 0];
            } else {
                $equipoGanador = $OBJPartido -> darEquipoGanador();
                $premioPartido = $OBJPartido -> coeficienteBase() * $elPremio;

                $premioPartido = ['Equipo ganador' => $equipoGanador, 'Premio partido' => $premioPartido];
            }

            return $premioPartido;
        }




    }



?>