<?php

class Studio
{
    public $id;
    function __construct($id = null)
    {
        $this->db = MysqliDb::getInstance();
        $this->id = $id;
        if (!empty($this->id)) {
            if (is_numeric($this->id)) {
                $this->studio = $this->db->where("id", $this->id)->getOne("studio");
            } else {
                $this->studio = $this->db->where("slug", $this->id)->getOne("studio");
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
        return $this->db->getOne("studio");
    }

    function getId()
    {
        return $this->studio["id"];
    }

    function getSlug()
    {
        return cat($this->studio["slug"]);
    }

    function getName()
    {
        return $this->studio["name"];
    }

    function countAnimes()
    {
        $this->db->jsonContains("studio_id", "[{$this->getId()}]")->get("anime");
        return $this->db->count;
    }

    function getStudios($ids)
    {
        $studios = array();
        foreach ($ids as $id) {
            $studio = $this->db->where("id", cat($id))->getOne("studio");
            array_push($studios, $studio);
        }
        return $studios;
    }
}
