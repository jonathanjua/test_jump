<!DOCTYPE html>
<html>
<head>
    <title>API Status</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f2f2f2;
        }

        h1 {
            color: #333;
            font-size: 28px;
            margin-top: 150px;
        }

        p {
            color: #666;
            font-size: 18px;
            margin-top: 20px;
        }

        .status-ok {
            color: green;
        }

        .status-error {
            color: red;
        }
    </style>
</head>
<body>
    <h1>API Status: <span class="status-ok"> ON </span></h1>

    <p>Database Connection: <span class="{{ strpos($dbStatus, 'Error') !== false ? 'status-error' : 'status-ok' }}">{{ $dbStatus }}</span></p>
</body>
</html>
