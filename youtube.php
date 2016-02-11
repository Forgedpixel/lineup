<?php

class Model {
    protected $_db_server = '10.3.0.146';
    protected $_db_name = 'dylanxj82_lineup';
    protected $_db_username = 'dylanxj82_lineup';
    protected $_db_password = 'dylan1992';

    protected $_db;

    public function getDb(){
        if( $this->_db == null ){
            $this->_db = new PDO('mysql:host=' . $this->_db_server . ';dbname=' . $this->_db_name, $this->_db_username, $this->_db_password );
            $this->_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        return $this->_db;
    }

}

class Model_CreatePlaylist extends Model {
    public function createPlaylist(){
        //setup query and database
        $db = $this->getDb();
        $stmt = $db->prepare('INSERT INTO playlist (name) VALUES (:name)');
        //name parameters
        $name = $_POST['playlistname'];
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);

        $stmt->execute();
    }
}

class Model_Song extends Model {
    public function addSong(){
        //setup query and database
        $db = $this->getDb();
        $stmt = $db->prepare('INSERT INTO song (youtubeid, username, playlist) VALUES (:id, :user, :playlist)');
        //name parameters



        $youtubeid = preg_split("/v=/", $_POST['youtubeid'])[1];
        $username = $_POST['user'];
        $playlist = $_POST['playlist'];

        $stmt->bindParam(':id', $youtubeid, PDO::PARAM_STR);
        $stmt->bindParam(':user', $username, PDO::PARAM_STR);
        $stmt->bindParam(':playlist', $playlist, PDO::PARAM_STR);

        $stmt->execute();
    }
}

Class Model_GetList extends Model {
    public function getList(){
        $db = $this->getDb();
        $stmt = $db->prepare('SELECT * FROM song WHERE playlist = :playlist');

        $name = $_POST['playlistname'];
        $stmt->bindParam(':playlist', $name, PDO::PARAM_STR);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO:: FETCH_ASSOC);
        if( ($results) == false ){
            return false;
        }
        echo json_encode($results);
    }
}

Class Model_rmPlayed extends Model {
    public function remove(){
        $db = $this->getDb();
        $stmt = $db->prepare('DELETE FROM song WHERE id= :id');

        $id = $_POST['id'];
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);

        $stmt->execute();
    }
}

class playlist{
	public $playlistname;
	public $arrayList = array();
	public $tracknumber = 0;

    function playlist($name)
    {
    	$this->playlistname = $name;
        echo nl2br ($this->playlistname . "playlist created\r\n"); 
    }
    function deletePlaylist(){
    	echo nl2br("playlist deleted\r\n");
    }

    function addTrack($usr, $newtrack){
    	$track = new track($usr,$newtrack );
    	$this->arraylist[] = $track;
    	echo nl2br($usr ."added". $newtrack . "\r\n");
    }

    function nextTrack(){
    	$track = $this->getPlaylist();
    	print_r($track[$this->tracknumber]);
    	$this->tracknumber = ($this->tracknumber + 1);
    	echo nl2br("\r\n");
    	return $track;
    }

    function getPlaylist(){
    	return($this->arraylist);
    }
    function getPlaylistName(){
    	return($this->playlistname);
    }
}

	class track{
		public $usr;
		public $track;
		function track($usr, $track){
			$this->usr = $usr;
			$this->track = $track;
		}
}


if(isset($_POST['action']) && !empty($_POST['action'])) {
    $action = $_POST['action'];
    switch($action) {
        case 'create' : $createPlaylistModel = new Model_CreatePlaylist; $createPlaylistModel->createPlaylist();
        break;
        case 'add' : $addSong = new Model_Song; $addSong->addSong();
        break;
        case 'list' : $getList = new Model_GetList; $getList->getList();
        break;
        case 'removePlayed' : $removePlayed = new Model_rmPlayed; $removePlayed->remove();
        break;
        case 'next' : $testlijst->nextTrack();
        break;
    }
}
?>
