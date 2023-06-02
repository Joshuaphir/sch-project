			$table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('post_id')->unsigned();
            $table->integer('parent_id')->unsigned()->nullable();
            $table->text('body');
            $table->timestamps();
            $table->softDelete();
            


    protected dates = ['deleted_at'];

    protected $fillable = ['user_id','post_id','parent_id','body'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function replies(){
    	return $this->hasMany(Comment::class, 'parent_id');
    }