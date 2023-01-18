<?php

class Episode
{
    function __construct($id = null)
    {
        $this->db = MysqliDb::getInstance();
        $this->id = $id;
        if (!empty($this->id)) {
            $this->episode = $this->db->where("id", $id)->getOne("episode");
        }
    }

    function getId()
    {
        return $this->id;
    }

    function getEpisode()
    {
        return $this->episode["episode"];
    }

    function getType()
    {
        return $this->episode["type"];
    }

    function getTitle()
    {
        return $this->episode["title"];
    }

    function convertType()
    {
        return $this->getType() == "sub" ? "Sub" : "Dub";
    }

    function getAdded()
    {
        return $this->episode["added"];
    }

    function getStreams($type)
    {
        return $this->db->where("episode_id", $this->getId())->where("type", $type)->orderBy("host", "ASC")->get("streams");
    }
}
