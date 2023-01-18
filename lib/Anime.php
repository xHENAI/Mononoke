<?php

class Anime
{
    function __construct($id)
    {
        $this->db = MysqliDb::getInstance();
        if (is_numeric($id)) {
            $this->anime = $this->db->where("id", $id)->getOne("anime");
        } else {
            $this->anime = $this->db->where("slug", $id)->getOne("anime");
        }
    }

    function getId()
    {
        return $this->anime["id"];
    }

    function getName()
    {
        return $this->anime["name"];
    }

    function getSlug()
    {
        return cat($this->anime["slug"]);
    }

    function getSynopsis()
    {
        return $this->anime["synopsis"];
    }

    function getStatus()
    {
        return $this->anime["status"];
    }

    function getTypeID()
    {
        return $this->anime["type_id"];
    }

    function getCover()
    {
        return $this->anime["cover"];
    }

    function convertType()
    {
        $type = $this->db->where("id", $this->getTypeID())->getOne("type");
        return $type["name"];
    }

    function convertStatus()
    {
        switch ($this->getStatus()) {
            case 0:
                return "Announced";
            case 1:
                return "Ongoing";
            case 2:
                return "Completed";
            case 3:
                return "Hiatus";
            default:
                return "Canceled";
        }
    }

    function getViews()
    {
        $this->db->where("anime_id", $this->anime["id"])->get("views");
        return $this->db->count;
    }

    function getEpisodes()
    {
        return $this->db->where("anime_id", $this->anime["id"])->orderBy("episode", "DESC")->get("episode", null, "id");
    }

    function getTrailer()
    {
        return $this->anime["trailer"];
    }

    function getStudio()
    {
        return explode(",", $this->anime["studio_id"]);
    }

    function getReleased()
    {
        return $this->anime["released"];
    }

    function getDuration()
    {
        return $this->anime["duration"];
    }

    function getSeason()
    {
        return $this->anime["season_id"];
    }

    function getCountry()
    {
        return $this->anime["country_id"];
    }

    function countEpisodes()
    {
        return $this->db->where("id", $this->anime["id"])->getOne("episode", "count(*) as cnt")["cnt"];
    }

    function getCensored(bool $full = true)
    {
        return $full ? ($this->anime["uncensored"] == 1 ? "Uncensored" : "Censored") : !$this->anime["uncensored"];
    }

    function getCreatedBy()
    {
        return $this->anime["created_by"];
    }

    function getAdded()
    {
        return $this->anime["added"];
    }

    function getUpdated()
    {
        return $this->anime["updated"];
    }

    function time($time, $type = "timestamp")
    {
        switch ($type) {
            case "timestamp":
                return $time;
            case "readable":
                return convertTime($time);
            case "readableFull":
                return convertTime($time, true);
            default:
                return $time;
        }
    }

    function getGenres()
    {
        return explode(",", cat($this->anime["genre"]));
    }

    function convertTags($tags)
    {
        $return = [];
        foreach ($tags as $tag) {
            array_push($return, $this->db->where("id", $tag)->getOne("genre"));
        }
        return $return;
    }

    function getTags()
    {
        return $this->anime["tags"];
    }

    function getOtherNames()
    {
        return $this->anime["other_names"];
    }
}
