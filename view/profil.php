<?php ob_start(); ?>

    <?php
        $profil = $req->fetch();
    ?>

    <div class="row body_current">
        <div class="title_profile_section col-sm-8 col-md-8 col-lg-6 col-xl-6 offset-2">
            <h1>Votre profil</h1>
        </div>

        <div class="modify_password_section col-sm-8 col-md-8 col-lg-6 col-xl-6 offset-2">
            <h2>Modifier votre mot de passe</h2>
<!--            <p>--><?//= isset( $error_msg ) ? $error_msg : null; ?><!--</p>-->
            <form action="#" method="POST">
                <div class="row">
                    <div class="form-group col-sm-8 col-md-8 col-lg-8 col-xl-8">
                        <?php
                        if(isset($_POST['change_password'])){
                            changePassword($profil['id']);
                        }
                        ?>
                        <label for="current_password">Veuillez saisir votre mot de passe actuel :</label>
                        <input type="text" name="current_password" class="form-control" id="input_current_password" required>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-sm-8 col-md-8 col-lg-8 col-xl-8">
                        <label for="new_password">Veuillez saisir votre nouveau mot de passe :</label>
                        <input type="text" name="new_password" class="form-control" id="input_new_password" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" name="change_password">Valider</button>
            </form>
        </div>

        <div class="modify_mail_section col-sm-8 col-md-8 col-lg-6 col-xl-6 offset-2">
            <h2>Modifier votre adresse email</h2>
            <p><span class="your_mail">Votre adresse email actuelle :</span> <?php echo $profil['email'] ?></p>
            <form action="#" method="POST">
                <div class="row">
                    <div class="form-group col-sm-8 col-md-8 col-lg-8 col-xl-8">
                        <?php
                        if(isset($_POST['change_email'])){
                            changeEmail($profil['id']);
                        }
                        ?>
                        <label for="new_email">Veuillez saisir votre nouvelle adresse email :</label>
                        <input type="text" name="new_email" class="form-control" id="input_new_email" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" name="change_email">Valider</button>
            </form>
        </div>

        <div class="modify_mail_section col-sm-8 col-md-8 col-lg-6 col-xl-6 offset-2">
            <h2>Supprimer votre compte</h2>
            <form action="#" method="POST">
                <div class="row">
                    <div class="form-group col-sm-8 col-md-8 col-lg-8 col-xl-8">
                        <?php
                        if(isset($_POST['delete_account'])){
                            deleteAccount($profil['id']);
                        }
                        ?>
                        <label for="delete_account_password">Veuillez confirmer avec votre mot de passe :</label>
                        <input type="text" name="delete_account_password" class="form-control" id="delete_account_password" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" name="delete_account">Valider</button>
            </form>
        </div>

    </div>



<?php $content = ob_get_clean(); ?>

<?php require('dashboard.php'); ?>