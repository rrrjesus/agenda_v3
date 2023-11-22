<?php

namespace Source\Models;

use Source\Core\Model;

/**
 *
 */
class Post extends Model
{

    public function __construct()
    {
        parent::__construct("posts", ["id"], ["views"]);
    }

    /**
     * @return bool
     */
    public function save(): bool
    {
            $postId = $this->id;
            $this->update($this->safe(), "id = :id", "id={$postId}");
            return true;
    }
}