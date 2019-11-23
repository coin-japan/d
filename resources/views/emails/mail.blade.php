Hello <i>{{ $mail->receiver }}</i>,

<p><b>Name:</b> {{ $mail->name }}</p>
<p><b>Email:</b> {{ $mail->email }}</p>
<p><b>Phone:</b> {{ $mail->phone }}</p>
<br>
<p><b>Message:</b> {{ $mail->message }}</p>
<br>
Thank You,
<br/>
<i>{{ $mail->sender }}</i>