<?php

namespace App\Traits;

trait TitlesController
{
    public function frontendStart($channel, $pp) {
        return $this->table->frontendStart($channel, $pp);
    }

    public function frontendPage($channel, $page, $pp) {
        return $this->table->frontendPage($channel, $page, $pp);
    }

    public function cast($id)
    {
        return $this->table->cast($id);
    }

    public function producers($id) {
        return $this->table->producers($id);
    }
}
