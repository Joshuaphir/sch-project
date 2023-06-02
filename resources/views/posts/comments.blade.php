

@foreach($comments as $comment)
    <div class="container mx-auto p-2" @if($comment->parent_id != null) style="margin-left:40px;" @endif>
        <div class="mx-auto max-w-lg">

            <div class="flex flex-col">
                <h1 class="text-2xl">{{ $comment->user->username }}</h1>
                <div class="flex flex-col mx-4">
                    <p>{{ $comment->body }}</p> 
                    <a href="" id="reply"></a>
                </div>
                @if($comment->parent_id == null)
                <form method="post" action="/comment-store">
                    @csrf
                    <div class="flex flex-col mb-4">
                        <div>
                            <input class="p-3 border m-3" type="text" name="body">
                            <input type="hidden" name="post_id" value="{{ $show->id }}" />
                            <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                        </div>
                        <div class="mb-4">
                            <button type="submit" class="text-sm w-1/4 p-2 text-white md:ring-1 md:ring-white md:ring-offset-1 md:ring-offset-gray-100 bg-yellow-700 border-2 border-blue-300 md:rounded-lg md:baseline">
                            reply
                            </button>  
                        </div>
                    </div>
                @endif   
                </form>
                @include('posts.comments',['comments'=>$comment->replies])
            </div>
        </div>
    </div>

@endforeach
