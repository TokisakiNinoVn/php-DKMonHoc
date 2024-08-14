<?php
class RegistrationModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function registerCourse($userID, $courseID) {
        $stmt = $this->db->prepare("INSERT INTO registrations (userID, courseID) VALUES (?, ?)");
        return $stmt->execute([$userID, $courseID]);
    }

    public function getRegistrationsByUserId($userID) {
        $stmt = $this->db->prepare("SELECT courses.courseName, courses.credit, registrations.registrationDate 
                                    FROM registrations 
                                    JOIN courses ON registrations.courseID = courses.courseID 
                                    WHERE registrations.userID = ?");
        $stmt->execute([$userID]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
