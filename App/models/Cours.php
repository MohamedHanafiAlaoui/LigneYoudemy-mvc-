<?php

namespace App\Models;

class Cours
{
    private $id_cours;
    private $titre_cours;
    private $contenu;
    private $description;
    private $id_user;
    private $s_status;
    private $id_categories;
    private $d_date;
    private $image;
    private $FullName;
    private $namecategories;
    private $tags_names;

    public function __construct($id_cours, $titre_cours, $contenu, $description, $id_user, $s_status, $id_categories, $d_date, $image, $FullName = null, $namecategories = null, $tags_names = null)
    {
        $this->id_cours = $id_cours;
        $this->titre_cours = $titre_cours;
        $this->contenu = $contenu;
        $this->description = $description;
        $this->id_user = $id_user;
        $this->s_status = $s_status;
        $this->id_categories = $id_categories;
        $this->d_date = $d_date;
        $this->image = $image;
        $this->FullName = $FullName;
        $this->namecategories = $namecategories;
        $this->tags_names = $tags_names;
    }

 
    public function setIdCours($id_cours) { $this->id_cours = $id_cours; }
    public function getIdCours() { return $this->id_cours; }

    public function setTitreCours($titre_cours) { $this->titre_cours = $titre_cours; }
    public function getTitreCours() { return $this->titre_cours; }

    public function setContenu($contenu) { $this->contenu = $contenu; }
    public function getContenu() { return $this->contenu; }

    public function setDescription($description) { $this->description = $description; }
    public function getDescription() { return $this->description; }

    public function setIdUser($id_user) { $this->id_user = $id_user; }
    public function getIdUser() { return $this->id_user; }

    public function setSStatus($s_status) { $this->s_status = $s_status; }
    public function getSStatus() { return $this->s_status; }

    public function setIdCategories($id_categories) { $this->id_categories = $id_categories; }
    public function getIdCategories() { return $this->id_categories; }

    public function setDate($d_date) { $this->d_date = $d_date; }
    public function getDate() { return $this->d_date; }

    public function setImage($image) { $this->image = $image; }
    public function getImage() { return $this->image; }

    public function setFullName($FullName) { $this->FullName = $FullName; }
    public function getFullName() { return $this->FullName; }

    public function setNameCategories($namecategories) { $this->namecategories = $namecategories; }
    public function getNameCategories() { return $this->namecategories; }

    public function setTagsNames($tags_names) { $this->tags_names = $tags_names; }
    public function getTagsNames() { return $this->tags_names; }
}
