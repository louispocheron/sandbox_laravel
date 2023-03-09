<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\TestRepository;
use Illuminate\Http\Request;

class TestApiController extends Controller
{
    private $repo;
    public function __construct(TestRepository $repo)
    {
        $this->repo = $repo;
    }

    public function index()
    {
        // on prend un marker en reference ici
        $referenceLat = 48.856614;
        $referenceLon = 2.3522219; 

        //Array de marker 
        
        $markers = [
            "Paris" => [
                'lat' => 48.856614,
                'lon' => 2.3522219
            ],
            "Lyon" => [
                'lat' =>45.764043,
                'lon' => 4.835659
            ],
            "Marseille" => [
                'lat' =>3.296482,
                'lon' => 5.3697805
            ],
            "dijon" => [
                'lat' =>47.3220, 
                'lon' => 5.0415
            ],
            "arbois" => [
                'lat' =>46.9029, 
                'lon' =>5.7723
            ]
        ];
        
        $sortedMarkers = $this->repo->sortMarkersbetter($referenceLat, $referenceLon, $markers);
        return $sortedMarkers;

        // API RENVOIE CA : 
//        // [
            // 	"Paris",
            // 	"dijon",
            // 	"arbois",
            // 	"Lyon",
            // 	"Marseille"
        // ]

    // a l'air de marcher... 

    }


}
