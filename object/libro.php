<?php
class Libro{
    public $titulo;
    public $autor;
    public $genero;
    public $fecha_publicacion;

    private $table = "libros";
    private $conexion;

    public function __construct($db){
        $this->conexion = $db;
    }

    function create(){
        $query = 'INSERT INTO ' . $this->table . ' (titulo, autor, genero, fecha_publicacion)
        VALUES (:titulo, :autor, :genero, :fecha_publicacion)';

        $stmt = $this->conexion->prepare($query);
        $this->titulo = htmlspecialchars(strip_tags($this->titulo));
        $this->autor = htmlspecialchars(strip_tags($this->autor));
        $this->genero = htmlspecialchars(strip_tags($this->genero));
        $this->fecha_publicacion = htmlspecialchars(strip_tags($this->fecha_publicacion));

        $stmt->bindParam(":titulo", $this->titulo);
        $stmt->bindParam(":autor", $this->autor);
        $stmt->bindParam(":genero", $this->genero);
        $stmt->bindParam(":fecha_publicacion", $this->fecha_publicacion);

        return $stmt->execute();
    }

	public function delete($id) {
    	$query = "DELETE FROM " . $this->table . " WHERE id = :id"; // Usa un placeholder con nombre
    	$stmt = $this->conexion->prepare($query);
    	$stmt->bindParam(":id", $id); // Usa bindParam con el placeholder

    	return $stmt->execute();
}

	public function modify() {
	    $query = 'UPDATE ' . $this->table . '
	              SET titulo = :titulo, autor = :autor, genero = :genero, fecha_publicacion = :fecha_publicacion
	              WHERE id = :id';

	    $stmt = $this->conexion->prepare($query);
	    
	    // Sanear datos
	    $this->titulo = htmlspecialchars(strip_tags($this->titulo));
	    $this->autor = htmlspecialchars(strip_tags($this->autor));
	    $this->genero = htmlspecialchars(strip_tags($this->genero));
	    $this->fecha_publicacion = htmlspecialchars(strip_tags($this->fecha_publicacion));
	    
	    // Vincular parámetros
	    $stmt->bindParam(":titulo", $this->titulo);
	    $stmt->bindParam(":autor", $this->autor);
	    $stmt->bindParam(":genero", $this->genero);
	    $stmt->bindParam(":fecha_publicacion", $this->fecha_publicacion);
	    $stmt->bindParam(":id", $this->id);

	    return $stmt->execute();
	}

}
?>
