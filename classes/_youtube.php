<?php
require_once('vendor/google-api-php-client/src/Google/autoload.php');

class _youtube
{
    var $client;
    var $service;

    public function __construct()
    {
        global $cfg_youtube;
        $client = new Google_Client();
        $client->setApplicationName($cfg_youtube["name"]);
        $client->setDeveloperKey($cfg_youtube["key"]);
        $this->client = $client;
        $this->service = new Google_Service_YouTube($this->client);
    }

    public function getUser($userName)
    {
        mylog(__METHOD__ . " Youtube SDK : fetching user channel");

        $options = array("forUsername" => $userName);
        $result = $this->service->channels->listChannels("snippet,contentDetails", $options);
        $items = $result->getItems();
        if (!count($items)) {
            mylog(__METHOD__ . " Youtube SDK : user not found !");
            mylog(__METHOD__ . " Youtube SDK : try by channel id");
            $options = array("id" => $userName);
            $result = $this->service->channels->listChannels("snippet,contentDetails", $options);
            $items = $result->getItems();
            if (!count($items)) {
                mylog(__METHOD__ . " Youtube SDK : channel not found !");
                return false;
            }
            mylog(__METHOD__ . " Youtube SDK : channel found");
            $user = new fwYoutubeUser;
            $user->published = $items[0]->getSnippet()->publishedAt;
            $user->title = $items[0]->getSnippet()->title;
            $user->name = $items[0]->getSnippet()->title;
            $user->id = $items[0]->getId();
            $user->logo = $items[0]["snippet"]["thumbnails"]["default"]["url"];
            $user->description = $items[0]->getSnippet()->description;
            $user->uploadPlayListId = $items[0]["contentDetails"]["relatedPlaylists"]["uploads"];
            return $user;
        }else{
            mylog(__METHOD__ . " Youtube SDK : channel found");
            $user = new fwYoutubeUser;
            $user->published = $items[0]->getSnippet()->publishedAt;
            $user->title = $items[0]->getSnippet()->title;
            $user->name = $items[0]->getSnippet()->title;
            $user->id = $items[0]->getId();
            $user->logo = $items[0]["snippet"]["thumbnails"]["default"]["url"];
            $user->description = $items[0]->getSnippet()->description;
            $user->uploadPlayListId = $items[0]["contentDetails"]["relatedPlaylists"]["uploads"];
            return $user;
        }
        return false;
    }

    public function getUserVideos($userUploadId)
    {
        mylog(__METHOD__ . " Youtube SDK : fetching videos");

        $nextPageToken = false;
        $videos = array();
        do {
            $options = array("playlistId" => $userUploadId, "pageToken" => $nextPageToken,"maxResults"=>50);
            $result = $this->service->playlistItems->listPlaylistItems("contentDetails", $options);
            $items = $result->getItems();
            if (!count($items)) {
                break;
            }
            $nextPageToken = $result["nextPageToken"];
            //mylog(__METHOD__ . " Youtube SDK : " . count($items) . " videos found");


            foreach ($items as $video) {
                $videos[] = $this->getVideoStatistics($video["contentDetails"]["videoId"]);
            }

        } while ($nextPageToken);

        return $videos;
    }

    public function getUserStatistics($userName)
    {
        mylog(__METHOD__ . " [" . $userName . "] Youtube SDK : trying by username !");
        $options = array("forUsername" => $userName);
        $result = $this->service->channels->listChannels("statistics", $options);
        $items = $result->getItems();

        if (!count($items)) {
            mylog(__METHOD__ . " [" . $userName . "] Youtube SDK : user statistics not found !");
            mylog(__METHOD__ . " [" . $userName . "] Youtube SDK : trying by id !");

            $options = array("id" => $userName);
            $result = $this->service->channels->listChannels("statistics", $options);
            $items = $result->getItems();
            if (!count($items)) {
                mylog(__METHOD__ . " [" . $userName . "] Youtube SDK : user statistics not found !");
                return false;
            }
            mylog(__METHOD__ . " [" . $userName . "] Youtube SDK : user statistics found");
            $result = array(
                "commentCount" => $items[0]->getStatistics()->commentCount,
                "hiddenSubscriberCount" => $items[0]->getStatistics()->hiddenSubscriberCount,
                "subscriberCount" => $items[0]->getStatistics()->subscriberCount,
                "videoCount" => $items[0]->getStatistics()->videoCount,
                "viewCount" => $items[0]->getStatistics()->viewCount,
                "totalUploadViews" => $items[0]->getStatistics()->viewCount,
            );
            return (object)$result;
        }else{
            mylog(__METHOD__ . " [" . $userName . "] Youtube SDK : user statistics found");
            $result = array(
                "commentCount" => $items[0]->getStatistics()->commentCount,
                "hiddenSubscriberCount" => $items[0]->getStatistics()->hiddenSubscriberCount,
                "subscriberCount" => $items[0]->getStatistics()->subscriberCount,
                "videoCount" => $items[0]->getStatistics()->videoCount,
                "viewCount" => $items[0]->getStatistics()->viewCount,
                "totalUploadViews" => $items[0]->getStatistics()->viewCount,
            );
            return (object)$result;
        }

        return false;
    }

    public function getVideoStatistics($videoId)
    {
        $options = array("id" => $videoId);

        $result = $this->service->videos->listVideos("statistics,snippet,contentDetails", $options);
        $items = $result->getItems();
        if (!count($items)) {
            mylog(__METHOD__ . " Youtube SDK : video statistics not found !");
            return false;
        }
        mylog(__METHOD__ . " Youtube SDK : video ".$items[0]["id"]." statistics  found");

        $video = new fwYoutubeVideo();
        $video->id = $items[0]["id"];
        $video->title = $items[0]["snippet"]["title"];
        $video->description = $items[0]["snippet"]["description"];
        $video->thumbnail = $items[0]["snippet"]["thumbnails"]["high"];
        $video->published = $items[0]["snippet"]["publishedAt"];
        $video->dislikeCount = $items[0]["statistics"]["dislikeCount"];
        $video->likeCount = $items[0]["statistics"]["likeCount"];
        $video->viewsCount = $items[0]["statistics"]["viewCount"];
        $video->commentCount = $items[0]["statistics"]["commentCount"];
        $video->favoriteCount = $items[0]["statistics"]["favoriteCount"];
        $video->duration = $items[0]["contentDetails"]["duration"];
        $duration = new DateTime("@0");
        $duration->add(new DateInterval($items[0]["contentDetails"]["duration"]));
        $video->duration =  $duration->format("H:i:s");

        return $video;
    }

}

class fwYoutubeUser
{

    public $id;
    public $name;
    public $title;
    public $logo;
    public $published;
    public $description;
    public $uploadPlayListId;

}

class fwYoutubeVideo
{

    public $id;
    public $title;
    public $description;
    public $thumbnail;
    public $duration;
    public $published;
    public $ratingAvg;
    public $ratingCount;
    public $favoriteCount;
    public $viewsCount;
    public $dislikeCount;
    public $likeCount;
    public $commentCount;

}
