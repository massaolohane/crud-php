<?php
class Usuario
{

    public static function listar($db)
    {
        return $db->query("SELECT * FROM usuarios");
    }

    public static function criar($db, $nome, $email, $senha)
    {
        $stmt = $db->prepare("INSERT INTO usuarios (nome,email,senha) VALUES (?,?,?)");
        return $stmt->execute([$nome, $email, $senha]);
    }

    public static function buscar($db, $id)
    {
        $stmt = $db->prepare("SELECT * FROM usuarios WHERE id=?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public static function atualizar($db, $id, $nome, $email)
    {
        $stmt = $db->prepare("UPDATE usuarios SET nome=?, email=? WHERE id=?");
        return $stmt->execute([$nome, $email, $id]);
    }

    public static function excluir($db, $id)
    {
        $stmt = $db->prepare("DELETE FROM usuarios WHERE id=?");
        return $stmt->execute([$id]);
    }
}
