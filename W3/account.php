<?php
	// This is the base class for checking and savings accounts
	// It is declared **abstract** so that it can not be instantiated
	// Child classes must be derived that 
	// implement the withdrawal and getAccountDetails methods
	
	/* Note:
		You should implement all other methods in the class
	*/
	
    abstract class Account 
    {
        protected $accountId;
        protected $balance;
        protected $startDate;
        
        public function __construct ($id, $bal, $startDt) 
        {
            $this->accountId = $id;
            $this->balance = $bal;
            $this->startDate = $startDt;
        } 
        
        public function deposit ($amount) 
        {
            $this->balance += $amount;
        }

        abstract public function withdrawal($amount);
        // This is an abstract method. 
        // This method must be defined in all classes
        // that inherit from this class


        public function setBalance($amount) 
        {
            
            $this->balance = $amount;
        } 
        
        public function getStartDate() 
        {
            return $this->startDate;
        }

        public function getBalance() 
        {
            return $this->balance;
        } 

        public function getAccountId() 
        {
            return $this->accountId;
        } 

        // Display AccountID, Balance and StartDate in a nice format
        protected function getAccountDetails()
        {
            $str = '<li> Account ID:'.$this->accountId .'</li>';
            $str .= '<li> Balance: '.$this->balance .' </li>';
            $str .= '<li> Start Date ID: '.$this->startDate.'</li>';
            return $str;
        } 
        
    } // end account

?>
