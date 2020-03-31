<?php
class User{
    private $pdo;

    private $id;
    private $fbId;
    private $nome;
    private $email;
    private $telefone;
    private $senha;
    private $avatar;
    private $estado;
    private $cidade;
    private $bairro;

    public function __construct($id = NULL){
        try {
            $this->pdo = new PDO("mysql:dbname=nqromais;host=localhost", "jackvini2", "Sacramento1@");
        } catch (PDOException $e) {
            echo "Error: ".$e->getMessage();
        }

        if(!empty($id)){
            $sql = "SELECT * FROM users WHERE id = :id";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(":id", $id);
            $sql->execute();

            if($sql->rowCount()>0){
                $data = $sql->fetch();
                
                $this->id = $data['id'];
                $this->fbId = $data['fb_id'];
                $this->nome = $data['nome'];
                $this->email = $data['email'];
                $this->telefone = $data['telefone'];
                $this->senha = $data['senha'];
                $this->avatar = $data['avatar'];
                $this->estado = $data['estado'];
                $this->cidade = $data['cidade'];
                $this->bairro = $data['bairro'];
            }
        }
    }


    public function getID(){
        return $this->id;
    }


    public function getNome(){
        return $this->nome;
    }
    public function setNome($n){
        $this->nome = $n;
    }


    public function getEmail(){
        return $this->email;
    }
    public function setEmail($e){
        $this->email = $e;
    }

    public function mudaEmail($e){
        if($this->verificaEmail($e) == false){
            $sql = "UPDATE users SET email = :email WHERE id = :id";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(":email", $e);
            $sql->bindValue(":id", $this->id);
            $sql->execute();

            $this->email = $e;
            return true;
        }else{
            return false;
        }
    }

    public function getTelefone(){
        return $this->telefone;
    }
    public function setTelefone($t){
        $this->telefone = $t;
    }
    

    public function setSenha($s){
        $this->senha = $s;
    }


    public function getFbId(){
        return $this->fbId;
    }

    public function setFbId($fbid){
        $this->fbId = $fbid;
    }

    
    public function getAvatar(){
        return $this->avatar;
    }

    public function setAvatar($a){
        $this->avatar = $a;
    }

    public function setEstado($estado){
        $this->estado = $estado;
    }public function getEstado(){
        return $this->estado;
    }

    public function setCidade($cidade){
        $this->cidade = $cidade;
    }public function getCidade(){
        return $this->cidade;
    }

    public function setBairro($bairro){
        $this->bairro = $bairro;
    }public function getBairro(){
        return $this->bairro;
    }

    public function SaveOrCreateUser(){
        if(!empty($this->id)){
            $sql = "UPDATE users 
                    SET
                        nome = :nome,
                        email = :email,
                        senha = :senha,
                        telefone = :telefone,
                        avatar = :avatar,
                        estado = :estado,
                        cidade = :cidade,
                        bairro = :bairro
                    WHERE id = :id";
            
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(":nome",$this->nome);
            $sql->bindValue(":email",$this->email);
            $sql->bindValue(":senha",$this->senha);
            $sql->bindValue(":telefone",$this->telefone);
            $sql->bindValue(":avatar",$this->avatar);
            $sql->bindValue(":estado", $this->estado);
            $sql->bindValue(":cidade", $this->cidade);
            $sql->bindValue(":bairro", $this->bairro);
            $sql->bindValue(":id", $this->id);
            $sql->execute();


        }else{
            if($this->verificaEmail($this->email) == false){
                $sql = "INSERT INTO users(id, fb_id, nome, email, avatar, senha, telefone, estado, cidade, bairro) 
                    VALUES (NULL,:fb_id,:nome,:email, :avatar,:senha, :estado, :cidade, :bairro)";
                
                $sql = $this->pdo->prepare($sql);
                $sql->bindValue(":fb_id",$this->fbId);
                $sql->bindValue(":nome",$this->nome);
                $sql->bindValue(":email",$this->email);
                $sql->bindValue(":avatar",$this->avatar);
                $sql->bindValue(":senha",$this->senha);
                $sql->bindValue(":telefone",$this->telefone);
                $sql->bindValue(":estado", $this->estado);
                $sql->bindValue(":cidade", $this->cidade);
                $sql->bindValue(":bairro", $this->bairro);
                $sql->execute();

                return true;
            }
            else{
                return false;
            }
        }

    }

    private function verificaEmail($e){
        $sql = "SELECT * FROM users WHERE email = :email";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":email", $e);
        $sql->execute();

        if($sql->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }

    public function verificaSenha($senha, $id){
        $sql = 'SELECT * FROM users WHERE senha = :senha AND id = :id';
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':senha', $senha);
        $sql->bindValue(':id', $id);
        $sql->execute();

        if($sql->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }

    public function salvarLogarFB(){
        $sql = 'SELECT * FROM users WHERE fb_id = :fb_id';
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":fb_id", $this->fbId);
        $sql->execute();

        if($sql->rowCount() > 0){
            foreach($sql as $dados){
                $_SESSION['id'] = $dados['id'];
                $_SESSION['fb_id'] = $dados['fb_id'];
            }
            
            header("Location: ../../index.php");
        }else{
            $sql = "INSERT INTO users(id, fb_id, nome, email, avatar, senha, telefone, estado, cidade, bairro) 
                    VALUES (NULL,:fb_id,:nome,:email, :avatar,:senha,:telefone,:estado,:cidade,:bairro)";
                
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(":fb_id",$this->fbId);
            $sql->bindValue(":nome",$this->nome);
            $sql->bindValue(":email",$this->email);
            $sql->bindValue(":avatar",$this->avatar);
            $sql->bindValue(":senha",$this->senha);
            $sql->bindValue(":telefone",$this->telefone);
            $sql->bindValue(":estado", $this->estado);
            $sql->bindValue(":cidade", $this->cidade);
            $sql->bindValue(":bairro", $this->bairro);
            $sql->execute();

            $sql2 = 'SELECT * FROM users WHERE fb_id = :fb_id';
            $sql2 = $this->pdo->prepare($sql2);
            $sql2->bindValue(":fb_id", $this->fbId);
            $sql2->execute();

            foreach($sql2 as $dados){
                $_SESSION['id'] = $dados['id'];
                $_SESSION['fb_id'] = $dados['fb_id'];
            }
            
            header("Location: ../../index.php");
        }

    }

    public function defaultLogin($e, $s){
        $sql = 'SELECT * FROM users WHERE email = :email AND senha = :senha';
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":email", $e);
        $sql->bindValue(":senha", $s);
        $sql->execute();

        if($sql->rowCount() == 1){
            $dados = $sql->fetch();
            $_SESSION['id'] = $dados['id'];
            $_SESSION['fb_id'] = $dados['id'];
            return true;
        }else{
            return false;
        }
    }

    public function senhaEmpty($id){
        $user_id = $id;
        $sql = 'SELECT * FROM users WHERE id = :id';
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':id', $user_id);
        $sql->execute();

        if($sql->rowCount() == 1){
            foreach($sql as $dados);
        }

        if($dados['senha'] == null){
            return true;
        }else{
            return false;
        }
    }
}

    



?>