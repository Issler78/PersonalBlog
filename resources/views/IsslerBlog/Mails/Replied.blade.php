<h3>Hello</h3>
<h1>Your @php echo( $postOrReply ? 'Post' : 'Reply' ); @endphp has been Replied!</h1>
<br>
<p><a href="{{ route('IsslerBlog.show', ['id' => $reply->post_id]) }}">View</a></p>