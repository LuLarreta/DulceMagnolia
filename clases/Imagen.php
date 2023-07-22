<?PHP

class Imagen
{
    private $error;


    public function subirImagen($directorio, $datosArchivo): string
    {

        echo "<pre>";
        print_r($datosArchivo);
        echo "</pre>";

       
        if (!empty($datosArchivo['tmp_name'])) {
            //le damos un nuevo nombre
            $og_name = (explode(".", $datosArchivo['name']));
            $extension = end($og_name);
            $filename = time() . ".$extension";

            $fileUpload = move_uploaded_file($datosArchivo['tmp_name'], "$directorio/$filename");

            if (!$fileUpload) {
                throw new Exception("No se pudo subir la imagen");
            } else {
                return $filename;
            }
        }
    }

    public function borrarImagen($archivo): bool
    {
        if (file_exists(($archivo))) {
            if (is_file($archivo)) {
            $fileDelete =  unlink($archivo);

            if (!$fileDelete) {
                throw new Exception("No se pudo borrar la imagen");
            } else {
                return TRUE;
            }
        }else{
            throw new Exception("No se pudo borrar la imagen: El archivo no es válido.");
        }
        }else{
            return FALSE;
        }
    }
   
    /**
     * Get the value of error
     */
    public function getError()
    {
        return $this->error;
    }
}