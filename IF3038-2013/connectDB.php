<?php
class DB{
	var $link_id  = 0; //Hasil dari mysql_connect().
	var $Query_ID = 0; //Hasil dari mysql_query
	var $Errno   = 0;               
    var $Error    = "";
	var $Row;
	var $Record   = array();
	var $host     = "localhost";
	var	$userName = "progin";
	var	$password = "progin";
	var $database = "progin_405_13510081";
	
	
	function connectDB(){
		 if( 0 == $this->link_id  )
            $this->link_id = mysql_connect( $this->host, $this->userName, $this->password );
        if( !$this->link_id  )
            $this->halt( "link_id == false, connect failed" );
        if(!mysql_query(sprintf( "use %s", $this->database, $this->link_id )))
            $this->halt( "cannot use database ".$this->database );
	}
		
	function query( $Query_String ){
		$this->connectDB();
        $this->Query_ID = mysql_query($Query_String, $this->link_id );
        $this->Row = 0;
        $this->Errno = mysql_errno();
        $this->Error = mysql_error();
        if( !$this->Query_ID )
            $this->halt( "Invalid SQL: ".$Query_String );
        return $this->Query_ID;
		}
		
	 function halt( $msg ){
        printf( "<strong>Database error:</strong> %s n", $msg );
        printf( "<strong>MySQL Error</strong>: %s (%s) n", $this->Errno, $this->Error );
        die( "Session halted." );
    }

//-------------------------------------------
//   Mengambil hasil query yang memiliki banyak record
//-------------------------------------------
 function nextRecord()
        {
        @ $this->Record = mysql_fetch_array( $this->Query_ID );
        $this->Row += 1;
        $this->Errno = mysql_errno();
        $this->Error = mysql_error();
        $stat = is_array( $this->Record );
        if( !$stat )
            {
            @ mysql_free_result( $this->Query_ID );
            $this->Query_ID = 0;
            }
        return $stat;
        } // end function nextRecord
 
//-------------------------------------------
//   Mengambil hasil query yang memiliki satu record
//-------------------------------------------
    function singleRecord()
        {
        $this->Record = mysql_fetch_array( $this->Query_ID );
        $stat = is_array( $this->Record );
        return $stat;
        } // end function singleRecord
}
?>