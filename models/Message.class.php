<?php

class Message {
    private $id;
    private $content;
    private $post_date;
    private $topic_id;
    private $author_id;

    public function __construct($id='') {
        if ($id != ''){
            $this->id = $id;
            $this->load();
        }
    }
    public function getId() {
        return $this->id;
    }
    public function getContent() {
        return $this->content;
    }
    public function setContent($content) {
        $this->content = $content;
    }
    public function getPostDate() {
        return $this->post_date;
    }
    public function setPostDate($post_date) {
        $this->post_date = $post_date;
    }
    public function getTopicId() {
        return $this->topic_id;
    }
    public function setTopicId($topic_id) {
        $this->topic_id = $topic_id;
    }
    public function getAuthorId() {
        return $this->author_id;
    }
    public function setAuthorId($author_id) {
        $this->author_id = $author_id;
    }



    public function insert() {
        $bdd = Database::getInstance();
        $sql = 'INSERT INTO message (content, post_date, topic_id, author_id)
                VALUES ("'.$this->content.'", NOW(), "'.$this->topic_id.'", "'.$this->author_id.'")';
        $bdd->exec($sql);
        return true;
    }

    public function edit() {
        $bdd = Database::getInstance();
        $sql = 'SELECT id, content
                    FROM message
                    WHERE id = '.$this->id;
        $results = $bdd->fetch($sql);
        if (sizeof($results) == 1) {
            $sql = 'UPDATE message
                    SET content = "'.$this->content.'"
                    WHERE id = '.$this->id;;
            $bdd->exec($sql);
            return true;
        }
        else {
            return false;
        }
    }

    public function delete() {
        if (isset($this->id)) {
            $bdd = Database::getInstance();
            $sql = 'DELETE FROM message
                    WHERE id = '.$this->id;
            if ($result = $bdd->fetch($sql)) {
                return true;
            }
            else {
                return false;
            }
        }
    }

    public function load(){
        if(isset($this->id)){
            $bdd = Database::getInstance();
            $sql = 'SELECT id, topic_id, content, post_date, author_id FROM message
            WHERE id = '.$this->id;
            if($result =$bdd->fetch($sql)){
                $this->topic_id = $result[0]['topic_id'];
                $this->content = $result[0]['content'];
                $this->post_date = $result[0]['post_date'];
                $this->author_id = $result[0]['author_id'];
                return true;
            }
            return false;
        }
    }

    public static function getAll(){
        $bdd = Database::getInstance();
        $sql = 'SELECT id, content, post_date, topic_id, author_id FROM message';

        $elements = array();
        if ($results = $bdd->fetch($sql)){
            foreach ($results as $result){
                $item = new Message();
                $item->id = $result['id'];
                $item->content = $result['content'];
                $item->post_date = $result['post_date'];
                $item->topic_id = $result['topic_id'];
                $item->author_id = $result['author_id'];
                array_push($elements, $item);
            }
        }
        return $elements;
    }
}

