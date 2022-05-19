<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
    <title></title>
</head>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        text-decoration: none;
    }

    a, a:visited {
        color: white;
    }
</style>
<body style="width: 100vw; height: 100vh; padding: 2rem; text-align: center">
<img style="width: 100%;" src="{{ asset('assets/preview.png') }}" alt="preview-image">
<h1 style="text-align: center; width: 100%; font-family: Inter,sans-serif; font-weight: bold; font-size: 20px; margin-top: 20px">Confirmation email</h1>
<h1 style=" text-align: center; width: 100%; font-family: Inter,sans-serif; font-weight: normal; font-size: 16px; margin-top: 10px">click this button to verify your email</h1>
<a style="width: 100%; height: 100%; font-family: Inter,sans-serif;" href="{{ $actionUrl }}">
    <button
        style="margin-bottom: 2rem; padding: 1rem 2rem; margin-top: 20px; background-color: forestgreen; color: white; font-weight: bold; border: none; border-radius: 7px; cursor: pointer"
    >
        VERIFY EMAIL
    </button>
</a>
