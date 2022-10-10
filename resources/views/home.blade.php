<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
</head>
<body >
        <ul>
            <li>User - {{ App\Models\User::count() }}</li>
            <li>Jobs - {{ App\Models\Job::count() }}</li>
            <li>FaildsJobs - {{ App\Models\FailedJob::count() }}</li>
            <li>CustomQueue - {{ App\Models\Queue::count() }}</li>
            <li>CustomFaildsQueue - {{ App\Models\FailedQueue::count() }}</li>
        </ul>
        @if (\Session::has('success'))
            <b>
            {!! \Session::get('success') !!}
            </b>
        @endif
        <form method="POST" action="{{ route('add.queue') }}">
            @csrf
            <button type="submit">Default Queue</button>
        </form>
        <form method="POST" action="{{ route('add.queue.custom') }}">
            @csrf
            <button type="submit">Custom Queue</button>
        </form>
</body>
</html>
