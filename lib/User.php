<?php

class User
{
    function __construct($id = null)
    {
        $this->db = MysqliDb::getInstance();
        $this->id = $id;
        if (!empty($this->id)) {
            if (is_numeric($this->id)) {
                $this->user = $this->db->where("id", $this->id)->getOne("user");
            } else {
                $this->user = $this->db->where("username", "%" . $this->id . "%", "like")->getOne("user");
            }
        }
    }

    function get($id)
    {
        is_numeric($id) ? $this->db->where("id", $id) : $this->db->where("username", "%" . $id . "%", "like");
        return $this->db->getOne("user");
    }

    function setId($id)
    {
        $this->id = $id;
    }

    function getId()
    {
        return $this->user["id"];
    }

    function getLevel()
    {
        return $this->user["level"];
    }

    function getPerpage()
    {
        return $this->user["perpage"];
    }

    function getName()
    {
        return $this->user["username"];
    }

    function getImage()
    {
        return $this->user["image"];
    }

    function isPublic()
    {
        return $this->user["public"] ? true : false;
    }

    function getTwitter()
    {
        return $this->user["twitter"];
    }

    function getDiscord()
    {
        return $this->user["discord"];
    }

    function getWebsite()
    {
        return $this->user["website"];
    }

    function getJoined()
    {
        return $this->user["joined"];
    }

    function isAdmin($id)
    {
        return $id == 0 ? true : false;
    }

    function isMod($id)
    {
        return $id == 0 || $id == 1 ? true : false;
    }
}
