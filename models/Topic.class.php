<?php

class Topic {
    private $id;
    private $title;
    private $content;
    private $post_date;
    private $author_id;

    public function __construct($id='') {
        if ($id != '') {
            $this->id = $id;
            $this->load();
        }
    }

    public function getId() {
        return $this->id;
    }
    public function getTitle() {
        return $this->title;
    }
    public function setTitle($title) {
        $this->title = $title;
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
    public function getAuthorId() {
        return $this->author_id;
    }
    public function setAuthorId($author_id)
    {
        $this->author_id = $author_id;
    }

    public function load() {
        if (isset($this->id)) {
            $bdd = Database::getInstance();
            $sql = 'SELECT id, title, content, post_date, author_id
                    FROM topic
                    WHERE id = '.$this->id;
            if ($result = $bdd->fetch($sql)) {
                $this->title = $result[0]['title'];
                $this->content = $result[0]['content'];
                $this->post_date = $result[0]['post_date'];
                $this->author_id = $result[0]['author_id'];
            }
        }
    }

    public function insert() {
        $bdd = Database::getInstance();
        $sql = 'SELECT * FROM topic WHERE title LIKE "'.$this->title.'"';
        $results = $bdd->fetch($sql);

        if (sizeof($results) == 0) {
            $sql = 'INSERT INTO topic (title, content, post_date, author_id)
                    VALUES ("'.$this->title.'", "'.$this->content.'", NOW(), "'.$this->author_id.'")';
            $bdd->exec($sql);
            return true;
        }
        else {
            return false;
        }
    }

    public function edit() {
        $bdd = Database::getInstance();
        $sql = 'SELECT id, title, content
                    FROM topic
                    WHERE id = '.$this->id;
        $results = $bdd->fetch($sql);
        if (sizeof($results) == 1) {
            $sql = 'UPDATE topic
                    SET title = "'.$this->title.'", content = "'.$this->content.'"
                    WHERE id = '.$this->id;
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
            $sql = 'DELETE FROM topic
                    WHERE id = '.$this->id;
            if ($result = $bdd->fetch($sql)) {
                return true;
            }
            else {
                return false;
            }
        }
    }

    public static function getAll() {
        $bdd = Database::getInstance();
        $sql = 'SELECT id, title, content, post_date, author_id
                FROM topic';

        $elements = array();
        if ($results = $bdd->fetch($sql)) {
            foreach ($results as $result) {
                $item = new Topic();
                $item->id = $result['id'];
                $item->title = $result['title'];
                $item->content = $result['content'];
                $item->post_date = $result['post_date'];
                $item->author_id = $result['author_id'];
                array_push($elements, $item);
            }
        }
        return $elements;
    }
}
