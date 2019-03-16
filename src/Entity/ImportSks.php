<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class ImportSks
{
	
	/** 
      * @Assert\NotBlank() 
   */ 
	
	private $ignore;
	

   /** 
      * @Assert\NotBlank(message="Please, upload the photo.") 
      * @Assert\File(mimeTypes={ "text/csv", "text/x-csv" }) 
   */ 

  private $csvfile;
  
  
  public function getCsvfile() : ?string {
  	return $this->csvfile;
  }
  
  public function setCsvfile($csvfile) : self {
  	$this->csvfile= $csvfile;
  	return $this;
  }

  public function getIgnore() : ?number {
  	return $this->ignore;
  }
  
  public function setIgnore($ignore) : self {
  	$this->ignore= $ignore;
  	return $this;
  }

}
