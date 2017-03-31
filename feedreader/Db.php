<?php
// sudo apt install sqlite3 php5-sqlite
// sudo apt install sqlite3 php-sqlite3


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
            title TEXT,
            url TEXT,
            date INTEGER
        );";
        $this->db->exec($sql);
    }

    public function itemExists($title) {
        $stmt = $this->db->query(
            'SELECT date FROM audio_data
            WHERE title = :title'
        );
        $stmt->execute([':title' => $title]);
        if ($stmt->fetchColumn() > 0) {
            return true;
        }

        return false;
    }

    public function addAudioData($title, $url, $date) {
        $stmt = $this->db->prepare(
            "INSERT INTO audio_data(title, url, date)
             VALUES(:title, :url, :date)"
         );
         $stmt->execute(array(
             ':title' => $title,
             ':url' => $url,
             ':date' => $date,
         ));
    }

    public function getLatest() {
        $stmt = $this->db->query(
            'SELECT title, url FROM audio_data
            ORDER BY date DESC
            Limit 3'
        );
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

try {
    $db = new Db('theamphour');
    $db->init();
} catch(PDOException $e) {
    echo $e->getMessage();
    echo $e->getTraceAsString();
}
