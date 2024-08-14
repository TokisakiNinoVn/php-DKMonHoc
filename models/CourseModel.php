<?php
class CourseModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getCourses() {
        $stmt = $this->db->query("SELECT * FROM courses");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCourseById($courseID) {
        $stmt = $this->db->prepare("SELECT * FROM courses WHERE courseID = ?");
        $stmt->execute([$courseID]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
