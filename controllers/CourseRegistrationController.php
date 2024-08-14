<?php
class CourseRegistrationController {
    private $courseModel;
    private $registrationModel;

    public function __construct($courseModel, $registrationModel) {
        $this->courseModel = $courseModel;
        $this->registrationModel = $registrationModel;
    }

    public function showAvailableCourses() {
        $courses = $this->courseModel->getCourses();
        include "views/course_list.php";
    }

    public function registerForCourse($userID, $courseID) {
        if ($this->registrationModel->registerCourse($userID, $courseID)) {
            echo "Course registered successfully.";
        } else {
            echo "Failed to register the course.";
        }
    }

    public function showRegisteredCourses($userID) {
        $registrations = $this->registrationModel->getRegistrationsByUserId($userID);
        include "views/registered_courses.php";
    }
}
?>
