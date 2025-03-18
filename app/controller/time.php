<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require __DIR__ . '/../model/Database.php';

class Times_torneio {
    public int $id_times;
    public string $nome;


    public function cadastrar(){
        $db = new Database('times');

        $res = $db->insert(
                [
                    'nome'=> $this->nome,
                ]
            );
        return $res;
    }

    public function buscar($where=null, $order=null, $limit=null){
        $db = new Database('times');

        $res = $db->select($where, $order, $limit)->fetchAll(PDO::FETCH_CLASS,self::class);
        return $res;
    }

    public function buscar_por_id($id){
        $db = new Database('times');

        $obj = $db->select('id_times ='.$id)->fetchObject(self::class);
        return $obj; //retorna um obj da classe usuario
    }

    public function atualizar(){
        $db = new Database('times');

        $res = $db->update("id_times =".$this->id_times,
                            [
                                "nome" => $this->nome,
                            ]
                        );

        return $res;
    }



    public function excluirTime($id_times) {
        // Instancia a classe Database
        $db = new Database();
    
        // Chama o método deleteTime passando o ID do time
        $res = $db->deleteTime($id_times);
    
        // Retorna o resultado da operação
        return $res;
    }

    public function getPontos() {
        try {
            $db = new Database();
            $query = "
                SELECT t.nome AS time, SUM(p.pontos) AS pontos
                FROM times t
                LEFT JOIN pontuacao p ON t.id_times = p.id_times
                GROUP BY t.id_times
            ";
    
            $stmt = $db->execute($query);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            // Certifique-se de que estamos enviando apenas JSON
            if (empty($result)) {
                echo json_encode(['error' => 'Nenhum time encontrado.']);
            } else {
                echo json_encode($result);
            }
        } catch (Exception $e) {
            echo json_encode(['error' => 'Erro ao obter pontos: ' . $e->getMessage()]);
        }
    }
}

