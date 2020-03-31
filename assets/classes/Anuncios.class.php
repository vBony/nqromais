<?php
class Anuncio{
    private $pdo;
    private $id;
    private $userid;
    private $titulo;
    private $preco;
    private $desc;
    private $categoria_id;
    private $estado;
    private $cidade;
    private $bairro;
    private $fotos;

    public function __construct(){
        try{
            $this->pdo = new PDO("mysql:dbname=nqromais;host=localhost", "jackvini2", "Sacramento1@");
        }catch(PDOException $e){
            echo "Error: ".$e->getMessage();
        }
    }

    public function getId(){
        return $this->id;
    }

    public function setUserId($uid){
        $this->userid = $uid;
    }public function getUserId(){
        return $this->userid;
    }

    public function setTitulo ($titulo){
        $this->titulo = $titulo;
    } public function getTitulo (){
        return $this->titulo;
    }

    public function setPreco($preco){
        $this->preco = $preco;
    } public function getPreco(){
        return $this->preco;
    }


    public function setDesc($desc){
        $this->desc = $desc;
    } public function getDesc(){
        return $this->desc;
    }

    public function setCategoriaID($categoriaID){
        $this->categoria_id = $categoriaID;
    } public function getCategoria(){
        return $this->categoria_id;
    }

    public function setEstado($estado){
        $this->estado = $estado;
    } public function getEstado(){
        return $this->estado;
    }

    public function setCidade($cidade){
        $this->cidade = $cidade;
    } public function getCidade(){
        return $this->cidade;
    }

    public function setBairro($bairro){
        $this->bairro = $bairro;
    } public function getBairro(){
        return $this->bairro;
    }

    public function setFotos($fotos){
        $this->fotos = $fotos;
    }

    
    public function Save_anuncio(){
           

        $sql = "INSERT INTO nqromais.anuncios(id, userid, categoria_id, titulo, descricao, valor, cidade, estado, bairro) 
                VALUES (NULL,:userid,:categoria_id,:titulo,:descricao,:valor,:cidade,:estado,:bairro)";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":userid", $this->userid);
        $sql->bindValue(":categoria_id", $this->categoria_id);
        $sql->bindValue(":titulo", $this->titulo);
        $sql->bindValue(":descricao", $this->desc);
        $sql->bindValue(":valor", $this->preco);
        $sql->bindValue(":cidade", $this->cidade);
        $sql->bindValue(":estado", $this->estado);
        $sql->bindValue(":bairro", $this->bairro);

        $sql->execute();

        $sql2 = "SELECT id FROM anuncios WHERE userid = :userid AND titulo = :titulo AND valor = :valor AND descricao = :descricao";
        $sql2 = $this->pdo->prepare($sql2);
        $sql2->bindValue(":userid", $this->userid);
        $sql2->bindValue(":titulo", $this->titulo);
        $sql2->bindValue(":valor", $this->preco);
        $sql2->bindValue(":descricao", $this->desc);
        $sql2->execute();

        $data = $sql2->fetch();  //Pegando o ID do anuncio
        $idAnunc = $data['id'];
        

        if(count($this->fotos) > 0){
            for($i=0;$i<count($this->fotos['tmp_name']);$i++){
                $tipo = $this->fotos['type'][$i];
                if(in_array($tipo, array('image/jpeg', 'image/png'))){
                    $tmpname = 'iD'.$idAnunc.'_'.time('d-m-y').'_'.rand(0,9999).'.jpg';
                    move_uploaded_file($this->fotos['tmp_name'][$i], '../../assets/imgs/anuncios/'.$tmpname);

                    list($width_orig, $heigth_orig) = getimagesize('../../assets/imgs/anuncios/'.$tmpname);
                    $ratio = $width_orig/$heigth_orig;
                    $width = 500;
                    $heigth = 500;

                    if($width/$heigth > $ratio){
                        $width = $heigth * $ratio;
                    }else{
                        $heigth = $width/$ratio;
                    }

                    $img = imagecreatetruecolor($width, $heigth);
                    if($tipo == 'image/jpeg'){
                        $origi = imagecreatefromjpeg('../../assets/imgs/anuncios/'.$tmpname);
                    }elseif($tipo == 'image/png'){
                        $origi = imagecreatefrompng('../../assets/imgs/anuncios/'.$tmpname);
                    }

                    imagecopyresampled($img, $origi, 0,0,0,0, $width, $heigth, $width_orig, $heigth_orig);

                    imagejpeg($img, '../../assets/imgs/anuncios/'.$tmpname, 80);

                    $sql3 = "INSERT INTO img_anuncio SET id = NULL, anuncio_id = :anuncio_id, img_anuncio.url = :url";
                    $sql3 = $this->pdo->prepare($sql3);
                    $sql3->bindValue(":anuncio_id", $idAnunc);
                    $sql3->bindValue(":url", $tmpname);
                    $sql3->execute();
                }
            }
        }
    }

}
?>
