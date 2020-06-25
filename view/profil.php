<?php ob_start(); ?>

    <?php
        $profil = $req->fetch();
    ?>

    <div class="row">
        <div class="title_profile_section col-sm-8 col-md-8 col-lg-6 col-xl-6 offset-2">
            <h1>Votre profil</h1>
        </div>
        <div class="modify_password_section col-sm-8 col-md-8 col-lg-6 col-xl-6 offset-2">
            <h2>Modifier votre mot de passe</h2>
            <form action="#" method="POST">
                <div class="row">
                    <div class="form-group col-sm-8 col-md-8 col-lg-8 col-xl-8">
                        <label for="input_name">Veuillez saisir votre mot de passe actuel :</label>
                        <input type="text" name="current_password" class="form-control" id="input_current_password" required>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-sm-8 col-md-8 col-lg-8 col-xl-8">
                        <label for="input_name">Veuillez saisir votre nouveau mot de passe :</label>
                        <input type="text" name="new_password" class="form-control" id="input_new_password" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" name="change_password">Valider</button>
                <?php
                if(isset($_POST['change_password'])){
                    changePassword($profil['id']);
                }
                ?>
            </form>
        </div>
        <div class="modify_mail_section col-sm-8 col-md-8 col-lg-6 col-xl-6 offset-2">
            <h2>Modifier votre adresse email</h2>
            <p><span class="your_mail">Votre adresse email actuelle :</span> <?php echo $profil['email'] ?></p>
        </div>
    </div>



<?php $content = ob_get_clean(); ?>

<?php require('dashboard.php'); ?>