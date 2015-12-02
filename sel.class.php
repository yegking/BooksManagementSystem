<?php
    class Sel{
        
        private $id;
        private $Bname;
        private $Ball;
        private $Bout;
        private $Bpress;
        private $Bauthor;
  /**
     * @return the $id
     */
    public function getId()
    {
        return $this->id;
    }

  /**
     * @return the $Bname
     */
    public function getBname()
    {
        return $this->Bname;
    }

  /**
     * @return the $Ball
     */
    public function getBall()
    {
        return $this->Ball;
    }

  /**
     * @return the $Bout
     */
    public function getBout()
    {
        return $this->Bout;
    }

  /**
     * @return the $Bpress
     */
    public function getBpress()
    {
        return $this->Bpress;
    }

  /**
     * @return the $Bauthor
     */
    public function getBauthor()
    {
        return $this->Bauthor;
    }

  /**
     * @param field_type $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

  /**
     * @param field_type $Bname
     */
    public function setBname($Bname)
    {
        $this->Bname = $Bname;
    }

  /**
     * @param field_type $Ball
     */
    public function setBall($Ball)
    {
        $this->Ball = $Ball;
    }

  /**
     * @param field_type $Bout
     */
    public function setBout($Bout)
    {
        $this->Bout = $Bout;
    }

  /**
     * @param field_type $Bpress
     */
    public function setBpress($Bpress)
    {
        $this->Bpress = $Bpress;
    }

  /**
     * @param field_type $Bauthor
     */
    public function setBauthor($Bauthor)
    {
        $this->Bauthor = $Bauthor;
    }


    }