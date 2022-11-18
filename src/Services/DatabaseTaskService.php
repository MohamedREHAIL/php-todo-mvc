<?php
require_once('src/Common/Database.php');
class DatabaseTaskService implements TaskServiceInterface
{
    /**
     * @var TaskEntity[]
     */
    private array $data;
  // use SingletonTrait;

    use SingletonTrait;


    public PDO $db;


    public function __construct()
    {

    }
    public function construct(){



            $this->db= Database::get();

    }

    public function get(int $id): ?TaskEntity
    {
        $statementget=$this->db->prepare(
            "Select * from todo where id=:id ;"
        );
        $statementget->execute([
            'id'=>$id
        ]);
        $datas=$statementget->fetch();
        $this->data=new TaskEntity();
        //$this->data->getTitle()=$datas[1];




    }

    public function list(array $args = []): array
    {
        // TODO: Implement list() method.
    }

    public function create(TaskEntity $task): TaskEntity
    {
        // TODO: Implement create() method.
    }

    public function update(TaskEntity $task): TaskEntity
    {
        // TODO: Implement update() method.
    }

    public function delete(int $id): void
    {
        // TODO: Implement delete() method.
    }
}