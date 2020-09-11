<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogPostmeta extends Model {

    protected $connection = 'mysql2';
    protected $table = 'postmeta';
    protected $primaryKey = 'meta_id';

    /**
     * Get the postmeta for the blog post.
     */
    public function post() {
        return $this->belongsTo('App\BlogPost');
    }


}
