<style>

    

    .flex-container{
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: flex-start;
    }

    .my-form form{
        display: flex;
        margin-top: 90px;
        width: 70%;
        height: 235px;
        align-items: flex-start;
        gap: 9px;
        flex-shrink: 0;
        border-radius: 20px;
        background: rgba(13, 14, 16, 0.09);
        backdrop-filter: blur(10.5px);
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
        margin-bottom: 20px;
    }

    .transparent-textarea {
        width: 100%; /* Set your desired width */
        height: 100%; /* Set your desired height */
        border-radius: 20px;
        padding: 30px 25px;
        background-color: rgba(255, 255, 255, 0.5); /* Set background color with alpha (0.5 for 50% transparency) */
        border: 1px solid #ccc; /* Add border for better visibility */
        resize: none; /* Prevent textarea resizing by user */
    }

    .bottom{
        border-radius: 0px 0px 20px 20px;
        background: #1310A2;
        backdrop-filter: blur(10.5px);
        display: flex;
        width: 100%;
        height: 58px;
        padding: 30px 25px;
        align-items: flex-start;
        gap: 9px;
        flex-shrink: 0;
        justify-content: space-between;
        align-items: center;
    }

    .btt{
        background: rgba(255, 255, 255, 0.15);
        border-radius: 5px;
    }

    .comment-section button {
        background: #1310A2;
        border-radius: 5px;
    }

    .comment-section button, .btt button{
        width: 140px;
        height: 37px;
        flex-shrink: 0;
        transition: background-color 0.3s ease;
    
    }
    
    .comment-section button:hover, .btt button:hover {
        border-radius: 5px;
        background-color: #67e084;; /* Change this to the desired hover color */
    }

    .result{
        width: 70%; 
        margin-top: 370px;
    }

    .container{
        display: flex;
        align-items: center;
        gap: 10px; /* Adjust the gap between elements as needed */
        margin-top: 30px; /* Adjust the top margin as needed */
        }

    .container p{
        margin-top: 10px;
    }

    .time {
        margin-left: auto;
    }


    .content{
        margin-top: 20px;
    }

    .separator {
        width: 100%;
        height: 1px;
        background-color: black;
        margin: 20px 0;
    }

    .content img {
        max-width: 70%;
        height: auto;
        max-height: 400px; /* Set a maximum height if needed */
        margin-top: 20px;
        border-radius: 20px;
        display: block; /* Use block display to avoid extra space beneath the image */
        margin-left: auto;
        margin-right: auto;
    }


    .buttons{
        margin-top: 10px;
        display: flex;
        justify-content: space-between;
    }

    .like-count{
        padding-bottom: 20px;
    }

    .hidden {
        display: none;
    }

    .comment-section {
        margin-top: 10px;
        position: relative; /* Change to relative positioning */
    }

    .comment-section form {
        display: flex;
        flex-direction: column;
    }

    .comment-section textarea {
        width: calc(100% - 20px); /* Adjusted width */
        margin-bottom: 10px;
        border-radius: 20px; /* Added border-radius */
        padding: 10px; /* Added padding */
        border: 1px solid #ccc; /* Added border */
    }

    .comment {
        margin-top: 10px;
        display: flex;
    }

    .comment p {
        margin-top: 12px;
        margin-left: 5px;
    }

    .comment img {
        width: 25px; 
        height: 25px; 
        opacity: 0.3;
        
    }

    #comment-btn {
        color: white;
        align-self: flex-end;
        margin-right: 20px;
    }


