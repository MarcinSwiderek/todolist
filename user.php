<?php

include_once('./task.php');


class User{
	const FILENAME_PREFIX="User_";
	const FILENAME_POSTFIX=".usf"; //usf-userfile
	
	private $userName;
	private $taskArray;
	private $fileName;
	
	static public function CreateUser($newName){
		if(is_string($newName) && $newName !=="") {
			return new User($newName);
		}
		return null;
	}
	
	private function __construct($newName){
		$this->taskArray= array();
		$this->fileName = User::FILENAME_PREFIX.$newName.User::FILENAME_POSTFIX;
		if(is_string($newName)) {
			$this->userName=$newName;
		}
			
	}
	
	public function getUserName(){
		return $this->userName;
	}
	
	public function addTask($newTask){
		array_push($this->taskArray, $newTask);
	}
	
	public function tasksIntoHTML(){
		$ret="";
		foreach($this->taskArray as $task) {
			$ret.="<br>";
			$ret.=$task->intoHTML();
		}
		return $ret;
	}
	public function saveToFile(){
		file_put_contents($this->fileName, serialize($this->taskArray));	
	}
	public function loadFromFile(){
		$serializedText=file_get_contents($this->fileName);
		$this->taskArray=unserialize($serializedText);
		
	}
}
/*

$task1=new Task("Zadanie 1", "Tresc zadania 1");
$task2=new Task("Zadanie 2", "Tresc zadania 2");
$user=User::CreateUser("Janusz");
$user->addTask($task1);
$user->addTask($task2);
$user->saveToFile();
*/
$user = User::CreateUser("Janusz");
$user->loadFromFile();

echo ($user->tasksIntoHTML());






















