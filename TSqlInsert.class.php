<?php

/*
* classe TSqlInsert
* Esta classe provê meios de manipulação de uma instrução SQL de Insert no banco de dados
*/

final class TSqlInsert extends TSqlInstruction{
    private $columnValues;
    
    /* metodo setRowData()
    * Atriibui valores à determinadas colunas do banco de dados que serão inseridas
    * @param $column = coluna da tabela
    * @param $value = valor a ser armazenada
    */

    public function setRowData($column,$value){
        // verifica se é um dado escalar(string, inteiro,...)
        if(is_scalar($value)){
            if(is_string($value) and (!empty($value))){
                // adiciona \ em aspas
                $value = addslashes($value);
                // caso seja uma string
                $this->columnValues[$column] = "'$value'";
            }
            else if(is_bool($value)){
                // caso seja um booleano
                $this->columnValues[$column] = $value ? 'TRUE': 'FALSE';
            }
            else if($value!==''){
                // caso seja outro tipo de dado 
                $this->columnValues[$column] = $value;
            }
            else {
                // caso seja NULL
                $this->columnValues[$column] = "NULL";
            }

        }
    }

    /*Método setCriteria()
    não existe no contexto dessa classe, irá lançar um erro se for executado
    */
    public function setCriteria(Tcriteria  $criteria){
        // lança o erro
        throw new TException("Canot Call setCriteria from" . __CLASS__);
    }

    /* Método getInstruction ()
    * retorna a instrução SQL Insert em forma de string
    */

    public function getInstruction(){
        $this->sql = "Insert into {$this->entity} (";
        //monta uma string contendo os nomes das colunas
        $values = implode(',',array_keys($this->columnValues));
        //monta uma string contendo os valores
        $values = implode (',',array_values($this->columnValues));
        $this->sql.= $columns.')';
        $this->sql.= " values({values})";
        return $this->sql;
        }
    }
?>