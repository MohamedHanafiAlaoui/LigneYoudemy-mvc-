<?php

require __DIR__ . "/Cours.php";
require __DIR__ . "/../config/database.php"; 

class CoursManager
{
    private $conn;

    public function __construct()
    {
        $this->conn = Database::getConnection(); 
    }

    public function createCourse(Cours $cours)
    {
        try {
            $query = "INSERT INTO cours (titre_cours, contenu, description, id_user, s_status, id_categories, d_date, image) 
                      VALUES (:titre_cours, :contenu, :description, :id_user, :s_status, :id_categories, :d_date, :image)";
            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(':titre_cours', $cours->getTitreCours());
            $stmt->bindParam(':contenu', $cours->getContenu());
            $stmt->bindParam(':description', $cours->getDescription());
            $stmt->bindParam(':id_user', $cours->getIdUser());
            $stmt->bindParam(':s_status', $cours->getSStatus());
            $stmt->bindParam(':id_categories', $cours->getIdCategories());
            $stmt->bindParam(':d_date', $cours->getDate());
            $stmt->bindParam(':image', $cours->getImage());

            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            error_log("Database error: " . $e->getMessage());
            throw new Exception("An error occurred while creating the course: " . $e->getMessage());
        }
    }

    public function getAllCourses($page = 1, $search = null, $nametags = null)
    {
        try {
            $limit = 5; 
            $offset = ($page - 1) * $limit;

            $query = "SELECT cours.*, user.FullName, categories.namecategories, GROUP_CONCAT(tags.name_tag) AS tags_names 
                      FROM cours 
                      JOIN tagscours ON cours.id_cours = tagscours.id_cours 
                      JOIN tags ON tags.id_tag = tagscours.id_tag 
                      JOIN user ON cours.id_user = user.id_user 
                      JOIN categories ON cours.id_categories = categories.id_categories 
                      WHERE cours.s_status = 'active' 
                      AND cours.titre_cours LIKE :search 
                      AND tags.name_tag LIKE :nametags 
                      GROUP BY cours.id_cours 
                      LIMIT :offset, :limit";

            $stmt = $this->conn->prepare($query);

            $searchTerm = $search ? "%$search%" : "%%";
            $nametagsTerm = $nametags ? "%$nametags%" : "%%";

            $stmt->bindParam(':search', $searchTerm);
            $stmt->bindParam(':nametags', $nametagsTerm);
            $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
            $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);

            $stmt->execute();

            $courses = [];
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {  
                $courses[] = $row;
            }

            return $courses;
        } catch (PDOException $e) {
            error_log("Database error: " . $e->getMessage());
            throw new Exception("An error occurred while fetching courses: " . $e->getMessage());
        }
    }

    public function getCourseDetails($id_cours)
    {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM cours WHERE id_cours = :id_cours");
            $stmt->bindParam(':id_cours', $id_cours, PDO::PARAM_INT);
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);  
            if ($row) {
                return $row;
            }
            return null;
        } catch (PDOException $e) {
            error_log("Database error: " . $e->getMessage());
            throw new Exception("An error occurred while fetching course details: " . $e->getMessage());
        }
    }

    public function updateCourse(Cours $cours)
    {
        try {
            $query = "UPDATE cours 
                      SET titre_cours = :titre_cours, 
                          contenu = :contenu, 
                          description = :description, 
                          s_status = :s_status, 
                          id_categories = :id_categories, 
                          image = :image 
                      WHERE id_cours = :id_cours";

            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(':titre_cours', $cours->getTitreCours());
            $stmt->bindParam(':contenu', $cours->getContenu());
            $stmt->bindParam(':description', $cours->getDescription());
            $stmt->bindParam(':s_status', $cours->getSStatus());
            $stmt->bindParam(':id_categories', $cours->getIdCategories());
            $stmt->bindParam(':image', $cours->getImage());
            $stmt->bindParam(':id_cours', $cours->getIdCours());

            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            error_log("Database error: " . $e->getMessage());
            throw new Exception("An error occurred while updating the course: " . $e->getMessage());
        }
    }

    public function deleteCourse($id_cours)
    {
        try {
            $query = "DELETE FROM cours WHERE id_cours = :id_cours";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id_cours', $id_cours, PDO::PARAM_INT);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            error_log("Database error: " . $e->getMessage());
            throw new Exception("An error occurred while deleting the course: " . $e->getMessage());
        }
    }
}
