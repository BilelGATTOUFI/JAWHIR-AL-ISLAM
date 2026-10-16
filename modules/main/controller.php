<?php
class mainController extends _controller implements _controllerInterface {

function login($arguments = array())
    {

      

    }

private static function authAdmin($arguments)
    {

 $model = new adminModel();
        $element = $model->listByAdminLogin($arguments["username"]);
        if (empty($element) || $element[0]->admin_password != hashPassword($arguments["password"])) {
            error(__METHOD__ . " Login ou mot de passe incorrect " . $arguments["username"] . " " . $arguments["password"]);
            header("Location: bo.php");
            die();
        }
        mylog(__METHOD__ . " Login correct " . $arguments["username"]);
        $_SESSION["user_id"] = $element[0]->admin_id;
        $_SESSION["user_name"] = $element[0]->admin_nom;



        if ($element[0]->admin_login == "admin")
            $_SESSION["user_type"] = "superadmin";
        else {
            $_SESSION["user_type"] = "admin";
            //$_SESSION["user_pouvoirs"] = unserialize($element[0]->admin_pouvoirs);

        }

        header("Location: bo.php");
        die();

    }
    function auth($arguments = array())
    {

        return self::authAdmin($arguments);
     

    }
    function logout($arguments = array())
    {
        session_destroy();
        header("Location: index.html");
    }

    function getTitre($doc){
		$classname="titre-article";
		return $this->getByClassName($doc,$classname);
	}
	function getTexte($doc){
		$classname="texte";
		return $this->getByClassName($doc,$classname);
	}
	function getAuthor($doc){
		$classname="vcard author";
		return $this->getByClassName($doc,$classname);
	}
	function getDate($doc){
		date_default_timezone_set('UTC');

		$classname="date";
		$str = $this->getByClassName($doc,$classname);
		preg_match("/\((.*)\)/",$str,$output);
		$str = str_replace($output[0],"",$str);

		$time = time();
		$int  = $this->obj->strtotime($str, $time);
		$date = date('Y-m-d', $int);
		return $date;
	}


	private function getByClassName($doc,$classname){
		$finder = new DomXPath($doc);
		$nodes = $finder->query("//*[contains(@class, '$classname')]");
		return $nodes[0]->textContent;
	}
	function import()
    {
die();
		set_time_limit(4000);
		$model = new articleModel();

		require_once('vendor/I18N/Arabic.php');
		$this->obj = new I18N_Arabic('StrToTime');
        $rows = file("linksfr.txt");
		$str = implode("",$rows);
		$finalResult = array();
		libxml_use_internal_errors(true);
        preg_match_all("/href=\"(.*)\"/",$str,$result);
		$str ="";
		$i=0;
		foreach($result[1] as $sublink){
			$link = 'http://www.mestaoui.tn/'.$sublink;
					$doc = new DOMDocument();
				$doc->loadHTMLFile($link);
				$element = new stdClass();
				$element->article_title = $this->getTitre($doc);
				$element->article_texte = $this->getTexte($doc);
				$element->article_date = $this->getDate($doc);
				$element->article_author = 1; //$this->getAuthor($doc);
				$model->insert($element);
			$finalResult[] = $element;

		}


		$table = new _table();
		$table->data = $finalResult;
		$table->header = array(
			"article_date"=>"Date",
			"article_title"=>"Titre",
		);

		$data = array("module" => "article",
			"title" => "Liste des articles",
			"primaryKey" => "article_id",
			"table" => $table);


		return mainViews::tableViews($data);

    }


}
