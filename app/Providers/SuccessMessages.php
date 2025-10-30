<?php

namespace App\Providers;

class SuccessMessages {
    /**
     * Display Success Messages
     *
     * @return void
    */

    // Insert Message
    public function getInsert() {
        return '<div class="alert alert-success">The data was submitted successfully</div>';
    }

    // Update Message
    public function getUpdate() {
        return '<div class="alert alert-success">The data was updated successfully</div>';
    }
}

?>