<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>

        Erreur serveur

    </title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

</head>

<body
    class="bg-slate-950 text-white flex items-center justify-center min-h-screen">

    <div class="text-center max-w-2xl px-6">

        <h1
            class="text-7xl font-bold text-red-500 mb-6">

            500

        </h1>

        <h2
            class="text-4xl font-bold mb-6">

            Une erreur est survenue

        </h2>

        <p
            class="text-slate-400 text-lg mb-10">

            Le serveur rencontre actuellement un problème.
            Veuillez réessayer dans quelques instants.

        </p>

        <a
            href="/"
            class="inline-block bg-blue-600 hover:bg-blue-700 transition px-8 py-4 rounded-xl">

            Retour à l'accueil

        </a>

    </div>

</body>

</html>