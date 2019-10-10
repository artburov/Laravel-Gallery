<?php


namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ImageService
{

    public function all()
    {
        //Получаем из БД всю информацию используя get();
        $images = DB ::table( 'images' ) -> select( '*' ) -> get();
        return $images -> all();
    }

    public function add( $image )
    {
        //В таблицу images, в столбец image вставляем путь к картинке на локальном сервере,
        // который передается через $image -> store(папка назначения) #Laravel doc => #File Uploads
        DB ::table( 'images' ) -> insert(
            [ 'image' => $image -> store( 'uploads' ) ]
        );
    }

    public function show( $id )
    {
        //Получаем информацию из БД по заданному ID, забираем только первое(уникальное) вхождение используя first()
        $image = DB ::table( 'images' ) -> select( '*' ) -> where( 'id', $id ) -> first();

        //Получаем путь к изображению по внутреннему значению
        return $imagePath = $image -> image;
    }

    public function update( $id, $request )
    {
        //Перед обновлением удаляю старое изображение из папки сервера,
        //получаю путь из БД, в $pathLocalImage можно было использовать метод show выше
        $pathLocalImage = DB ::table( 'images' ) -> select( '*' ) -> where( 'id', $id ) -> first();
        Storage ::delete( $pathLocalImage -> image );

        //Сохраняю новое изображение в uploads и передаю его путь в БД
        $imageName = $request -> image -> store( 'uploads' );

        DB ::table( 'images' )
            -> where( 'id', $id )
            -> update( [ 'image' => $imageName ] );
    }

    public function delete( $id )
    {
        //Удаление локальной версии изображения, аналогично по сути с update выше
        $image = DB ::table( 'images' ) -> select( '*' ) -> where( 'id', $id ) -> first();
        Storage ::delete( $image -> image );

        //По ID удаляю изображение из БД
        DB ::table( 'images' ) -> where( 'id', $id ) -> delete();
    }
}
