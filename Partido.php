<?php
class Partido{
    private $idpartido;
    private $fecha;
    private $objEquipo1;
    private $cantGolesE1;
    private $objEquipo2;
    private $cantGolesE2;
    private $coefBase;

    //CONSTRUCTOR
    public function __construct($idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2){
        $this->idpartido = $idpartido;
        $this->fecha = $fecha;
        $this->objEquipo1 =$objEquipo1;
        $this->cantGolesE1 = $cantGolesE1;
        $this->objEquipo2 = $objEquipo2;
        $this->cantGolesE2 = $cantGolesE2;
        $this->coefBase = 0.5;

    }

    //OBSERVADORES
    public function setidpartido($idpartido){
         $this->idpartido= $idpartido;
    }

    public function getIdpartido(){
        return $this->idpartido;
    }

    public function setFecha($fecha){
        $this->fecha= $fecha;
    }

    public function getFecha(){
        return $this->fecha;
    }

    public function setCantGolesE1($cantGolesE1){
        $this->cantGolesE1= $cantGolesE1;
    }

    public function getCantGolesE1(){
        return $this->cantGolesE1;
    }
    public function setCantGolesE2($cantGolesE2){
        $this->cantGolesE2= $cantGolesE2;
    }

    public function getCantGolesE2(){
        return $this->cantGolesE2;
    }

    public function setObjEquipo1($objEquipo1){
        $this->objEquipo1= $objEquipo1;
    }
    public function getObjEquipo1(){
        return $this->objEquipo1;
    }

    public function setObjEquipo2($objEquipo2){
        $this->objEquipo2= $objEquipo2;
    }
    public function getObjEquipo2(){
        return $this->objEquipo2;
    }

    public function setCoefBase($coefBase){
         $this->coefBase = $coefBase;
    }
    public function getCoefBase(){
        return $this->coefBase;
    }



    public function __toString(){
        //string $cadena
        $mensaje = "idpartido: ".$this->getIdpartido()."\n";
        $mensaje = "Fecha: ".$this->getFecha()."\n";
        $mensaje ="\n"."--------------------------------------------------------"."\n";
        $mensaje = "<Equipo 1> "."\n".$this->getObjEquipo1()."\n";
        $mensaje = "Cantidad Goles E1: ".$this->getCantGolesE1()."\n";
        $mensaje = "\n"."--------------------------------------------------------"."\n";
        $mensaje = "\n"."--------------------------------------------------------"."\n";
        $mensaje = "<Equipo 2> "."\n".$this->getObjEquipo2()."\n";
        $mensaje = "Cantidad Goles E2: ".$this->getCantGolesE2()."\n";
        $mensaje = "\n"."--------------------------------------------------------"."\n";
        return $mensaje;
    }

    /** En cada partido se gestiona un coeficiente base cuyo valor por defecto es 0.5  y es 
     * aplicado a la cantidad de goles y a la cantidad de jugadores de cada equipo. Es decir:
     *  coef =  0,5 * cantGoles * cantJugadores  donde cantGoles : es la cantidad de goles;   
     * cantJugadores : es la cantidad de jugadores.
    */
    public function coeficienteBase(){
        $base = $this -> getCoefBase();
        $cantJE1 = $this -> getObjEquipo1() -> getCantJugadores();//Obtengo la cantidad de jugadores del equipo 1
        $cantGolE1 = $this -> getCantGolesE1();//Obtengo la cantidad de goles del equipo1
        $cantJE2 = $this -> getObjEquipo2() -> getCantJugadores();//Obtengo la cantidad de jugadores del equipo2
        $cantGolE2 = $this -> getCantGolesE2();//Goles equipo 2

        $golesTotales = $cantGolE1 + $cantGolE2;//goles totales
        $jugadoresTotal = $cantJE1 + $cantJE2;//total jugadores

        $coeficiente = $base * $golesTotales * $jugadoresTotal;

        return $coeficiente;

    }

    /** Implementar en la clase Partido el método darEquipoGanador() que retorna el equipo 
     * ganador de un partido (equipo con mayor cantidad de goles del partido), en caso de 
     * empate debe retornar a los dos equipos.  
    */

    public function darEquipoGanador(){
        $golesE1 = $this -> getCantGolesE1();
        $golesE2 = $this -> getCantGolesE2();
        $equipo1 = $this -> getObjEquipo1();
        $equipo2 = $this -> getObjEquipo2();

        if ($golesE1 > $golesE2) {
            $ganador = $equipo1;
        } elseif ($golesE1 < $golesE2) {
            $ganador = $equipo2;
        } else {
            $ganador = [$equipo1, $equipo2];
        }

        return $ganador;
    } 

}


?>