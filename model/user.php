<?php

require_once('database.php');

class User
{

    protected $id;
    protected $email;
    protected $password;
    protected $confirm_key;
    protected $active;


    public function __construct($user = null)
    {

        if ($user != null):
            $this->setId(isset($user->id) ? $user->id : null);
            $this->setEmail($user->email);
            $this->setPassword($user->password, isset($user->password_confirm) ? $user->password_confirm : false);
            $this->setConfirmkey($user->confirm_key);
        endif;
    }

    /***************************
     * -------- SETTERS ---------
     ***************************/

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setEmail($email)
    {

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)):
            throw new Exception('Email incorrect');
        endif;

        $this->email = $email;

    }

    public function setPassword($password, $password_confirm = false)
    {

        if ($password_confirm && $password != $password_confirm):
            throw new Exception('Vos mots de passes sont différents');
        endif;

        $this->password = hash("sha256", $password);
    }

    public function setConfirmkey($confirm_key)
    {
        $this->confirm_key = $confirm_key;
    }

    public function setActive($active)
    {
        $this->active = $active;
    }

    /***************************
     * -------- GETTERS ---------
     ***************************/

    public function getId()
    {
        return $this->id;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getActive()
    {
        return $this->active;
    }

    public function getConfirmkey()
    {
        return $this->confirm_key;
    }


    /***********************************
     * -------- CREATE NEW USER ---------
     ************************************/

    public function createUser()
    {

        // Open database connection
        $db = init_db();

        // Check if email already exist
        $req = $db->prepare("SELECT * FROM user WHERE email = ?");
        $req->execute(array($this->getEmail()));

        if ($req->rowCount() > 0) throw new Exception("Email ou mot de passe incorrect");

        // Insert new user
        $req->closeCursor();

        $req = $db->prepare("INSERT INTO user ( email, password, active, confirm_key ) VALUES ( :email, :password, :active, :confirm_key )");
        $req->execute(array(
            'email' => $this->getEmail(),
            'password' => $this->getPassword(),
            'active' => $this->getActive(),
            'confirm_key' => $this->getConfirmkey()
        ));

        $user_mail = $this->getEmail();
        $confirm_key = $this->getConfirmkey();
//        $message_confirm = "Bonjour, merci de cliquer sur le lien suivant pour confirmer votre inscription : http://localhost:8888/index.php?pseudo=".$user_mail."&key=".$confirm_key."\r\n";
        $message_confirm ='
        <html>
            <body>
                <div align="center">
                    <a href="http://localhost:8888/index.php?mail='.urldecode($user_mail).'&key='.$confirm_key.'">Cliquez sur ce lien pour confirmer votre compte</a>
                </div>
            </body>
        </html>
        ';
        $headers = "MIME-Version: 1.0\r\n";
        $headers.= 'Content-Type: text/html; charset="utf-8"'."\n";
        $headers.= "FROM: donotreply@codflix.com";
        $headers.= 'Content-Transfer-Encoding: 8bit';

        mail($user_mail, 'Confirmation de compte', $message_confirm, $headers);
        // Close databse connection
        $db = null;

    }

    /**************************************
     * -------- GET USER DATA BY ID --------
     ***************************************/

    public static function getUserById($id)
    {

        // Open database connection
        $db = init_db();

        $req = $db->prepare("SELECT * FROM user WHERE id = ?");
        $req->execute(array($id));

        // Close databse connection
        $db = null;

        return $req->fetch();
    }

    /***************************************
     * ------- GET USER DATA BY EMAIL -------
     ****************************************/

    public function getUserByEmail()
    {

        // Open database connection
        $db = init_db();

        $req = $db->prepare("SELECT * FROM user WHERE email = ?");
        $req->execute(array($this->getEmail()));

        // Close databse connection
        $db = null;

        return $req->fetch();
    }

}
