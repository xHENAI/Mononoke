<?php

class Genre
{
    function __construct($id = null)
    {
        $this->db = MysqliDb::getInstance();
        $this->id = $id;
        if (!empty($this->id)) {
            if (is_numeric($this->id)) {
                $this->genre = $this->db->where("id", $this->id)->getOne("genre");
            } else {
                $this->genre = $this->db->where("slug", $this->id . "%", "like")->getOne("genre");
            }
        }
    }

    function get($id)
    {
        is_numeric($id) ? $this->db->where("id", $id) : $this->db->where("slug", $id);
        return $this->db->getOne("genre");
    }

    function getId()
    {
        return $this->genre["id"];
    }

    function getSlug()
    {
        return cat($this->genre["slug"]);
    }

    function getName()
    {
        return $this->genre["name"];
    }

    function countAnimes()
    {
        $this->db->jsonContains("genre", "[{$this->getId()}]")->get("anime");
        return $this->db->count;
    }
}
