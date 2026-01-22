<?php
class Customer {
    public $id;
    public $name;
    public $email;
    public $registrationDate;

    public function __construct($id, $name, $email, $registrationDate) {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->registrationDate = $registrationDate;
    }

    public function getMembershipDuration() {
        $regDate = new DateTime($this->registrationDate);
        $now = new DateTime();
        $interval = $regDate->diff($now);
        
        if ($interval->y > 0) return $interval->y . " سنة";
        if ($interval->m > 0) return $interval->m . " شهر";
        return $interval->d . " يوم";
    }
}
?>
