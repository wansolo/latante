<?php

class paging_ajax
{
    public $data; // DATA
    public $per_page = 5; //  RECORD PER PAGE
    public $page; // PAGE NUMBER
    public $text_sql; // QUERY STRING
     
    public $show_pagination = true;
    public $show_goto = false;
    public $show_total = true;
    
    // CLASS NAME
    public $class_pagination; 
    public $class_active;
    public $class_inactive;
    public $class_go_button;
    public $class_text_total;
    public $class_txt_goto;    
    
    private $cur_page;	// CURRENT PAGE
    private $num_row; //  RECORD

    public $goto = '';
    public $total_string = '';
    
    // GET RESULT
    public function GetResult()
    {
        global $db; // SET $db AS GLOBAL ATTRIBUTEE
        
        // CALCULATE TO GET RESULT
        $this->cur_page = $this->page;
        $this->page -= 1;
        $this->per_page = $this->per_page;
        $start = $this->page * $this->per_page;
        
        // SUMMARY RECORDS IN TABLE
		$result = mysql_query($this->text_sql);
        $this->num_row = mysql_num_rows($result);
        
        // GET RESULT OF CURRENT PAGE
        return mysql_query($this->text_sql." LIMIT $start, $this->per_page");
    }
    
    // FUNCTION HELP PROCESS RESULT AND SHOW ON PAGE
    public function Load()
    {
        // IF IT'S NOT PAGINATION RETURN RESULT
        if(!$this->show_pagination)
            return $this->data;
        
        // SHOW NEXT, PREVIOUS, FIRST & LAST BUTTON
        $previous_btn = true;
        $next_btn = true;
        $first_btn = true;
        $last_btn = true;    
        
        // ADD DATA TO RETURN STRING
        $msg = $this->data;
        
        // CALCULATE PAGE NUMBER
        $count = $this->num_row;
        $no_of_paginations = ceil($count / $this->per_page);
        
        // CALCULATE BEGIN AND END VALUE OF LOOPS
        if ($this->cur_page >= 7) {
            $start_loop = $this->cur_page - 3;
            if ($no_of_paginations > $this->cur_page + 3)
                $end_loop = $this->cur_page + 3;
            else if ($this->cur_page <= $no_of_paginations && $this->cur_page > $no_of_paginations - 6) {
                $start_loop = $no_of_paginations - 6;
                $end_loop = $no_of_paginations;
            } else {
                $end_loop = $no_of_paginations;
            }
        } else {
            $start_loop = 1;
            if ($no_of_paginations > 7)
                $end_loop = 7;
            else
                $end_loop = $no_of_paginations;
        }
        
        // // ADD STRING TO RESULT SO WE CAN DISPLAY FIRST BUTTON 
        $msg .= "<div class='$this->class_pagination'><ul>";
        if ($first_btn && $this->cur_page > 1) {
            $msg .= "<li p='1' class='active'>First</li>";
        } else if ($first_btn) {
            $msg .= "<li p='1' class='$this->class_inactive'>First</li>";
        }
    
        // SHOW PREVIOUS BUTTON
        if ($previous_btn && $this->cur_page > 1) {
            $pre = $this->cur_page - 1;
            $msg .= "<li p='$pre' class='active'>Previous</li>";
        } else if ($previous_btn) {
            $msg .= "<li class='$this->class_inactive'>Last</li>";
        }
        for ($i = $start_loop; $i <= $end_loop; $i++) {
        
            if ($this->cur_page == $i)
                $msg .= "<li p='$i' class='actived'>{$i}</li>";
            else
                $msg .= "<li p='$i' class='active'>{$i}</li>";
        }
        
        // SHOW NEXT BUTTON
        if ($next_btn && $this->cur_page < $no_of_paginations) {
            $nex = $this->cur_page + 1;
            $msg .= "<li p='$nex' class='active'>Next</li>";
        } else if ($next_btn) {
            $msg .= "<li class='$this->class_inactive'>Next</li>";
        }
        
        // SHOW LAST BUTTON
        if ($last_btn && $this->cur_page < $no_of_paginations) {
            $msg .= "<li p='$no_of_paginations' class='$this->class_active'>Last</li>";
        } else if ($last_btn) {
            $msg .= "<li p='$no_of_paginations' class='$this->class_inactive'>Last</li>";
        }
        
        // SHOW TEXTBOX TO PAGE INPUT
        if($this->show_goto)
            $goto = "<input type='text' id='goto' class='$this->class_txt_goto' size='1' style='margin-top:-1px;margin-left:40px;margin-right:10px'/><input type='button' id='go_btn' class='$this->class_go_button' value='Đến'/>";
        if($this->show_total)
            $total_string = "<span id='total' class='$this->class_text_total' a='$no_of_paginations'>Page <b>" . $this->cur_page . "</b>/<b>$no_of_paginations</b></span>";
        $stradd =  $total_string;
        
        // RETURN RESULT
        return $msg . "</ul>" . $stradd . "</div>";  // Content for pagination
    }     
            
}

?>