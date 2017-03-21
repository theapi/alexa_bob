<?php
// sudo apt install sqlite3 php5-sqlite

Class Db extends PDO {
    protected $db;

    public function __construct($db_name) {
        // Create file as database.
        $this->db = new PDO('sqlite:' . $db_name . '.db');
        // Throw exceptions on error
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function init() {
        $sql = "
        CREATE TABLE IF NOT EXISTS audio_data (
            etag TEXT,
            last_modified TEXT
        );";
        $this->db->exec($sql);
    }
}

try {
    $db = new Db('theamphour');
    $db->init();
} catch(PDOException $e) {
    echo $e->getMessage();
    echo $e->getTraceAsString();
}
