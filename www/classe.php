<?php
require_once('sql.php');
class Cliente {
    //dados pessoais
    private $idCliente;
    private $nome;
    private $dataNascimento;
    private $sexo;
    private $estadoCivil;
    private $rg;
    private $cpf;
    //endereço
    private $cidade;
    private $estado;
    private $bairro;
    private $rua;
    private $numero;
    private $cep;
    //telefone
    private $prefixo;
    private $telefone;
    //usuario
    private $email;
    private $senha;
    private $nivel;
    
    function getId(){
        return $this->idCliente;
    }
    
    function setId($idUsuario){
        $this->idCliente = $idUsuario;
    }
    
    function getNome(){
        return $this->nome;
    }
    
    function setNome($nome){
        $this->nome = $nome;
    }
    
    function getDatNasc(){
        return $this->dataNascimento;
    }
    
    function setDatNasc($dataNascimento){
        $this->dataNascimento = $dataNascimento;
    }
    
    function getSexo(){
        return $this->sexo;
    }
    
    function setSexo($sexo){
        $this->sexo = $sexo;
    }
    
    function getEstCivil(){
        return $this->estadoCivil;
    }
    
    function setEstCivil($estadoCivil){
        $this->estadoCivil = $estadoCivil;
    }
    
    function getRg(){
        return $this->rg;
    }
    
    function setRg($rg){
        $this->rg = $rg;
    }
    
    function getCpf(){
        return $this->cpf;
    }
    
    function setCpf($cpf){
        $this->cpf = $cpf;
    }
    
    function getCidade(){
        return $this->cidade;
    }
    
    function setCidade($cidade){
        $this->cidade = $cidade;
    }
    
    function getEstado(){
        return $this->estado;
    }
    
    function setEstado($estado){
        $this->estado = $estado;
    }
    
    function getBairro(){
        return $this->bairro;
    }
    
    function setBairro($bairro){
        $this->bairro = $bairro;
    }
    
    function getRua(){
        return $this->rua;
    }
    
    function setRua($rua){
        $this->rua = $rua;
    }
    
    function getNumero(){
        return $this->numero;
    }
    
    function setNumero($numero){
        $this->numero = $numero;
    }
    
    function getCep(){
        return $this->cep;
    }
    
    function setCep($cep){
        $this->cep = $cep;
    }
    
    function getPrefixo(){
        return $this->prefixo;
    }
    
    function setPrefixo($prefixo){
        $this->prefixo = $prefixo;
    }
    
    function getTelefone(){
        return $this->telefone;
    }
    
    function setTelefone($telefone){
        $this->telefone = $telefone;
    }
    
    function getEmail(){
        return $this->email;
    }
    
    function setEmail($email){
        $this->email = $email;
    }
    
    function getSenha(){
        return $this->senha;
    }

    function setSenha($senha){
        $this->senha = $senha;
    }

    function getNivel(){
        return $this->nivel;
    }
    
    function setNivel($nivel){
        $this->nivel = $nivel;
    }
    
    static function verificar($email){//início do escopo function verificar
        $objSQL = new SQL();
        $sql = "select * from usuario where email = '$email'";
        $resultado = $objSQL->consQuery($sql);
        if($resultado == null) return null;
        return $resultado;
        
    }//fecha function Validar
    
    function cadastrar($nome,$email,$senha){//início do escopo function cadastrar
        //string sql q insere o nome na tabela cliente
        $objSQL = new SQL();
        $sql = "insert into cliente (nome) values ('$nome')";
        $objSQL->execQuery($sql);
        $id = mysql_insert_id();
        $sql = "insert into usuario(cliente_idCliente,email,senha) values ({$id},'$email','$senha')";
        $objSQL->execQuery($sql);
        $sql = "insert into endereco (cliente_idCliente) values ({$id})";
        $objSQL->execQuery($sql);
        $sql = "insert into telefone (cliente_idCliente) values ({$id})";
        $objSQL->execQuery($sql);
        
    }//fecha cadastrar
    
    public static function logar($email,$senha){
        $objSQL = new SQL();
        $sql = "select nome,idCliente,nivel from cliente inner join usuario 
        where usuario.email = '$email' and usuario.senha = '$senha'
        and cliente.idCliente=usuario.cliente_idCliente";
        $resultado = $objSQL->consQuery($sql);
        $usuario = new Cliente();
        $usuario->idCliente = $resultado['idCliente'];
        $usuario->nome = $resultado['nome'];
        $usuario->nivel = $resultado['nivel'];
        if($usuario->idCliente == null) return null;
        return $usuario;
    }//fecha function Logar
    
