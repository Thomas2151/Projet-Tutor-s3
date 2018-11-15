<?php

/**
 * VueMarqueur short summary.
 *
 * VueMarqueur description.
 *
 * @version 1.0
 * @author thoma
 */
class VueMarqueur
{



/* Axe horizontal */
function tableauMarqueur(array $marqueur) {
        $bgColor = "style=\"background-color:grey\""; //css pour colorer l'axe horizontal et vertical
        $table = "<table border=\"1\" style=\"border-color:black; border-style:solid\">";

        /* Axe horizontal */

        $table .= "<tr>";
        $table .= "<td ".$bgColor.">ID</td>";
        $table .= "<td ".$bgColor.">Pays</td>";
        $table .= "<td ".$bgColor.">Latitude</td>";
        $table .= "<td ".$bgColor.">Longitude</td>";
        $table .= "<td ".$bgColor.">Ville</td>";
        $table .= "<td ".$bgColor.">Info</td>";
        $table .= "</tr>";
        for ($i=0; $i<sizeof($marqueur); $i++) {
            $table .= "<tr>";
            $table .= "<td>".$marqueur[$i]->id()."</td>";
            $table .= "<td>".$marqueur[$i]->pays()."</td>";
            $table .= "<td>".$marqueur[$i]->latitude()."</td>";
            $table .= "<td>".$marqueur[$i]->longitude()."</td>";
            $table .= "<td>".$marqueur[$i]->ville()."</td>";
            $table .= "<td>".$marqueur[$i]->info()."</td>";
            $table .= "</tr>";
        }
    $table .= "</table>";

        $table .= "</table>";
        return $table;
    }

}