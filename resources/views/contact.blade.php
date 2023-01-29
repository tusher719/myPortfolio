<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mail Message</title>
    <style>
        .divCls {
            border: 1px solid rgb(65, 65, 65);
            border-radius: 5px;
            padding: 0 12px;
        }
    </style>
</head>

<body>
    <div class="divCls">
        <p>
            <strong>Name : </strong>
            <span>{{ $name }}</span>
        </p>
        <p>
            <strong>Email : </strong>
            <span>{{ $email }}</span>
        </p>
        <p>
            <strong>Message : </strong>
            <span>{!! $contact !!}</span>
        </p>
    </div>

    </div>
</body>

</html>
