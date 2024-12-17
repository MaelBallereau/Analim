<nav class="navbar">
    <button class="nav-button"><a href="./">Accueil</a></button>
    <button class="nav-button"><a href="./?action=congressiste">Congressiste</a></button>
    <button class="nav-button"><a href="./?action=create">Creer Session</a></button>
    <button class="nav-button"><a href="./?action=inscrit">Voir inscrit</a></button>
</nav>

<style>
    /* Style général */
    body {
        margin: 0;
        font-family: 'Arial', sans-serif;
        background-color: #f5f5f5;
    }

    /* Barre de navigation */
    .navbar {
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #333;
        padding: 15px 20px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    /* Boutons de navigation */
    .nav-button {
        background-color: #ffffff;
        border: 2px solid #fff;
        border-radius: 25px;
        padding: 10px 20px;
        margin: 0 10px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    /* Lien dans les boutons */
    .nav-button a {
        text-decoration: none;
        color: #333;
        font-weight: bold;
        font-size: 16px;
    }

    /* Effets au survol */
    .nav-button:hover {
        background-color: #555;
        border-color: #555;
    }

    .nav-button:hover a {
        color: #fff;
    }
</style>