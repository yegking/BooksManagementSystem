<?php
    class Check
    {
        private $id;
        private $cid;
        private $bid;
        private $newDate;
  /**
     * @return the $id
     */
    public function getId()
    {
        return $this->id;
    }

  /**
     * @return the $cid
     */
    public function getCid()
    {
        return $this->cid;
    }

  /**
     * @return the $bid
     */
    public function getBid()
    {
        return $this->bid;
    }

  /**
     * @return the $newDate
     */
    public function getNewDate()
    {
        return $this->newDate;
    }

  /**
     * @param field_type $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

  /**
     * @param field_type $cid
     */
    public function setCid($cid)
    {
        $this->cid = $cid;
    }

  /**
     * @param field_type $bid
     */
    public function setBid($bid)
    {
        $this->bid = $bid;
    }

  /**
     * @param field_type $newDate
     */
    public function setNewDate($newDate)
    {
        $this->newDate = $newDate;
    }

    }