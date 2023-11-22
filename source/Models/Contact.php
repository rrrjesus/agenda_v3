<?php

namespace Source\Models;

use Source\Core\Model;

/**
 *
 */
class Contact extends Model
{
    /**
     *
     */
    public function __construct()
    {
        parent::__construct("contacts", ["id"], ["sector", "collaborator", "ramal"]);
    }

    /**
     * @param string $sector
     * @param string $collaborator
     * @param string $ramal
     * @param string|null $document
     * @return Contact
     */
    public function bootstrap(
        string $sector,
        string $collaborator,
        string $ramal
    ): Contact
    {
        $this->sector = $sector;
        $this->collaborator = $collaborator;
        $this->ramal = $ramal;
        return $this;
    }

    /**
     * @param string $id
     * @param int $sector
     * @param string $collaborator
     * @param string $ramal
     * @return $this
     */
    public function bootstrapId(
        string $id,
        int $sector,
        string $collaborator,
        string $ramal
    ): Contact
    {
        $this->id = $id;
        $this->sector = $sector;
        $this->collaborator = $collaborator;
        $this->ramal = $ramal;
        return $this;
    }

    /**
     * @param string $id
     * @param string $status
     * @return $this
     */
    public function bootstrapTrash(
        string $id,
        string $status,
        string $deleted_at
    ): Contact
    {
        $this->id = $id;
        $this->status = $status;
        $this->deleted_at = $deleted_at;
        return $this;
    }

    public function updated(Contact $contact): bool // Só aceita um objeto da Classe Contact e bool só retorna true e false
    {
        if(!$contact->save()) {
            $this->message = $contact->message;
            return false;
        }else {
            $this->message->warning("Edição de {$contact->collaborator} salva com sucesso!!!")->icon()->flash();
        }

        return true;
    }

    public function deleted(Contact $contact): bool // Só aceita um objeto da Classe Contact e bool só retorna true e false
    {
        if(!$contact->save()) {
            $this->message = $contact->message;
            return false;
        }else {
            $this->message->warning("Envio a lixeira de : {$contact->collaborator} - Ramal : {$contact->ramal} feita com sucesso!!!")->icon("trash")->flash();
            redirect("/dashboard/listar-contatos");
        }

        return true;
    }

    public function reactivated(Contact $contact): bool // Só aceita um objeto da Classe Contact e bool só retorna true e false
    {
        if(!$contact->save()) {
            $this->message = $contact->message;
            return false;
        }else {
            $this->message->success("Reativação de : {$contact->collaborator} - Ramal : {$contact->ramal} feita com sucesso!!!")->icon("award")->flash();
            redirect("/dashboard/lixeira-contatos");
        }

        return true;
    }

    public function delet(Contact $contact): bool // Só aceita um objeto da Classe Contact e bool só retorna true e false
    {
        if(!$contact->delete("id = :id", "id={$this->id}")) {
            $this->message = $contact->message;
            return false;
        }else {
            $this->message->error("Exclusão definitiva de contato feita com sucesso!!!")->icon("trash")->flash();
            redirect("/dashboard/listar-contatos");
        }

        return true;
    }

    static function completeRamal($columns): ?Contact
    {
        $stm = (new Contact())->find("","",$columns);
        $array = array();

        if(!empty($stm)):
            foreach ($stm->fetch(true) as $row):
                $array[] = $row->ramal;
            endforeach;
            echo json_encode($array); //Return the JSON Array
        endif;
        return null;
    }

    static function completeFone($columns): ?Contact
    {
        $stm = (new Contact())->find("","",$columns);


        if(!empty($stm)):
            foreach ($stm->fetch(true) as $row):
                $array[] = '4934 '.$row->ramal;
            endforeach;
            echo json_encode($array); //Return the JSON Array
        endif;
        return null;
    }

    /**
     * @param Contact $contact
     * @return bool
     */
    public function register(Contact $contact): bool // Só aceita um objeto da Classe Contact e bool só retorna true e false
    {
        if(!$contact->save()) {
            $this->message = $contact->message;
            return false;
        }else{
            $this->message->success("Cadastro de {$contact->collaborator} salvo com sucesso!!!")->icon()->flash();
        }
        return true;
    }

    /**
     * @return bool
     */
    public function save(): bool
    {
        /** User Update */
        if (!empty($this->id)) {
            $contactId = $this->id;

            if ($this->find("ramal = :r AND id != :i", "r={$this->ramal}&i={$contactId}", "id")->fetch()) {
                $this->message->warning("O ramal informado já está cadastrado");
                return false;
            }

            $this->update($this->safe(), "id = :id", "id={$contactId}");
            if ($this->fail()) {
                $this->message->error("Erro ao atualizar, verifique os dados");
                return false;
            }
        }

        /** User Create */
        if (empty($this->id)) {
            if ($this->find("ramal = :r", "r={$this->ramal}", "id")->fetch()) {
                $this->message->warning("O Ramal informado pertence a outro contato");
                return false;
            }

            if(is_ramal($this->ramal)){
                $this->message->warning("O Ramal informado não é válido !!!");
                return false;
            }

            $contactId = $this->create($this->safe());

            if ($this->fail()) {
                $this->message->error("Erro ao cadastrar, verifique os dados");
                return false;
            }
        }

        $this->data = ($this->findById($contactId))->data();
        return true;
    }

    public function sector(): ?Sector
    {
        if($this->sector) {
            return(new Sector())->findById($this->sector);
        }
        return null;
    }
}