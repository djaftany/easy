<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="module" src="/js/login.js"></script>
    <title>Easy | Create Account</title>

    <style>
        body {
            display: flex;
            position: fixed;
            width: 100%;
            height: 100%;
            justify-content: center;
            align-items: center;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: .2rem;
        }

        input,
        button {
            outline: 0;
            padding: .5rem 1rem;
            border: solid 1px blueviolet;
            border-radius: .3rem;
            color: gray;
        }

        button {
            background-color: blueviolet;
            color: white;
        }
    </style>
</head>

<body>
    <main>
        <form name="form">
            <input id="email" type="email" placeholder="Email">
            <input id="password" type="password" placeholder="Password">
            <button id="btn">Entrar</button>
        </form>
    </main>
</body>

</html>