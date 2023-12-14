<?php if(isset($_SESSION['session_token'])){ ?>
<main>
    <form method='post' action='/creation'>
        <div class="container mt-3">
            <div class='card'>
                <div class='card-header'>
                    Créer votre propre post :
                </div>
                <div class="card-body">
                    <input class='form-control mb-2' id='post-name' name='post-name' placeholder="Nom : Visite au Louvres"/>
                    <textarea class='form-control mb-2' id='post-context' name='post-context' placeholder="Contexte : Visite de Paris"></textarea>
                    <textarea class='form-control mb-2' id='post-content' name='post-content' placeholder="Contenu : J'ai vu la Joconde et plein d'autres oeuvres d'arts"></textarea>
                    <button class='btn btn-primary'>Créer le post</button>
                </div>
            </div>
        </div>
    </form>
</main>
<?php }
else {
    header("Location : /login");
}
?>