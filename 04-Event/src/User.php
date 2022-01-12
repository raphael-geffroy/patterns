<?php

namespace App;

class User
{
    protected int $id;
    protected string $email;
    protected string $address;
    protected int $history_count;
    public bool $isConnected  =false;

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getHistoryCount(): int
    {
        return $this->history_count;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @param int $history_count
     */
    public function setHistoryCount(int $history_count): void
    {
        $this->history_count = $history_count;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

}