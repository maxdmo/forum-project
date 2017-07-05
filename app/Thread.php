<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{

    protected $guarded = [];

	/**
	 * Fetch a path to the current thread.
	 *
	 * @return string
	 */
	public function path()
    {
	    return "/threads/{$this->channel->slug}/{$this->id}";
	}


    /**
     *  A thread has many replies.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
	public function replies() 
	{
	
		return 	$this->hasMany(Reply::class);
	
	}


    /**
     *  A thread belongs to a creator.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
	public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    /**
     *  A thread belongs to a channel .
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function channel()
    {
        return $this->belongsTo(Channel::class);
    }


    /**
     *  Add a reply to the thread.
     *
     *  @param $reply
     */
    public function addReply($reply)
    {
        $this->replies()->create($reply);
    }

}
