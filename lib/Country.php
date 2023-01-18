<?php

class Country
{
    function __construct($id = null)
    {
        $this->db = MysqliDb::getInstance();
        $this->id = $id;
        if (!empty($this->id)) {
            if (is_numeric($this->id)) {
                $this->country = $this->db->where("id", $this->id)->getOne("country");
            } else {
                $this->country = $this->db->where("slug", $this->id)->getOne("country");
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
        return $this->db->getOne("country");
    }

    function getId()
    {
        return $this->country["id"];
    }

    function getSlug()
    {
        return cat($this->country["slug"]);
    }

    function getName()
    {
        return $this->country["name"];
    }
}
