<?php
class Event{
	private $eventTitle;
	private $date;
	private $linkToAlbum;
	
	public function event($title, $date, $link){
		$this->setTitle($title);
		$this->setDate($date);
		$this->setAlbumLink($link);
	}
	
	/*Getter & Setter*/
	public function getTitle(){
		return $this->eventTitle;
	}
	
	public function setTitle($titleToSet){
		$this->eventTitle=$titleToSet;
	}
	
	public function getDate(){
		return $this->date;
	}
	
	public function setDate($dateToSet){
		$this->date=$dateToSet;
	}
	
	public function getAlbumLink(){
		return $this->linkToAlbum;
	}
	
	public function setAlbumLink($linkToSet){
		$this->linkToAlbum=$linkToSet;
	}
	
}