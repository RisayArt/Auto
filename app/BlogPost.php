<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model {

    protected $connection = 'mysql2';
    protected $table = 'posts';
    protected $primaryKey = 'ID';

    /**
     * Get the postmeta for the blog post.
     */
    public function postmetas() {
        return $this->hasMany('App\BlogPostmeta', 'post_id');
    }

    /**
     * Get comments from the blog post.
     */
    public function comments() {
        return $this->hasMany('BlogComment', 'comment_post_ID');
    }

    /**
     * Filter by post type
     */
    public function scopeType($query, $type = 'post') {
        return $query->where('post_type', '=', $type);
    }

    /**
     * Filter by post status
     */
    public function scopeStatus($query, $status = 'publish') {
        return $query->where('post_status', '=', $status);
    }

    /**
     * Filter by post author
     */
    public function scopeAuthor($query, $author = null) {
        if (!empty($author)) {
            return $query->where('post_author', '=', $author);
        }
    }

    //Method to get post with postmeta
    Public function getPosts() {
        return BlogPost::with('postmetas')
            ->status()
            ->type()
            ->get();
    }

}
