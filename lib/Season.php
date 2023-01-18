<?php

class Season
{
    function __construct($id = null)
    {
        $this->db = MysqliDb::getInstance();
        $this->id = $id;
        if (!empty($this->id)) {
            if (is_numeric($this->id)) {
                $this->season = $this->db->where("id", $this->id)->getOne("season");
            } else {
                $this->season = $this->db->where("slug", $this->id)->getOne("season");
            }
        }
    }

    function setId($id)
    {
        $this->id = $id;
    }

    function get($id)
    {
        is_numeric($id) ? $this->db->where("id", $id) : $this->db->where("slug", $id);
        return $this->db->getOne("season");
    }

    function getId()
    {
        return $this->season["id"];
    }

    function getSlug()
    {
        return cat($this->season["slug"]);
    }

    function getName()
    {
        return $this->season["name"];
    }

    function countAnimes()
    {
        $this->db->jsonContains("season_id", "[{$this->getId()}]")->get("anime");
        return $this->db->count;
    }
}
