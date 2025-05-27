<?php
include_once("Categoria.php");
include_once("Torneo.php");
include_once("Equipo.php");
include_once("Partido.php");
include_once("PartidoFutbol.php");
include_once("PartidoBasquet.php");

$catMayores = neW Categoria(1,'Mayores');
$catJuveniles = neW Categoria(2,'juveniles');
$catMenores = neW Categoria(1,'Menores');

$objE1 = neW Equipo("Equipo Uno", "Cap.Uno",1,$catMayores);
$objE2 = neW Equipo("Equipo Dos", "Cap.Dos",2,$catMayores);

$objE3 = neW Equipo("Equipo Tres", "Cap.Tres",3,$catJuveniles);
$objE4 = neW Equipo("Equipo Cuatro", "Cap.Cuatro",4,$catJuveniles);

$objE5 = neW Equipo("Equipo Cinco", "Cap.Cinco",5,$catMayores);
$objE6 = neW Equipo("Equipo Seis", "Cap.Seis",6,$catMayores);

$objE7 = neW Equipo("Equipo Siete", "Cap.Siete",7,$catJuveniles);
$objE8 = neW Equipo("Equipo Ocho", "Cap.Ocho",8,$catJuveniles);

$objE9 = neW Equipo("Equipo Nueve", "Cap.Nueve",9,$catMenores);
$objE10 = neW Equipo("Equipo Diez", "Cap.Diez",9,$catMenores);

$objE11 = neW Equipo("Equipo Once", "Cap.Once",11,$catMayores);
$objE12 = neW Equipo("Equipo Doce", "Cap.Doce",11,$catMayores);

/* Crear un objeto de la clase Torneo donde el importe base del premio es de: 100.000.  */
$elTorneo = new Torneo(100000);

/* crear 3 objetos partidos de Básquet  con la siguiente información: */
$equipoBasquet1 = new PartidoBasquet(11, "2024-05-05", $objE7, 80, $objE8, 120, 7);
$equipoBasquet2 = new PartidoBasquet(12, "2024-05-06", $objE9, 81, $objE10, 110, 8);
$equipoBasquet3 = new PartidoBasquet(13, "2024-05-07", $objE11, 115, $objE12, 85, 9);

/* Crear 3 objetos partidos de Fútbol con la siguiente información */
$equipoFutbol1 = new PartidoFutbol(14, "2024-05-07", $objE1, 3, $objE2, 2);
$equipoFutbol2 = new PartidoFutbol(15, "2024-05-08", $objE3, 0, $objE4, 1);
$equipoFutbol3 = new PartidoFutbol(16, "2024-05-09", $objE5, 2, $objE6, 3);

/* Completar el script testTorneo.php para invocar al método : */
/** ingresarPartido($objE5, $objE11, '2024-05-23', 'Futbol'); visualizar la respuesta y 
 * la cantidad de equipos del torneo. 
*/
$primerPartido=$elTorneo -> ingresarPartido($objE5, $objE11,'2024-05-23', "futbol");
//echo $primerParido;

/* ingresarPartido($objE11, $objE11, '2024-05-23', 'basquetbol') ; visualizar la respuesta y la cantidad de equipos del torneo. */
$segundoPartido = $elTorneo -> ingresarPartido($objE11, $objE11, "2024-05-23", "basquet");
//echo $segundoPartido;

/* ingresarPartido($objE9, $objE10, '2024-05-25', 'basquetbol'); visualizar la respuesta y la cantidad de equipos del torneo. */
$tercerPartido = $elTorneo -> ingresarPartido($objE9, $objE10, "2024-05-2025", "Basquet");
echo $tercerPartido;

/* darGanadores(‘basquet’) y visualizar el resultado. */
$ganadoresBasquet = $elTorneo -> darGanadores("basquet");

//print_r($ganadoresBasquet);

/* darGanadores(‘futbol’) y visualizar el resultado. */
$ganadoresFutbol = $elTorneo -> darGanadores("futbol");
//print_r($ganadoresFutbol);

/* calcularPremioPartido con cada uno de los partidos obtenidos en a,b,c. */
$premio = $elTorneo -> calcularPremioPartido($primerPartido);
$premio = $elTorneo -> calcularPremioPartido($segundoPartido);
$premio = $elTorneo -> calcularPremioPartido($tercerPartido);
//print_r($premio) ;

/* Realizar un echo del objeto  Torneo creado en (1). */
echo $elTorneo;
?>
