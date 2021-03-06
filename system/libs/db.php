<?php

namespace Carota\System\Libs;

class Db
{
    private $adaptor;

    public function __construct()
    {
        $class = 'Carota\System\Libs\Db\\'.ucwords(DB_DRIVER);
        if(class_exists($class))
        {
            $this->adaptor = new $class();
        }else
        {
            throw new \Exception('Error: Could not load database adapter: '.ucwords($adaptor));
        }
    }

    public function query(string $sql) {
		return $this->adaptor->query($sql);
	}

    public function escape(string $value): string {
		return $this->adaptor->escape($value);
	}

    public function countAffected(): int {
		return $this->adaptor->countAffected();
	}

    public function getLastId(): int {
		return $this->adaptor->getLastId();
	}

    public function isConnection(): bool
    {
        return $this->adaptor->isConnected();
    }
}