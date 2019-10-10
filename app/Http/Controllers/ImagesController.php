<?php

namespace App\Http\Controllers;

use App\Services\ImageService;
use Illuminate\Http\Request;

class ImagesController extends Controller
{
    private $imageService;

    public function __construct( ImageService $imgService )
    {
        $this -> imageService = $imgService;
    }

    function index()
    {
        $getAllImages = $this -> imageService -> all();

        return view( 'welcome', [ 'imagesInView' => $getAllImages ] );
    }

    function create()
    {
        return view( 'create' );
    }

    function store( Request $request )
    {
        /* $request -> file( 'image' ) тоже самое что и $_FILES['image'] */
        $image = $request -> file( 'image' );
        $this -> imageService -> add( $image );

        return redirect( '/' );
    }

    function show( $id )
    {
        $showImage = $this -> imageService -> show( $id );

        return view( 'show', [ 'showImage' => $showImage ] );
    }

    function edit( $id )
    {
        //Для получения ID использовал готовый кусок кода из метода show >>> $this -> imageService -> show( $id )
        //В вид передал путь к изображению и его ID
        $editImage = $this -> imageService -> show( $id );

        return view( 'edit', [ 'editImage' => $editImage, 'editImageID' => $id ] );
    }

    function update( Request $request, $id )
    {
        $this -> imageService -> update( $id, $request );

        return redirect( '/' );
    }

    function delete( $id )
    {
        $this -> imageService -> delete( $id );

        return redirect( '/' );
    }
}