</style>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Forum') }}
        </h2>

        <br>
        
        <p>See what other people are talking about</p>
    </x-slot>

    <div style="background-image: url('/build/assets/eventsbg.png');background-repeat: repeat; min-height: 100vh;">

        <div class="flex-container">
                <div class="my-form">
                    <form action="{{ route('forum.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <textarea class="transparent-textarea" name="content" placeholder="What's on your mind?"></textarea>

                        <div class="bottom" style="position: absolute; bottom: 0;">

                            <input type="file" name="attachment">
                            
                            <div class="btt">

                                <button type="submit">Post</button>

                            </div>
                        </div>

                    </form>
                </div>
            
        
            <div class="result">
            
                @foreach($forums as $forum)
                    <div>
                        <div class="container">
                        <img src="{{ $forum->user->profile_photo_url }}" alt="{{ $forum->user->name }}" class="rounded-full h-10 w-10 object-cover">
                            <p><strong>{{ $forum->user->name }}</strong> </p>

                            <div class="time">
                                <p>{{ $forum->created_at->format('F j, Y H:i A') }}</p>
                            </div>

                        </div>
                            
                        <div class="content">
                            {{ $forum->content }}

                            @if($forum->attachment)
                                <img src="{{ asset('storage/attachments/' . $forum->attachment) }}" alt="Attachment">
                            @endif
                        </div>

                        <div class="buttons">
                            <!-- Like Button -->
                            <div class="like-button">
                                <button class="like-btn" data-forum-id="{{ $forum->id }}">
                                    <img src="{{ url('/build/assets/icons/like.png') }}" alt="Like Icon" style="width: 30px; height: 30px;">
                                </button>
                                <span class="like-count">{{ $forum->like_amount }}</span>
                            </div>

                            <!-- Comment Button -->
                            <div class="comment-button">
                                <button class="icon-button comment-button" data-comment-section="{{ $forum->id }}">
                                    <img src="{{ url('/build/assets/icons/comment.png') }}" alt="Comment Icon" style="width: 30px; height: 30px;">
                                </button>
                                <span class="reply-count">{{ $forum->comments->count() }}</span>
                            </div>

                            <!-- Share Button -->
                            <button class="icon-button share-button" data-forum-id="{{ $forum->id }}">
                                <img src="{{ url('/build/assets/icons/share.png') }}" alt="Share Icon" style="width: 30px; height: 30px;">
                            </button>

                        </div>

                        <!-- Comment Section (Initially Hidden) -->
                        <div id="comment-section-{{ $forum->id }}" class="comment-section hidden">

                            <!-- Display existing comments -->
                            @foreach($forum->comments as $comment)
                                <div class="comment">
                                    <img src="{{ asset('build/assets/icons/connect.png') }}" alt="Connector">
                                    <p><strong>{{ $comment->user->name }}</strong>: {{ $comment->content }}</p>
                                </div>
                            @endforeach

                            <br>

                            <form action="{{ route('forum.comment', $forum->id) }}" method="post">
                                @csrf
                                <textarea name="comment" placeholder="Add a comment"></textarea>
                                <button id="comment-btn" type="submit">Comment</button>
                            </form>

                        </div>


                        <div class="separator"></div>

                    </div>
                @endforeach

            </div>
        </div>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const likeButtons = document.querySelectorAll('.like-btn');
            const commentButtons = document.querySelectorAll('.comment-button');
            const shareButtons = document.querySelectorAll('.share-button');

            likeButtons.forEach(button => {
                button.addEventListener('click', async function() {
                    const forumId = this.getAttribute('data-forum-id');

                    // Get the CSRF token
                    const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

                    const response = await fetch(`/forums/like/${forumId}`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrfToken,
                        },
                    });

                    const data = await response.json();

                    // Update the like amount on the page
                    const likeCountSpan = this.parentElement.querySelector('.like-count');
                    likeCountSpan.textContent = data.like_amount;
                });
            });

            commentButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Get the forum ID from the data attribute
                    const forumId = this.dataset.commentSection;

                    // Find the comment section with the specific forum ID
                    const commentSection = document.getElementById(`comment-section-${forumId}`);

                    // Toggle the visibility of the comment section
                    commentSection.classList.toggle('hidden');

                    // Log the visibility status for debugging
                    console.log('Comment section visibility:', !commentSection.classList.contains('hidden'));
                });
            });

            shareButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const forumId = this.getAttribute('data-forum-id');
                    const forumUrl = window.location.origin + '/forum' ;
                    copyToClipboard(forumUrl);

                    // You can provide feedback to the user, for example:
                    alert('Forum URL copied to clipboard: ' + forumUrl);
                });
            });

            const mainForm = document.querySelector('.my-form form');

            mainForm.addEventListener('submit',function(){

                // event.preventDefault();

                alert('Your post will be pending for approval. Thank you for contributing!');
            })

            function copyToClipboard(text) {
                // Create a temporary textarea to copy the text to the clipboard
                const textarea = document.createElement('textarea');
                textarea.value = text;
                document.body.appendChild(textarea);
                textarea.select();
                document.execCommand('copy');
                document.body.removeChild(textarea);
            }
        });

    </script>



</x-app-layout>