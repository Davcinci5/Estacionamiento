<?php

class Usuario {

  private $id_usuarios;
  private $Nombre_Usuario;
  private $Password;
  private $Admin;
  private $Activo;

  public function getId_usuarios(){
    return $this->id_usuarios;
  }

  public function setId_usuarios($id_usuarios){
    $this->id_usuarios = $id_usuarios;
  }

  public function getNombre_Usuario(){
    return $this->Nombre_Usuario;
  }

  public function setNombre_Usuario($Nombre_Usuario){
    $this->Nombre_Usuario = $Nombre_Usuario;
  }

  public function getPassword(){
    return $this->Password;
  }

  public function setPassword($Password){
    $this->Password = $Password;
  }

  public function getAdmin(){
    return $this->Admin;
  }

  public function setAdmin($Admin){
    $this->Admin = $Admin;
  }

  public function getActivo(){
    return $this->Activo;
  }

  public function setActivo($Activo){
    $this->Activo = $Activo;
  }

}

?>
