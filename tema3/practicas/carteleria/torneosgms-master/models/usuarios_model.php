<?php
class usuarios_model{

  private $db;
  private $usuarios;


  private $usuario;
  private $password;
  private $nombre;


  public function __construct(){
    $this->db=Conectar::conexion();
    $this->usuarios=array();
  }

  /* GETTERS & SETTERS */

  public function getUsuario() {
    return $this->usuario;
  }

  public function setUsuario($usuario) {
    $this->usuario = $usuario;
  }

  public function getPassword() {
    return $this->password;
  }

  public function setPassword($password) {
    $this->password = $password;
  }

  public function getNombre() {
    return $this->nombre;
  }

  public function setNombre($nombre) {
    $this->nombre = $nombre;
  }






  /**
  * Inserta un registre a la taula
  * @return [false]  si no hi ha hagut cap error,
  *         [string] amb text d'error si no ha anat bé
  */
  public function insertar() {
    $salt = "encriptat";
    $hashed_password = crypt($this->password, $salt);
    $sql = "SELECT * from usuarios";
    $result = $this->db->query($sql);
    $ok = true;
    while($row = $result->fetch_assoc()){
      if($row['usuario'] === $this->usuario){
        $ok = false;
        echo "<script language='JavaScript'>alert('Usuario existente');</script>"; 

session_unset();
session_destroy();
echo "<script language='JavaScript'>setTimeout(() =>{window.location ='index.php?controller=usuarios&action=registroView'},1);</script>"; 
  
      }
    }
    if($ok){
      $sql = "INSERT INTO usuarios (usuario, password, nombre) VALUES ('{$this->usuario}','{$hashed_password}','{$this->nombre}')";
      $result = $this->db->query($sql);
  
      $_SESSION["usuario"] = $this->usuario;
      header( "Location: index.php");
  
      if ($this->db->error){ return "$sql<br>{$this->db->error}";}
     
      else {
        return false;
      }
    }

  }

  //Función para buscar un usuario y su contraseña en la base de datos
  public function buscar_usuarios(){


    // $usuarioactual = $_SESSION["usuario"];

    $sql = "SELECT usuario, password FROM usuarios WHERE usuario = '{$this->usuario}';";
    $result = $this->db->query($sql);
    $row = mysqli_fetch_assoc($result);
    $valid_password = password_verify($this->password, $row['password']);


    if($result->num_rows > 0) {
      if ($valid_password) {
        return true;
      } else {
      
        return false;
      }
    } else {
      return false;
    }


  }

}
?>
