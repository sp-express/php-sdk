<?php



namespace SpExpress\Sdk\Objects\Output;

use SpExpress\Sdk\Objects\AbstractResponse;

class PrintAppObj extends AbstractResponse
{
    protected $app_id;

    protected $status;

    protected $hash;

    protected $connection_status;

    protected $app_type;

    protected $description;

    protected $created_at;

    protected $updated_at;

    public function getAppId()
    {
        return $this->app_id;
    }

    public function getHash()
    {
        return $this->hash;
    }

    public function getConnectionStatus()
    {
        return $this->connection_status;
    }

    public function getAppType()
    {
        return $this->app_type;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    public function isOnline(): bool
    {
        return (int) $this->connection_status === 1;
    }

    public function getStatus(): bool
    {
        return (int) $this->status === 1;
    }
}
