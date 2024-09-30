<?php

/*classe tsqlinstruction
*classe que provê os métodos em comum entre todas as operações
*SQL(SELECT, INSERT, DELETE, UPDATE)
*/


abstract class TSqlInstruction{

    protected $sql; //armazena a instrução SQl
    protected $criteria; //armazena o objeto critério
    protected $entity; //armazena a tabela do banco de dados

    /*método setEntity()
    *define o nome da entidade(tabela) a ser manipulada pela instrução SQL
    *@param $entity = tabela
    */

    final public function setEntity($entity){
        $this->entity = $entity;
    }
    /*método getEntity()
    *retorna o nome da entidade (tabela)
    */

    final public function getEntity(){
        return $this->entity;
    }

    /* método setCriteria()
    *define um criterio de seleção dos através da composição de um objeto
    *do tipo TCriterio, que fornece uma intreface para definição de critérios
    *@param $criteria = objeto do tipo TCriteria
    */

    public function setCriteria(){
        $this->criteria = $criteria;
    }
    /*método getInstruction 
    *declarando como <abstract> obtigamos a declaração nas classes filhas
    *uma vez que seu comportamento será distinto em cada uma delas, configurando poliformismo
    */


    abstract function getInstruction();

}

?>