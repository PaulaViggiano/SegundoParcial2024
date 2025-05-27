<?php
    class PartidoFutbol extends Partido{
        //METODO CONSTRUCTOR
        public function __construct($idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2){
            parent::__construct($idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2);
        }

        public function __toString() {
            $mensaje = parent::__toString();
            return $mensaje;
        }

        public function coeficienteBase() {
            $categoria = $this -> getObjEquipo1() -> getObjCategoria() -> getDescripcion();//Obtengo la categoria
            $coef = 0;//Inicializo en cero, le doy valor segun categoria

            if ($categoria === "menores") {
                $coef = 0.13;
            } elseif ($categoria === "juveniles") {
                $coef = 0.19;
            } elseif ($categoria === "mayores") {
                $coef = 0.27;
            }

            $cantJE1 = $this -> getObjEquipo1() -> getCantJugadores();//Jugadores equipo 1
            $cantJE2 = $this -> getObjEquipo2() -> getCantJugadores();//Juagadores equipo 2
            $golesE1 = $this -> getCantGolesE1();//goles equipo 1
            $golesE2 = $this -> getCantGolesE2();//goles equipo 2

            $totalJugadores = $cantJE1 + $cantJE2;//total jugadores
            $totalGoles = $golesE1 + $golesE2;//total goles

            $coeficiente = $coef * $totalJugadores * $totalGoles;

            return $coeficiente;
        }

        
    }



?>