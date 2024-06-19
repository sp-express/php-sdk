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

    /**
     * @return mixed
     */
    public function getAppId()
    {
        return $this->app_id;
    }

    /**
     * @return mixed
     */
    public function getHash()
    {
        return $this->hash;
    }

    /**
     * @return mixed
     */
    public function getConnectionStatus()
    {
        return $this->connection_status;
    }

    /**
     * @return mixed
     */
    public function getAppType()
    {
        return $this->app_type;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @return mixed
     */
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
