<?php

class Type
{
    function __construct($id = null)
    {
        $this->db = MysqliDb::getInstance();
        $this->id = $id;
        if (!empty($this->id)) {
            if (is_numeric($this->id)) {
                $this->type = $this->db->where("id", $this->id)->getOne("type");
            } else {
                $this->type = $this->db->where("slug", $this->id . "%", "like")->getOne("type");
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
        return $this->db->getOne("type");
    }

    function getId()
    {
        return $this->type["id"];
    }

    function getSlug()
    {
        return cat($this->type["slug"]);
    }

    function getName()
    {
        return $this->type["name"];
    }
}
