<?php

class Zipm{
    
    private $post_id = 0;
    private $zip;
    private $destination;
    private $file_name;
    private $source;
    
    public function __construct($post_id){
        
        $this->post_id = $post_id;
        
        // load the file paths of all child attachments of the file into an array
        $sql = "select "
    }
    
    public function filesToZip($files = array()) {
        $valid_files = array();
        
        //if files were passed in...
        if (is_array($files)) {
            //cycle through each file
            foreach ($files as $file) {
                //make sure the file exists
                if (file_exists($file)) {
                    $valid_files[] = $file;
                }
            }
        }else{
            throw new Exception('No files supplied for archive');
        }

        //if we have good files...
        if (count($valid_files)) {
            $this->source = $valid_files;

            //add the files
            foreach ($valid_files as $file) {
                $f = explode('/', $file);
                $this->zip->addFile($file, '/'.array_pop($f));
            }

            try {
                $this->zip->close();
            } catch (Exception $e) {
                throw new Exception('Can not save the archive file! Check files and permissions');
            }
        } else {
            throw new Exception('No valid files supplied for archive. Check files and permissions');
        }
    }
    
    /**
     * removes temporary zip file 
     * if $with_source option is true also removes files
     * used for generating archive file
     * 
     * @param type $with_source 
     */
    public function removeTempFiles($with_source = false){
        unlink($this->destination.$this->file_name);
        if($with_source){
            if(is_array($this->source)){
                foreach($this->source as $file){
                    unlink($file);
                }
            }else{
                exec("rm -R ".$this->source);
            }
        }
    }
}


?>