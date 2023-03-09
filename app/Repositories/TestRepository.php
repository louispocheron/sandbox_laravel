<?php

namespace App\Repositories;

class TestRepository {

    public function sayHi(){
        return 'hi';
    }
    

    // RENVOIE LA DISTANCE EN KM ENTRE DEUX POINT SI ONT DONNE LAT ET LON DES DEUX POINTS
    // A VOIR SI ON PEUT RENVOYER LA DISTANCE EN METRE POUR ETRE PLUS PRECIS 
    public function distance($lat1, $lon1, $lat2, $lon2) {
        $earth_radius = 6371; // Rayon de la Terre en kilomètres
        $dLat = deg2rad($lat2 - $lat1);
        $dLon = deg2rad($lon2 - $lon1);
        $a = sin($dLat / 2) * sin($dLat / 2) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * sin($dLon / 2) * sin($dLon / 2);
        $c = 2 * asin(sqrt($a));
        $distance = $earth_radius * $c; // Distance en kilomètres
        return $distance;
    }

        // PAS OUF CAR LA VILLE REFERENTE RESTE TOUJOURS LA MEME DONC FORCEMENT CA NE FONCTIONNE PAS COMME PREVU 

            // public function sortMarkers($referenceLat, $referenceLon, $markers) {
            //     $markersDistance = [];
            //     foreach($markers as $marker=>$coords) {
            //       $lat = $coords[0];
            //       $lon = $coords[1];
            //       $distance = $this->distance($referenceLat, $referenceLon, $lat, $lon);
            //       $markersDistance[$marker] = $distance;
            //     }
            //     asort($markersDistance);
            //     return array_keys($markersDistance);
            //   }


    public function sortMarkersbetter($referenceLat, $referenceLon, $markers){
        $sortedMarkers = [];
        // TANT QU'IL Y A DES MARKERS ONT CONTINUE 
        while(count($markers) > 0) {
            $markerDistances = [];
            foreach($markers as $marker=>$coords) {
                $lat = $coords['lat'];
                $lon = $coords['lon'];
                $distance = $this->distance($referenceLat, $referenceLon, $lat, $lon);
                $markerDistances[$marker] = $distance;
            }

            asort($markerDistances);
            $closestMarker = key($markerDistances);
            $sortedMarkers[] = $closestMarker;

            // NOUVELLE $referencelat et lon a chaque fois car l'algo n'aurait pas de sens sinon
            $referenceLat = $markers[$closestMarker]['lat'];
            $referenceLon = $markers[$closestMarker]['lon'];
            // unset le closest marker pour en donner un nouveau
            unset($markers[$closestMarker]);
        }
        return $sortedMarkers;
    }
    
}