    public static function getUsuario($idUsuario){//início do escopo function chamardados
        $objSQL = new SQL();
        $sql = "SELECT nome,dataNascimento,sexo,estadoCivil,rg,cpf,
                email,senha,nivel,cidade,estado,bairro,rua,numero,cep,
                prefixo,numTel FROM usuario u
                INNER JOIN cliente c
                INNER JOIN endereco e
                INNER JOIN telefone t
                ON(u.cliente_idCliente=c.idCliente AND c.idCliente=e.cliente_idCliente AND 
                e.cliente_idCliente=t.cliente_idCliente)
                WHERE c.idCliente = '$idUsuario'";
        $resultado = $objSQL->consQuery($sql);
        $usuario = new Cliente();
        $usuario->nome = $resultado['nome'];
        $conversor = explode("-",$resultado['dataNascimento']);
        $data = array_reverse($conversor);
        $usuario->dataNascimento = implode("/",$data);
        $usuario->sexo = $resultado['sexo'];
        $usuario->estadoCivil = $resultado['estadoCivil'];
        $usuario->rg = $resultado['rg'];
        $usuario->cpf = $resultado['cpf'];
        $usuario->email = $resultado['email'];
        $usuario->senha = $resultado['senha'];
        $usuario->cidade = $resultado['cidade'];
        $usuario->estado = $resultado['estado'];
        $usuario->bairro = $resultado['bairro'];
        $usuario->rua = $resultado['rua'];
        $usuario->numero = $resultado['numero'];
        $usuario->cep = $resultado['cep'];
        $prefixo = "(".$resultado['prefixo'].")";
        $usuario->telefone = $prefixo.$resultado['numTel'];
        $usuario->nivel = $resultado['nivel'];
        return $usuario;
    }//final escopo chamardados
    public static function listaUsuario(){
        $objSQL = new SQL();
        $sql = "select nome,email,nivel,idCliente from cliente inner join usuario 
                where cliente.idCliente=usuario.cliente_idCliente";
        $resultado = $objSQL->execQuery($sql);
        $usuarios = array();
        $i = 0;
        while($linha = mysql_fetch_assoc($resultado)){
            $usuario = new Cliente();
            $usuario->nome = $linha['nome'];
            $usuario->email = $linha['email'];
            $usuario->idCliente = $linha['idCliente'];
            if($linha['nivel'] == 0){
                $usuario->nivel = 'Cliente';
            }else{
                $usuario->nivel = 'Administrador';
            }
            $usuarios[$i] = $usuario;
            $i++;
        }
        return $usuarios;
    }//fecha function listaUsuario
    
    public static function testSenha($email){
        $objSQL = new SQL();
        $usuario = new Cliente();
        $sql = "SELECT email,senha,idCliente FROM cliente INNER JOIN usuario
        WHERE usuario.email = '$email'
        AND cliente.idCliente=usuario.cliente_idCliente";
        $resultado = $objSQL->consQuery($sql);
        $usuario->senha = $resultado['senha'];
        $usuario->setId($resultado['idCliente']);
        $usuario->email = $resultado['email'];
        return $usuario;
    }
    
    public static function pegarId($email){
        $objSQL = new SQL();
        $sql = "select idCliente,nivel from cliente inner join usuario where 
        usuario.email = '$email' and cliente.idCliente=usuario.cliente_idCliente";
        $resultado = $objSQL->consQuery($sql);
        $usuario = new Cliente();
        $usuario->idCliente = $resultado['idCliente'];
        $usuario->nivel = $resultado['nivel'];
        return $usuario;
    }
    public static function updUsuario($usuario){
        $objSQL = new SQL();
        $idCliente = $usuario->getId();
        $nome = $usuario->getNome();
        $datNasc = $usuario->getDatNasc();
        $sexo = $usuario->getSexo();
        $estCivil = $usuario->getEstCivil();
        $rg = $usuario->getRg();
        $cpf = $usuario->getCpf();
        $cidade = $usuario->getCidade();
        $uf = $usuario->getEstado();
        $bairro = $usuario->getBairro();
        $rua = $usuario->getRua();
        $numero = $usuario->getNumero();
        $cep = $usuario->getCep();
        $prefixo = $usuario->getPrefixo();
        $telefone = $usuario->getTelefone();
        $email = $usuario->getEmail();
        $senha = $usuario->getSenha();
        
        $sql = "update cliente inner join usuario inner join endereco inner join telefone
                set nome = '$nome',dataNascimento = '$datNasc',sexo = '$sexo',estadoCivil = '$estCivil',
                rg = '$rg',cpf = '$cpf',cidade = '$cidade',estado = '$uf',bairro = '$bairro',rua = '$rua',
                numero = '$numero',cep = '$cep',prefixo = '$prefixo',numTel = '$telefone',
                email = '$email',senha = '$senha'
                where cliente.idCliente=usuario.cliente_idCliente
                and cliente.idCliente=endereco.cliente_idCliente
                and cliente.idCliente=telefone.cliente_idCliente
                and cliente.idCliente = '$idCliente'";
        $objSQL->execQuery($sql);
        return;
    }
    
    public static function dropUser($idUsuario){
        $objSQL = new SQL();
        $sql = "delete from cliente where idCliente = '$idUsuario'";
        $objSQL->execQuery($sql);
        return;
    }
    
    public static function altNivel($idUsuario,$nivel){
        $objSQL = new SQL();
        $sql = "UPDATE usuario INNER JOIN cliente SET usuario.nivel = '$nivel'
        WHERE cliente.idCliente = usuario.cliente_idCliente AND cliente.idCliente = '$idUsuario'";
        $objSQL->execQuery($sql);
        return;
    }
    
}//fecha classe Cliente

/*class Admin extends Cliente{
    function InserirMidia($titulo,$subtitulo,$preco,$genero,$plataforma){
        $conversor = explode(",",$preco);
        $preco = implode(".",$conversor);
        
        $comando = mysql_query("INSERT INTO midia (titulo,subtitulo,preco,idPlataforma)
                                VALUES ('$titulo','$subtitulo','$preco','$plataforma')")
                   or die ("Erro ao inserir produto.");
        
        $comando = mysql_query("SELECT TOP 1 idMidia FROM midia ORDER BY idMidia DESC")
                   or die ("Falha ao resgatar id da mídia.");
        
        $linha = mysql_fetch_assoc($comando);
        $midia = $linha['idMidia'];
        
        foreach($genero as $generos){
            $comando = mysql_query("INSERT INTO genero_midia(idGenero_Catalogo,Midia_idMidia)
                                    VALUES ('$genero','$midia')")
                       or die ("Erro ao inserir genero na midia.");
        }
        
            echo <<<HTML
                <html>
                    <body>
                        <script>
                            alert("Produto cadastrado.")
                        </script>
                    </body>
                </html>
HTML;
        return;
    }//fecha function InserirMidia
}//fecha class Admin*/
?>