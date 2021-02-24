<?php

namespace App\Traits;

trait TitlesController
{
    public function frontendStart($channel) {
        return $this->table->frontendStart($channel);
    }

    public function frontendPage($channel, $page) {
        return $this->table->frontendPage($channel, $page);
    }

    public function cast($id)
    {
        return $this->table->cast($id);
    }

    public function producers($id) {
        return $this->table->producers($id);
    }
}
