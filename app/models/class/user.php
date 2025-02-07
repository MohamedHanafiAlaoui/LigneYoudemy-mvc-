<?php



class  User
{
  private  $id_user; 
  private $FullName ;
  private $Password ;
  private $Email ;
  private $id_role; 
  private $image_user;
  private $s_status;
  private $bane;
  protected $conn;
  function __construct($id_user,$FullName,$Password,$Email,$id_role,$image_user,$s_status="active",$bane="bane"){

    $this ->id_user = $id_user;
    $this ->FullName = $FullName;
    $this ->Email = $Email;
    $this ->id_role = $id_role;
    $this ->Password = $Password;

    $this ->image_user = $image_user;
    $this ->s_status = $s_status;
    $this ->bane = $bane;
  }



  public function getid()
  {
    return $this->id_user;
  }

  public function getFullName()
  {

    return $this->FullName;
    
  }
  public function getPassword()
  {

    return $this->FullName;
    
  }

  public function getEmail()
  {

    return $this->Email;
    
  }

  public function getimage_user()
  {

    return $this->image_user;
    
  }

  public function getid_role()
  {
    return $this -> id_role;
  }

  public function gets_status()
  {
    return $this -> s_status;
  }

  public function getbane()
  {
    return $this -> bane;
  }



  public function __tostring()
  {
    return "$this->FullName";
  }



}