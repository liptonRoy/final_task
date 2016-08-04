<?php

class BankAccount implements IfaceBankAccount
{

    private $balance = null;

    public function __construct(Money $openingBalance)
    {
        $this->balance = $openingBalance;
    }

    public function balance()
    {
        return $this->balance;
    }

    public function deposit(Money $amount)
    {
        //implement this method
		$this->balance = (int) (string) $this->balance + $amount->value() ;
		
		return $this->balance;
    }
	
	public function withdraw(Money $amount)
    {
		//implement this method
		if ((int) (string) $this->balance < $amount->value()) {
			throw new Exception("Withdrawl amount larger than balance");
		}
		
		$this->balance = (int) (string) $this->balance - $amount->value() ;
		
		return $this->balance;
	}

    public function transfer(Money $amount, BankAccount $account)
    {
        //implement this method
		$this->balance = $this->withdraw($amount);
		$account->balance = $account->deposit($amount);
    }
}