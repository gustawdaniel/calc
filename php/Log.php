<?php

/**
 * Created by PhpStorm.
 * User: daniel
 * Date: 28.11.16
 * Time: 13:15
 */
class Log
{
    private $a;
    private $b;
    private $action;
    private $agent;

    /**
     * @return mixed
     */
    public function getAgent()
    {
        return $this->agent;
    }

    /**
     * @param mixed $agent
     */
    public function setAgent($agent)
    {
        $this->agent = $agent;
    }

    /**
     * @return mixed
     */
    public function getA()
    {
        return $this->a;
    }

    /**
     * @param mixed $a
     */
    public function setA($a)
    {
        $this->a = $a;
    }

    /**
     * @return mixed
     */
    public function getB()
    {
        return $this->b;
    }

    /**
     * @param mixed $b
     */
    public function setB($b)
    {
        $this->b = $b;
    }

    /**
     * @return mixed
     */
    public function getC()
    {
        if($this->action=="sum"){
            return $this->a + $this->b;
        } elseif ($this->action=="diff") {
            return $this->a - $this->b;
        } else {
            return null;
        }
    }

    /**
     * @return mixed
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @param mixed $action
     */
    public function setAction($action)
    {
        $this->action = $action;
    }
    
       
}