<?php

namespace Source\Models;

use Source\Core\Model;

/**
 * FSPHP | Class User Active Record Pattern
 *
 * @author Robson V. Leite <cursos@upinside.com.br>
 * @package Source\Models
 */
class User extends Model
{
    /**
     * User constructor.
     */
    public function __construct()
    {
        parent::__construct("users", ["id"], ["first_name", "last_name", "email", "functional_record", "password"]);
    }

    /**
     * @param string $firstName
     * @param string $lastName
     * @param string $email
     * @param string $password
     * @param string|null $document
     * @return User
     */
    public function bootstrap(
        string $firstName,
        string $lastName,
        string $email,
        string $functional_record,
        string $password,
        string $document = null
    ): User {
        $this->first_name = $firstName;
        $this->last_name = $lastName;
        $this->email = $email;
        $this->functional_record = $functional_record;
        $this->password = $password;
        $this->document = $document;
        return $this;
    }

    /**
     * @param string $id
     * @param string $firstName
     * @param string $lastName
     * @param string $email
     * @return User
     */
    public function bootstrapId(
        string $id,
        string $firstName,
        string $lastName,
        string $email,
        string $functional_record
    ): User {
        $this->id = $id;
        $this->first_name = $firstName;
        $this->last_name = $lastName;
        $this->email = $email;
        $this->functional_record = $functional_record;
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
    ): User
    {
        $this->id = $id;
        $this->status = $status;
        $this->deleted_at = $deleted_at;
        return $this;
    }

    /**
     * @param string $email
     * @param string $columns
     * @return null|User
     */
    public function findByEmail(string $email, string $columns = "*"): ?User
    {
        $find = $this->find("email = :email AND status = :status", "email={$email}&status=confirmed", $columns);
        return $find->fetch();
    }

    public function findyByName(string $first, string $last, string $columns = "*"): ?User
    {
        $find = $this->find("first_name = :f AND last_name = :l", "f={$first}&l={$last}", $columns);
        return $find->fetch();
    }

    static function completeName($columns): ?User
    {
        $stm = (new User())->find("","",$columns);
        $array = array();

        if(!empty($stm)):
            foreach ($stm->fetch(true) as $row):
                $array[] = $row->first_name.' '.$row->last_name;
            endforeach;
            echo json_encode($array); //Return the JSON Array
        endif;
        return null;
    }

    public function updated(User $user): bool // Só aceita um objeto da Classe User e bool só retorna true e false
    {
        if(!$user->save()) {
            $this->message = $user->message;
            return false;
        }else {
            $this->message->warning("Edição de {$user->first_name} salva com sucesso!!!")->icon()->flash();
        }

        return true;
    }

    public function deleted(User $user): bool // Só aceita um objeto da Classe User e bool só retorna true e false
    {
        if(!$user->save()) {
            $this->message = $user->message;
            return false;
        }else {
            $this->message->error("Exclusão de : {$user->first_name} {$user->last_name} feita com sucesso!!!")->icon()->flash();
            redirect("/dashboard/listar-usuarios");
        }

        return true;
    }

    public function delet(User $user): bool // Só aceita um objeto da Classe User e bool só retorna true e false
    {
        if(!$user->delete("id = :id", "id={$this->id}")) {
            $this->message = $user->message;
            return false;
        }else {
            $this->message->error("Exclusão definitiva de usuário : {$user->first_name} feita com sucesso!!!")->icon()->flash();
            redirect("/dashboard/lixeira-usuarios");
        }

        return true;
    }

    public function reactivated(User $user): bool // Só aceita um objeto da Classe User e bool só retorna true e false
    {
        if(!$user->save()) {
            $this->message = $user->message;
            return false;
        }else {
            $this->message->success("Reativação de : {$user->first_name} {$user->last_name} feita com sucesso!!!")->icon()->flash();
            redirect("/dashboard/lixeira-usuarios");
        }

        return true;
    }

    /**
     * @return string
     */
    public function fullName(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }

    /**
     * @return string|null
     */
    public function photo(): ?string
    {
        if ($this->photo && file_exists(__DIR__ . "/../../" . CONF_UPLOAD_DIR . "/{$this->photo}")) {
            return $this->photo;
        }

        return null;
    }

    /**
     * @return bool
     */
    public function save(): bool
    {
        if (!$this->required()) {
            $this->message->warning("Nome, sobrenome, email e senha são obrigatórios");
            return false;
        }

        if (!is_email($this->email)) {
            $this->message->warning("O e-mail informado não tem um formato válido");
            return false;
        }

        if (!is_passwd($this->password)) {
            $min = CONF_PASSWD_MIN_LEN;
            $max = CONF_PASSWD_MAX_LEN;
            $this->message->warning("A senha deve ter entre {$min} e {$max} caracteres");
            return false;
        } else {
            $this->password = passwd($this->password);
        }

        /** User Update */
        if (!empty($this->id)) {
            $userId = $this->id;

            if ($this->find("email = :e AND id != :i", "e={$this->email}&i={$userId}", "id")->fetch()) {
                $this->message->warning("O e-mail informado já está cadastrado");
                return false;
            }

            $this->update($this->safe(), "id = :id", "id={$userId}");
            if ($this->fail()) {
                $this->message->error("Erro ao atualizar, verifique os dados");
                return false;
            }
        }

        /** User Create */
        if (empty($this->id)) {
            if ($this->findByEmail($this->email, "id")) {
                $this->message->warning("O e-mail informado já está cadastrado");
                return false;
            }

            $userId = $this->create($this->safe());
            if ($this->fail()) {
                $this->message->error("Erro ao cadastrar, verifique os dados");
                return false;
            }
        }

        $this->data = ($this->findById($userId))->data();
        return true;
    }

}